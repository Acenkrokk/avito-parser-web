<?php
require_once __DIR__ . '/../vendor/autoload.php';

$settingsPath = __DIR__ . '/../settings.json';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    file_put_contents($settingsPath, json_encode($_POST, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    header('Location: index.php');
    exit;
}
$settings = file_exists($settingsPath) ? json_decode(file_get_contents($settingsPath), true) : [];
include __DIR__ . '/../templates/form.php';
