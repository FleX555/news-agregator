<?php

namespace App\getNews;

use GuzzleHttp\Client as Client;

class GetDataNewsapi extends MakeLinkNewsapi
{
    function __construct()
    {
        $client = new Client();
        $result = $client -> request('GET', MakeLinkNewsapi::makeLinkNewsapi(), [
            'http_errors' => false
        ]);

        if($result->getStatusCode() != 405){
            $this->json = json_decode($result->getBody(),true);
        }
    }

    public function getSource($number): string
    {
        if($this->json["articles"][$number]["source"]["name"] == null) {
            $this->source = 'Источник неизвестен';
        } else {
            $this->source = $this->json["articles"][$number]["source"]["name"];
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
            if(mb_strwidth($this->json["articles"][$number]["description"]) < 150) {
                $this->title = $this->json["articles"][$number]["description"];
            } else {
                $this->title = mb_strimwidth($this->json["articles"][$number]["description"], 0, 150, "...");
            }
        } else {
            $this->title = $this->json["articles"][$number]["title"];
        }
        return $this->title;
    }

    public function getImg($number): string
    {
        if($this->json["articles"][$number]["urlToImage"] == null) {
            $this->img = IMG_PATH;
        } else {
            $this->img = $this->json["articles"][$number]["urlToImage"];
        }
        return $this->img;
    }

    public function getDate($number): string
    {
        if($this->json["articles"][$number]["publishedAt"] == null) {
            $this->date = 'Дата неизвестна';
        } else {
            $this->date = $this->json["articles"][$number]["publishedAt"];
        }
        return $this->date;
    }

    public function getData($number): string
    {
        if($this->json["articles"][$number]["description"] == null) {
            $this->info = 'Информация отсутствует';
        } else {
            $this->info = $this->json["articles"][$number]["description"];
        }
        return $this->info;
    }
}