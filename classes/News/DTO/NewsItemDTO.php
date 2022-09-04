<?php

namespace App\News\DTO;

class NewsItemDTO
{
    /**
     * @var string
     */
    public string $apiSource = '';

    /**
     * @var string
     */
    public string $source = '';

    /**
     * @var string
     */
    public string $author = '';

    /**
     * @var string
     */
    public string $title = '';

    /**
     * @var string
     */
    public string $img = '';

    /**
     * @var string
     */
    public string $date = '';

    /**
     * @var string
     */
    public string $info = '';

    /**
     * @param string $apiSource
     * @return NewsItemDTO
     */
    public function setApiSource(string $apiSource): NewsItemDTO
    {
        $this->apiSource = $apiSource;
        return $this;
    }

    /**
     * @param string $source
     * @return NewsItemDTO
     */
    public function setSource(string $source): NewsItemDTO
    {
        $this->source = $source;
        return $this;
    }

    /**
     * @param string $author
     * @return $this
     */
    public function setAuthor(string $author): NewsItemDTO
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @param string $title
     * @return NewsItemDTO
     */
    public function setTitle(string $title): NewsItemDTO
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @param string $img
     * @return NewsItemDTO
     */
    public function setImg(string $img): NewsItemDTO
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @param string $date
     * @return NewsItemDTO
     */
    public function setDate(string $date): NewsItemDTO
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @param string $info
     * @return NewsItemDTO
     */
    public function setInfo(string $info): NewsItemDTO
    {
        $this->info = $info;
        return $this;
    }
}
