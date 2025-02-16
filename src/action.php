<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DailyJoke\Controllers\Admin;
use DailyJoke\Models\Joke;

$id = $_GET['id'];
$content = $_GET['content'];
$likes = $_GET['likes'];

if (isset($_GET['update'])) {
    $joke = Joke::findById($id);
    $joke->likes = $likes;
    $joke->content = $content;

    $joke->save();

} else if (isset($_GET['delete'])) {
    $joke = Joke::findById($id);

    $joke->delete();

} else if (isset($_GET['insert'])) {
    $joke = new Joke();

    try {
        $joke->fill(['content' => $content]);
    } catch (\Exceptions\MultiException $exceptions) {
        include_once __DIR__ . '/templates/multiexceptions.php';
        die();
    }

    $joke->save();
}

header('Location: /?ctrl=Admin');
