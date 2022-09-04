<?php

namespace App\News\Exception;

use App\News\Logging\Logging;

class TooManyRequests extends ApplicationException
{
    protected string $errorMessage;

    public function __construct()
    {
        $this->errorMessage = "Превышен максимально допустимый параллелизм 1 в 1 секунду";
        new Logging($this->errorMessage);
    }

}