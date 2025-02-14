<?php

namespace DailyJoke\Controllers;

use DailyJoke\Models\Model;
use \DailyJoke\Models\Joke as Joke_Model;

class Admin extends Base
{
    public function __invoke($template = __DIR__ . '/../../templates/admin_panel.php')
    {

        $this->view->jokes = Joke_Model::findAll();
        $this->view->display($template);

    }

}