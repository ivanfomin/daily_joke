<?php

namespace Exceptions;

class DBException extends \Exception
{
    public function __construct(string $message)
    {
        parent::__construct($message);
        $this->message = $message;
    }

    /**
     * @param mixed $message
     */
    public function setMessage($message): void
    {
        $this->message = $message;
    }


}