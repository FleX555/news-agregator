<?php

namespace App\News\ApiKey;

class GetApiKey
{
    protected string $key;
    protected string $pathFile;

    /**
     * @return string
     */
    public function getPathFile(): string
    {
        $this->pathFile = $_SERVER['DOCUMENT_ROOT'] . "/ApiKeyFile/.env";
        return $this->pathFile;
    }

    /**
     * @param string $source
     * @return string
     */
    public function getKey(string $source): string
    {
        $dotenv = new \Symfony\Component\Dotenv\Dotenv();
        $dotenv->load($this->getPathFile());

        if($source === "newsApi") {
            $this->key = $_ENV['NEWSAPI_KEY'];
        } elseif ($source === "newsCatcherApi") {
            $this->key = $_ENV['NEWSCATCHERAPI_KEY'];
        } else {
            $this->key = "notfound";
        }
        return $this->key;

    }

}