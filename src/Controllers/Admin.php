<?php

namespace DailyJoke\Controllers;

use DailyJoke\Models\Model;
use \DailyJoke\Models\Joke as Joke_Model;

class Admin extends Base
{
    public function __invoke($page = 1, $template = __DIR__ . '/../../templates/admin_panel.php')
    {
        $this->view->jokes = parent::pagination($page);
        //$this->view->jokes = Joke_Model::findAll();
        $this->view->display($template);

    }

    protected function enter():int {
        return include __DIR__ . '/../../templates/enter.php';
    }

}