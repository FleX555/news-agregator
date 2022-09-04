<?php

namespace App\News\Service;

use App\Cache\Memcache;
use App\News\Client\NewsCatcherClient;
use App\News\DTO\NewsItemDTO;
use App\News\Client\NewsApiClient as NewsApiClient;
use App\News\Exception\ApplicationException;

class NewsCatcherNewGetter
{
    protected const CACHE_KEY = 'news.catcher.data';

    protected const CACHE_TIME = 3600;

    protected NewsCatcherClient $client;

    protected \Memcached $memcacheClient;

    public function __construct(NewsCatcherClient $client, \Memcached $memcacheClient)
    {
        $this->client = $client;
        $this->memcacheClient = $memcacheClient;
    }

    public function getNews()
    {
        $newsList = $this->memcacheClient->get(self::CACHE_KEY);

        if ($newsList !== false) {
            return $newsList;
        }

        try {
            $newsList = $this->client->getNewsFromSource();
            $this->memcacheClient->add(self::CACHE_KEY, $newsList, self::CACHE_TIME);
        } catch (ApplicationException $e) {
            // логгирование
        }

        return $newsList;
    }
}