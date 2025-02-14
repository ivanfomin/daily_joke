<?php

namespace DailyJoke\Controllers;

use DailyJoke\View;

abstract class Base
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }


}