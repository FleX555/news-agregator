<?php

use App\getNews\MakeLinkNewsapi;

use App\News\DTO\NewsItemDTO;
use App\News\Service\NewsApiDTOBuilder;
use App\News\Client\NewsApiClient as NewsApiClient;

use App\News\Exception\ApplicationException;

use GuzzleHttp\Client as Client;

require_once __DIR__ . "/vendor/autoload.php";

$getKey = new \App\News\ApiKey\GetApiKey();
$clientNewApi = new App\News\Client\NewsApiClient($getKey->getKey("newsApi"), new Client());
$clientNewCatcher = new \App\News\Client\NewsCatcherClient($getKey->getKey("newsCatcherApi"), new Client());//zlBqIyDaqUJkc5pDFrer-MpC2nc0bbK-2Wd0r2ZK-Zw
$newsApiDTOBuilder = new NewsApiDTOBuilder();
$newsCatcherDTOBuilder = new \App\News\Service\NewsCatcherApiDTOBuilder();

$news = [];

/*try {
    $rawData = $client->getNews();

} catch (NewsApiClient|\App\News\Exception\ApiKeyInvalid $e) {
    $error = 'Технические проблемы';
}*/

/*try {
    $news = $newsDTOBuilder->buildFromSource($rawData);
} catch () {

}*/
$array = [];

/*if($clientNewApi->getNews()) {
    $array = $newsApiDTOBuilder->buildFromSource($clientNewApi->getNews(), $array);
}
if($clientNewCatcher->getNews()) {
    $array = $newsCatcherDTOBuilder->buildFromSource($clientNewCatcher->getNews(), $array);
}*/

try {
    $array = $newsApiDTOBuilder->buildFromSource($clientNewApi->getNews(), $array);
} catch (ApplicationException $e) {

}

try {
    $array = $newsCatcherDTOBuilder->buildFromSource($clientNewCatcher->getNewsFromSource(), $array);
} catch (\App\News\Exception\TooManyRequests $e) {

}



echo '<pre>';

var_dump($array);

echo '</pre>';






