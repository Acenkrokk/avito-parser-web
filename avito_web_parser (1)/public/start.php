<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Parser;
use App\Storage\CsvStorage;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

$settings = json_decode(file_get_contents(__DIR__ . '/../settings.json'), true);

$log = new Logger('parser');
$log->pushHandler(new StreamHandler(__DIR__ . '/../data/parser.log', Logger::INFO));

CsvStorage::init(__DIR__ . '/../data/results.csv');

$parser = new Parser(
    $settings['url'],
    (int) $settings['pages'],
    $log,
    (int) $settings['concurrency']
);
$parser->run();

header('Location: index.php?done=1');
