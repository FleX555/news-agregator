<?php

namespace App\News\Service;

class PageViewNewsBuilder
{
    protected NewsCatcherNewGetter $catcherNewGetter;

    protected NewsCatcherApiDTOBuilder $newsCatcherApiDTOBuilder;

    public function __construct(NewsCatcherNewGetter $catcherNewGetter, NewsCatcherApiDTOBuilder $newsCatcherApiDTOBuilder)
    {
        $this->catcherNewGetter = $catcherNewGetter;
        $this->newsCatcherApiDTOBuilder = $newsCatcherApiDTOBuilder;
    }

    public function build() //вызываем в index
    {
        $newsRaw = $this->catcherNewGetter->getNews();
        $newsDTO = $this->newsCatcherApiDTOBuilder->buildFromSource($newsRaw);
        /////поместить все в массив (разбить на методы )
        /// на выходе готовый массив
    }
}
