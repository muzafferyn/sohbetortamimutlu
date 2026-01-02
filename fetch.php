<?php
// Mesajları çekme (JSON'dan HTML olarak döndür)
$dataFile = __DIR__ . '/chat.json';
$messages = file_exists($dataFile) ? json_decode(file_get_contents($dataFile), true) : [];
foreach ($messages as $m) {
    $user = htmlspecialchars($m['user']);
    $msg = nl2br(htmlspecialchars($m['msg']));
    $time = htmlspecialchars($m['time']);
    echo "<div class='message'><span class='user'>{$user}:</span> {$msg} <span class='time'>{$time}</span></div>";
}
