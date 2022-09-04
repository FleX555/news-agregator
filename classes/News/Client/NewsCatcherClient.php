<?php

namespace App\News\Client;

use App\News\Exception\ApiKeyInvalid;
use App\News\Exception\UnsupportedParameters;
use App\News\Exception\TooManyRequests;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NewsCatcherClient
{
    const URL = 'https://api.newscatcherapi.com/v2/latest_headlines?&lang=ru&countries=RU';

    protected string $apiKey;

    protected Client $client;

    public function __construct(string $apiKey, Client $client)
    {
        $this->apiKey = $apiKey;
        $this->client = $client;
    }

    /**
     * @return array
     * @throws ApiKeyInvalid
     * @throws TooManyRequests
     * @throws UnsupportedParameters
     */
    public function getNewsFromSource(): array
    {
        try {
            $responseBody = $this->client->request('GET',self::URL, [
                'headers' => [
                    'x-api-key' => $this->apiKey
                ]
            ])->getBody();

            return json_decode($responseBody->getContents(), true);
        } catch (GuzzleException $e) {
            if ($e->getCode() === 401) {
                throw new ApiKeyInvalid('Ошибка. Неверный API ключ');
            } if ($e->getCode() === 406) {
                throw new UnsupportedParameters();
            } if($e->getCode() === 429) {
                throw new TooManyRequests();
            } else {
                echo 'Произошла ошибка при запросе новостей:' . $e->getMessage();
            }
        }
    }
}
