<?php
require __DIR__ . '/vendor/autoload.php';

$ctrl = $_GET['ctrl'] ?? 'Joke';
$class = '\\DailyJoke\\Controllers\\' . $ctrl;

try {
    $ctrl = new $class;
    $ctrl();

} catch (\Exceptions\Http404Exception $ex) {
    http_response_code(404);
} catch (\Exceptions\Http500Exception $ex) {
    http_response_code(500);
} catch (Throwable $ex) {
    echo get_class($ex) . PHP_EOL;
    echo $ex->getMessage() . PHP_EOL;
}