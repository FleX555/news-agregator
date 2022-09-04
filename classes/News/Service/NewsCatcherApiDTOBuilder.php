<?php

namespace App\News\Service;

use App\News\DTO\NewsItemDTO;

class NewsCatcherApiDTOBuilder
{
    /**
     * @param array $arraySourceNewsData
     * @return array
     */
    public function buildFromSource(array $arraySourceNewsData): array
    {
        $result = [];
        $arraySourceNewsData = $arraySourceNewsData["articles"];

        foreach ($arraySourceNewsData as $arraySourceNewsItem) {

            $result[] = (new NewsItemDTO())
                ->setApiSource("newsCatcherApi")
                ->setSource($this->prepareNewsItem((string)$arraySourceNewsItem["rights"]))
                ->setAuthor($this->prepareNewsItem((string)$arraySourceNewsItem["author"]))
                ->setTitle($this->prepareNewsItem((string)$arraySourceNewsItem["title"]))
                ->setImg($this->prepareNewsItem((string)$arraySourceNewsItem["media"]))
                ->setDate($this->prepareNewsItem((string)$arraySourceNewsItem["published_date"]))
                ->setInfo($this->prepareNewsItem((string)$arraySourceNewsItem["summary"]));
        }

        return $result;
    }

    protected function prepareNewsItem(string $item): string
    {
        return $item === "" ? 'Информация отсутствует' : $item;
    }

}