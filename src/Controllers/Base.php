<?php

namespace DailyJoke\Controllers;

use DailyJoke\View;
use DailyJoke\Models\Joke as Joke_Model;

abstract class Base
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    protected function pagination($page = 1)
    {
        if ($page <= 1 && empty($page)) {
            $page = 1;
        }

        $this->view->count = Joke_Model::countWords();
        $this->view->current = $page;
        $num = 10;
        $this->view->pages = (int)ceil($this->view->count / $num);
        if (empty($this->view->count) && $this->view->count < 0) {
            $page = 1;
        }
        $start = $page * $num - $num;
        $this->view->jokes = Joke_Model::findPage($start, $num);

        return $this->view->jokes;
    }


}