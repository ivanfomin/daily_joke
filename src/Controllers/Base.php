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
        $page = (int)$page;

        if ($page <= 1 ) {
            $page = 1;
        }

        $this->view->count = Joke_Model::countWords();
        $num = 10;
        $this->view->pages = (int)ceil($this->view->count / $num);
        if ($page > $this->view->pages) {
            $page = $this->view->pages;
        }
        $this->view->current = $page;

        if (empty($this->view->count) && $this->view->count < 0) {
            $page = 1;
        }
        $start = $page * $num - $num;
        $this->view->jokes = Joke_Model::findPage($start, $num);

        return $this->view->jokes;
    }


}