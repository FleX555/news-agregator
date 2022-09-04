<?php

namespace App\News\Service;

use App\News\DTO\NewsItemDTO;
use App\News\Client\NewsApiClient as NewsApiClient;

class NewsApiDTOBuilder
{

    /**
     * @param array $arraySourceNewsData
     * @param array $array
     * @return array
     */
    public function buildFromSource(array $arraySourceNewsData , array $array): array
    {

        $arraySourceNewsData = $arraySourceNewsData["articles"];


        foreach ($arraySourceNewsData as $arraySourceNewsItem) {

        $array[] = (new NewsItemDTO())
            ->setApiSource("newsApi")
            ->setSource($this->prepareNewsItem((string)$arraySourceNewsItem["source"]["name"]))
            ->setAuthor($this->prepareNewsItem((string)$arraySourceNewsItem["author"]))
            ->setTitle($this->prepareNewsItem((string)$arraySourceNewsItem["title"]))
            ->setImg($this->prepareNewsItem((string)$arraySourceNewsItem["urlToImage"]))
            ->setDate($this->prepareNewsItem((string)$arraySourceNewsItem["publishedAt"]))
            ->setInfo($this->prepareNewsItem((string)$arraySourceNewsItem["description"]));
        }

        return $array;
    }

    /**
     * @param string $item
     * @return string
     */
    protected function prepareNewsItem(string $item): string
    {
        if ($item === "") {
            $item = 'Информация отсутствует';
        }

        return $item;
    }
}
