<?php
$logFile = __DIR__ . '/../data/parser.log';
if (file_exists($logFile)) {
    file_put_contents($logFile, '');
}
header('Location: index.php?log_cleared=1');
exit;
