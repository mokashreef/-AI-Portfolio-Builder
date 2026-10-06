<?php
/**
 * API: Generate AI Bio
 * توليد نبذة احترافية بناءً على المسمى الوظيفي
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../includes/functions.php';

use App\Core\Security;
use App\Core\Auth;

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
}

if (!Auth::check()) {
    jsonResponse(['success' => false, 'message' => 'يجب تسجيل الدخول أولاً'], 401);
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$jobTitle = Security::clean($input['jobTitle'] ?? $input['job_title'] ?? '');

if (empty($jobTitle)) {
    jsonResponse(['success' => false, 'message' => 'المسمى الوظيفي مطلوب لتوليد النبذة'], 400);
}

// 1. Check if Gemini API Key is configured in environment
$geminiApiKey = env('GEMINI_API_KEY');
if (!empty($geminiApiKey)) {
    try {
        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-pro:generateContent?key=" . urlencode($geminiApiKey);
        $prompt = "Write a concise, professional 2-3 sentence portfolio bio in Arabic for a: " . $jobTitle . ". Do not include explanations, just return the bio text.";
        $postData = json_encode([
            'contents' => [
                ['parts' => [['text' => $prompt]]]
            ]
        ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && $response) {
            $json = json_decode($response, true);
            $aiText = $json['candidates'][0]['content']['parts'][0]['text'] ?? '';
            if (!empty(trim($aiText))) {
                jsonResponse(['success' => true, 'bio' => trim($aiText)]);
            }
        }
    } catch (\Throwable $e) {
        error_log("Gemini API call error: " . $e->getMessage());
    }
}

// 2. High quality localized bio generation fallback (zero blocking)
$bios = [
    "مطور تطبيقات" => "مطور تطبيقات مبدع وشغوف ببناء تجارب مستخدم مميزة. أجمع بين التصميم الأنيق والأداء العالي لتقديم منصات رقمية متكاملة.",
    "مصمم" => "مصمم جرافيك ذو تفكير إبداعي وحس فني عالٍ. أهتم بالتفاصيل الدقيقة وأصنع هويات بصرية تعبر عن الجوهر الحقيقي للعلامة التجارية.",
    "مطور ويب" => "مطور ويب محترف مختص في بناء وتطوير المواقع والتطبيقات المعقدة باستخدام أحدث التقنيات. مبدع في حل المشكلات وتحويل الأفكار إلى سطور برمجية فعالة.",
    "مطور" => "مبرمج طموح متخصص في تطوير حلول تقنية مبتكرة تسهم في تحسين جودة الحياة وتطوير الأعمال المتقدمة."
];

$generatedBio = "أنا {$jobTitle} متخصص في تقديم حلول مبتكرة وعالية الجودة. أملك شغفاً كبيراً بتعلم التقنيات الجديدة ومواكبة التطورات المستمرة في مجالي. هدفي هو ترك بصمة أثر إيجابية من خلال المشاريع التي أعمل عليها والارتقاء بالتجربة الرقمية لأفضل مستوياتها.";

foreach ($bios as $key => $bioText) {
    if (mb_stripos($jobTitle, $key) !== false) {
        $generatedBio = $bioText;
        break;
    }
}

jsonResponse([
    'success' => true,
    'bio' => $generatedBio
]);
