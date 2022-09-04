<?php

namespace App\log;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class ErrorLog
{
    public $logger;

    public function __construct($error, $path)
    {
        $this->logger = new Logger('ERROR LOGGER');
        $this->logger->pushHandler(new StreamHandler($path, Logger::INFO));
        $this->logger->info($error);
    }
}