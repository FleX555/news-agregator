<?php

namespace App\getNews;

use GuzzleHttp\Client as Client;


class GetDataNewscatcherapi extends MakeLinkNewscatcherapi
{
    function __construct()
    {
        $url = MakeLinkNewscatcherapi::getUrl();
        $client = new Client();
        $result = $client -> request('GET', $url, [
            'headers' => [
                'x-api-key' => MakeLinkNewscatcherapi::getKey()
            ],
            'http_errors' => false
        ]);

        if($result->getStatusCode() != 405){
            $this->json = json_decode($result->getBody(), true);
        }
    }

    public function getSource($number): string
    {
        if($this->json["articles"][$number]["rights"] == null) {
            $this->source = 'Источник неизвестен';
        } else {
            $this->source = $this->json["articles"][$number]["rights"];
        }
        return $this->source;
    }

    public function getAuthor($number): string
    {
        if($this->json["articles"][$number]["author"] == null) {
            $this->author = 'Автор неизвестен';
        } else {
            $this->author = $this->json["articles"][$number]["author"];
        }
        return $this->author;
    }

    public function getTitle($number): string
    {
        if($this->json["articles"][$number]["title"] == null) {
            if(mb_strwidth($this->json["articles"][$number]["summary"]) < 150) {
                $this->title = $this->json["articles"][$number]["summary"];
            } else {
                $this->title = mb_strimwidth($this->json["articles"][$number]["summary"], 0, 150, "...");
            }
        } else {
            $this->title = $this->json["articles"][$number]["title"];
        }
        return $this->title;
    }

    public function getImg($number): string
    {
        if($this->json["articles"][$number]["media"] == null) {
            $this->img = IMG_PATH;
        } else {
            $this->img = $this->json["articles"][$number]["media"];
        }
        return $this->img;
    }

    public function getDate($number): string
    {
        if($this->json["articles"][$number]["published_date"] == null) {
            $this->date = 'Дата неизвестна';
        } else {
            $this->date = $this->json["articles"][$number]["published_date"];
        }
        return $this->date;
    }

    public function getData($number): string
    {
        if($this->json["articles"][$number]["summary"] == null) {
            $this->info = 'Информация отсутствует';
        } else {
            $this->info = $this->json["articles"][$number]["summary"];
        }
        return $this->info;
    }
}