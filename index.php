<?php
require __DIR__ . '/vendor/autoload.php';
session_start();

$ctrl = $_GET['ctrl'] ?? 'Joke';
$page = $_GET['act'] ?? 1;
$class = '\\DailyJoke\\Controllers\\' . $ctrl;

try {
    $ctrl = new $class;
    $ctrl($page);

} catch (\Exceptions\Http404Exception $ex) {
    http_response_code(404);
} catch (\Exceptions\Http500Exception $ex) {
    http_response_code(500);
} catch (Throwable $ex) {
    echo get_class($ex) . PHP_EOL;
    echo $ex->getMessage() . PHP_EOL;
}