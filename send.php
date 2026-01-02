<?php
// Mesaj gönderme (JSON dosyasına ekleme)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim(strip_tags($_POST['username'] ?? ''));
    $message = trim(strip_tags($_POST['message'] ?? ''));
    if (strlen($username) < 2 || strlen($message) < 1) exit;
    $dataFile = __DIR__ . '/chat.json';
    $messages = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
    $messages[] = [
        'user' => $username,
        'msg' => $message,
        'time' => date('H:i')
    ];
    // Son 50 mesajı tut
    if (count($messages) > 50) $messages = array_slice($messages, -50);
    file_put_contents($dataFile, json_encode($messages, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT));
}
