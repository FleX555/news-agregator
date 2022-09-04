<?php

namespace App\News\Exception;

use App\News\Logging\Logging;

class UnsupportedParameters extends ApplicationException
{
    protected string $errorMessage;

    public function __construct()
    {
        $this->errorMessage = "Обнаружены неподдерживаемые параметры";
        new Logging($this->errorMessage);
    }
}