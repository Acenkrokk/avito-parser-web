<!DOCTYPE html>
<html>
<head>
    <title>Avito Parser</title>
    <style>body { font-family: sans-serif; margin: 20px; }</style>
</head>
<body>
<h1>Настройки парсера Avito</h1>
<form action="index.php" method="post">
    <label>URL для парсинга:<br><input type="text" name="url" value="<?= htmlspecialchars($settings['url'] ?? '') ?>" required></label><br><br>
    <label>Количество страниц:<br><input type="number" name="pages" value="<?= $settings['pages'] ?? 1 ?>"></label><br><br>
    <label>Потоки:<br><input type="number" name="concurrency" value="<?= $settings['concurrency'] ?? 5 ?>"></label><br><br>
    <button type="submit">Сохранить настройки</button>
</form>

<h2>Прокси</h2>
<form action="upload_proxy.php" method="post" enctype="multipart/form-data">
    <input type="file" name="proxy" accept=".txt" required>
    <button type="submit">Загрузить список прокси</button>
</form>

<form action="start.php" method="post" style="margin-top:20px;">
    <button type="submit">🚀 Запустить парсинг</button>
</form>

<?php if (isset($_GET['done'])): ?>
<p style="color: green;">✅ Парсинг завершён. Посмотрите файл <code>data/results.csv</code></p>
<?php endif; ?>

<form action="clear_log.php" method="post" style="margin-top:10px;">
    <button type="submit">🧹 Очистить лог</button>
</form>
<pre style="background:#f0f0f0;padding:10px;border:1px solid #ccc;max-height:300px;overflow:auto;">
<?php
if (file_exists(__DIR__ . '/../data/parser.log')) {
    echo htmlspecialchars(file_get_contents(__DIR__ . '/../data/parser.log'));
} else {
    echo 'Лог пуст.';
}
?></pre>
</body>
</html>
