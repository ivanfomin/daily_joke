<?php

namespace DailyJoke;

class Login
{
    public static function check(): bool
    {
        return isset($_SESSION['enter']) && $_SESSION['enter'] === 1;
    }

}