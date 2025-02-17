<?php

namespace DailyJoke\Controllers;

use DailyJoke\Models\Joke as Joke_Model;
use DailyJoke\Db;

class Joke extends Base
{
    public function __invoke( $page = 1, $template = __DIR__ . '/../../templates/joke.php')
    {

        $id = Joke_Model::findTodayJoke();

        $this->view->joke = Joke_Model::findById($id);

        $this->view->display($template);
    }

}