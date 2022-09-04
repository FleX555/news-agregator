<?php

namespace App\getNews;

class MakeLinkNewsapi extends AbstractMakeLinkGetData
{
    public function makeLinkNewsapi(): string
    {
        $dotenv = new \Symfony\Component\Dotenv\Dotenv();
        $dotenv->load($_SERVER['DOCUMENT_ROOT'].'/ApiKeyFile/.env');
        $this->key = $_ENV['NEWSAPI_KEY'];
        $this->url = 'https://newsapi.org/v2/top-headlines?country=ru&apiKey=' . $this->key;
        return $this->url;
    }
}
