<?php
require_once __DIR__ . '/../vendor/autoload.php';

use DailyJoke\Controllers\Admin;
use DailyJoke\Models\Joke;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
if (isset($_GET['content'])) {
    $content = $_GET['content'];
    $content = str_replace('"', '\'', $content);
}
if (isset($_GET['likes'])) {
    $likes = $_GET['likes'];
}

if (isset($_GET['update'])) {
    $joke = Joke::findById($id);
    $joke->likes = $likes;
    $joke->content = $content;

    try {
        $joke->fill(['content' => $content]);
    } catch (\Exceptions\MultiException $exceptions) {
        include_once __DIR__ . '/../templates/multiexceptions.php';
        die();
    }

    $joke->save();

} else if (isset($_GET['delete'])) {
    $joke = Joke::findById($id);

    $joke->delete();


} else if (isset($_GET['insert'])) {
    $joke = new Joke();

    try {
        $joke->fill(['content' => $content]);
    } catch (\Exceptions\MultiException $exceptions) {
        include_once __DIR__ . '/../templates/multiexceptions.php';
        die();
    }

    $joke->save();
}

header('Location: /?ctrl=Admin');
