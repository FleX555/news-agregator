<?php

namespace App\News\Client;

use App\News\Exception\ApiKeyInvalid;
use App\News\Exception\TooManyRequests;
use App\News\Exception\UnsupportedParameters;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Stream;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\ClientException;

class NewsApiClient
{
    const URL = 'https://newsapi.org/v2/top-headlines?country=ru&apiKey=';

    protected string $apiKey;
    protected Client $client;

    public function __construct(string $apiKey, Client $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    /**
     * @return string
     */
    protected function getApiUrl(): string
    {
        return self::URL . $this->apiKey;
    }

    /**
     * @throws ApiKeyInvalid
     * @throws TooManyRequests
     * @throws UnsupportedParameters
     */
    public function getNewsFromSource()//: Stream
    {


        try {

            return $this->client->request('GET', $this->getApiUrl())->getBody();

        } catch (GuzzleException $e) {

            if ($e->getCode() == 401) {
                throw new ApiKeyInvalid();
            } if ($e->getCode() === 406) {
                throw new UnsupportedParameters();
            } if($e->getCode() === 429) {
                throw new TooManyRequests();
            } else {
                echo 'Произошла ошибка при запросе новостей:' . $e->getMessage();
            }
        }
    }

    /**
     * @return array
     * @throws ApiKeyInvalid
     * @throws TooManyRequests
     * @throws UnsupportedParameters
     */

    public function getNews(): ?array
    {
        try {
            if ($this->getNewsFromSource()) {
                return json_decode($this->getNewsFromSource()->getContents(), true);
            } else {
                return null;
            }
        } catch (Exception $e) {
            throw new NewsRequestException('Произошла ошибка при запросе новостей:' . $e->getMessage());
        }

    }
}
