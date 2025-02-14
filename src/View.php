<?php

namespace DailyJoke;

class View
{
    use MagicTrait;

    /**
     * @var Models\Joke|mixed
     */
    public mixed $joke;

    public function display(string $template)
    {
        include $template;
    }
}