<?php

namespace DailyJoke\Controllers;

use DailyJoke\Login;
use DailyJoke\Models\Model;
use \DailyJoke\Models\Joke as Joke_Model;

class Admin extends Base
{
    public function __invoke($page = 1, $template = __DIR__ . '/../../templates/admin_panel.php')
    {
        if (!Login::check()) {
            $this->view->display(__DIR__ . '/../../templates/enter.php');
            exit;
        }
        $this->view->jokes = parent::pagination($page);
        $this->view->display($template);

    }

    protected function show_all($page = 1, $template = __DIR__ . '/../../templates/admin_panel.php')
    {
        $this->view->jokes = Joke_Model::findAll();
        $this->view->display($template);
    }

}