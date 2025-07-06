<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['proxy'])) {
    $targetPath = __DIR__ . '/../data/proxies.txt';
    move_uploaded_file($_FILES['proxy']['tmp_name'], $targetPath);
    header('Location: index.php?proxy=1');
    exit;
}
?>
