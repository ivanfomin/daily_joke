<?php

namespace DailyJoke;

class Config
{
    public array $data;

    public function __construct()
    {
        $this->data['db'] = include __DIR__ . '/../config_local.php';
    }

}