<?php

namespace App\News\Logging;

use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Logging
{
    protected Logger $logger;
    protected string $errorMessage;

    public function __construct(string $errorMessage)
    {
        $this->errorMessage = $errorMessage;

        $this->logger = new Logger('ERROR LOGGER');
        $this->logger->pushHandler(new StreamHandler($_SERVER["DOCUMENT_ROOT"] . "/Log/log.txt", Logger::INFO));
        $this->logger->error($this->errorMessage);
        return $this->logger;
    }


}