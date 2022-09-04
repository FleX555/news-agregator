<?php

namespace App\getNews;

class MakeLinkNewscatcherapi extends AbstractMakeLinkGetData
{
    public function getKey()
    {
        $dotenv = new \Symfony\Component\Dotenv\Dotenv();
        $dotenv->load($_SERVER['DOCUMENT_ROOT'].'/ApiKeyFile/.env');
        $this->key = $_ENV['NEWSCATCHERAPI_KEY'];
        return $this->key;
    }

    public function getUrl(): string
    {
        $this->url = 'https://api.newscatcherapi.com/v2/latest_headlines?&lang=ru&countries=RU';
        return $this->url;
    }
}