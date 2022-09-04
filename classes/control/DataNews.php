<?php

require_once __DIR__ . "/../../vendor/autoload.php";
require_once __DIR__ . "/../../PrintFunctions.php";

use \App\getNews as Getnews;

try {
    $newsApi = new Getnews\GetDataNewsapi();
    $newsCatcherApi = new Getnews\GetDataNewscatcherapi();

    $newsData = [];
    $memcached = new Memcached();

    $countNewsapi = 0;
    $countDataNewsapi = 0;

    $countNewsCatcherapi = 0;
    $countDataNewsCatcherapi = 0;

    $countOneNews = 0;

    if($newsCatcherApi->json["status"] == 'error' && $newsApi->json['status'] != 'error') {
        if (count($newsApi->json["articles"]) < 30) {
            $lengthNewsApi = (int)(count($newsApi->json["articles"]) / 3);
        } else {
            $lengthNewsApi = 10;
        }
    } elseif($newsApi->json["status"] == 'error' && $newsCatcherApi->json["status"] != 'error') {
        if (count($newsCatcherApi->json["articles"]) < 30) {
            $lengthNewsCatcherApi = (int) (count($newsCatcherApi->json["articles"]) / 3);
        } else {
            $lengthNewsCatcherApi = 10;
        }

    } elseif($newsApi->json["status"] != 'error' && $newsCatcherApi->json["status"] != 'error') {

        if(count($newsApi->json["articles"]) < 30) {
            $lengthNewsApi = (int) (count($newsApi->json["articles"]) / 3);
        } else {
            $lengthNewsApi = 10;
        }

        if(count($newsCatcherApi->json["articles"]) < 30) {
            $lengthNewsCatcherApi = (int) (count($newsCatcherApi->json["articles"]) / 3);
        } else {
            $lengthNewsCatcherApi = 10;
        }

    }

    $memcached->addServer('127.0.0.1', 11211);
    $cache = $memcached->get('data');

    if(!$cache){

        if($newsCatcherApi->json["status"] == 'error' && $newsApi->json["status"] != 'error'){

            $controlFromExportXml = 'newsapi';

            for($i = 0; $i < $lengthNewsApi; $i++) {

                for ($j = 0; $j < 3; $j++) {

                    $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['img'] = $newsApi->getImg($countDataNewsapi + $j);
                    $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['title'] = $newsApi->getTitle($countDataNewsapi + $j);
                    $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['author'] = $newsApi->getAuthor($countDataNewsapi + $j);
                    $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['date'] = $newsApi->getDate($countDataNewsapi + $j);
                    $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['source'] = $newsApi->getSource($countDataNewsapi + $j);
                    $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['data'] = $newsApi->getData($countDataNewsapi + $j);

                    $countOneNews++;
                }
                $countDataNewsapi += 3;
                $countNewsapi ++;
            }

        } elseif($newsApi->json["status"] == 'error' && $newsCatcherApi->json["status"] != 'error'){

            $controlFromExportXml = 'newscatcherapi';

            for($i = 0; $i < $lengthNewsCatcherApi; $i++) {

                for ($j = 0; $j < 3; $j++) {

                    $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['img'] = $newsCatcherApi->getImg($countDataNewsCatcherapi + $j);
                    $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['title'] = $newsCatcherApi->getTitle($countDataNewsCatcherapi + $j);
                    $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['author'] = $newsCatcherApi->getAuthor($countDataNewsCatcherapi + $j);
                    $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['date'] = $newsCatcherApi->getDate($countDataNewsCatcherapi + $j);
                    $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['source'] = $newsCatcherApi->getSource($countDataNewsCatcherapi + $j);
                    $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['data'] = $newsCatcherApi->getData($countDataNewsCatcherapi + $j);

                    $countOneNews++;
                }
                $countDataNewsCatcherapi += 3;
                $countNewsCatcherapi ++;
            }

        } elseif($newsApi->json["status"] != 'error' && $newsCatcherApi->json["status"] != 'error'){

            $controlFromExportXml = "twosource";

            for($i = 0; $i < 10; $i++) {

                if ($i % 2 == 0) {

                    for ($j = 0; $j < 3; $j++) {

                        $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['img'] = $newsApi->getImg($countDataNewsapi + $j);
                        $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['title'] = $newsApi->getTitle($countDataNewsapi + $j);
                        $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['author'] = $newsApi->getAuthor($countDataNewsapi + $j);
                        $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['date'] = $newsApi->getDate($countDataNewsapi + $j);
                        $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['source'] = $newsApi->getSource($countDataNewsapi + $j);
                        $newsData['allnews']['newsapi-' . $countNewsapi]['onenews-' . $countOneNews]['data'] = $newsApi->getData($countDataNewsapi + $j);

                        $countOneNews++;
                    }
                    $countDataNewsapi += 3;
                    $countNewsapi ++;

                } else {

                    for ($j = 0; $j < 3; $j++) {

                        $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['img'] = $newsCatcherApi->getImg($countDataNewsCatcherapi + $j);
                        $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['title'] = $newsCatcherApi->getTitle($countDataNewsCatcherapi + $j);
                        $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['author'] = $newsCatcherApi->getAuthor($countDataNewsCatcherapi + $j);
                        $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['date'] = $newsCatcherApi->getDate($countDataNewsCatcherapi + $j);
                        $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['source'] = $newsCatcherApi->getSource($countDataNewsCatcherapi + $j);
                        $newsData['allnews']['newscatcherapi-' . $countNewsCatcherapi]['onenews-' . $countOneNews]['data'] = $newsCatcherApi->getData($countDataNewsCatcherapi + $j);

                        $countOneNews++;
                    }
                    $countDataNewsCatcherapi += 3;
                    $countNewsCatcherapi ++;
                }
            }
        }
        $memcached->set('data',$newsData);
        $cache = $memcached->get('data');

    }

    $memcached->flush(15);

    $countNewsapi = 0;
    $countDataNewsapi = 0;

    $countNewsCatcherapi = 0;
    $countDataNewsCatcherapi = 0;

    $countOneNews = 0;

    //pt($cache);
} catch (Error $e) {
    echo $e;
    //$log = new Log\ErrorLog($e, 'log.txt');
}