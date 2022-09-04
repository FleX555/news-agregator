<?php

namespace App\getNews;

const IMG_PATH = '/img/no_image.jpg';

abstract class AbstractMakeLinkGetData
{
    protected string $key;
    protected string $url;
    public array $json = [];
    public string $source = '';
    public string $author = '';
    public string $title = '';
    public string $img = '';
    public string $date = '';
    public string $info = '';
}