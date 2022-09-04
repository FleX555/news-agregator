<?php

require_once __DIR__ . "/../classes/control/DataNews.php";

$fp = fopen('newsList.xml', 'w');

if($_GET['value'] == 'twosource') {

    $saveXmlNewsFromTwoSources = new \App\saveXml\SaveXmlNewsFromTwoSources();
    $saveXmlNewsFromTwoSources->createXmlFromTwoSources($cache);

} elseif($_GET['value'] == 'newscatcherapi' || $_GET['value'] == 'newsapi') {

    $saveXmlSingleSource = new \App\saveXml\SaveXmlSingleSource();
    $saveXmlSingleSource->createXmlSingleSource($cache, $_GET['value']);

}

fclose($fp);

if($_GET['value'] == 'delete') {

    unlink('newsList.xml');

}



