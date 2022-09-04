<?php

namespace App\saveXml;
use DOMDocument;

class SaveXmlSingleSource
{
     public function createXmlSingleSource($arr, $newsSource)
     {
         $dom = new domDocument("1.0", "utf-8");

         foreach ($arr as $key => $value) {

             $allnews = $dom->createElement("allnews");
             $dom->appendChild($allnews);
             $news = $dom->createElement($newsSource);

             foreach ($value as $keys => $item){

                 foreach ($item as $k => $v){

                     $onenews = $dom->createElement("$k");

                     foreach ($v as $index => $data){

                         if ($index == "img") {

                             $img = $dom->createElement("img");
                             $imgtext = $dom->createTextNode($data);
                             $img->appendChild($imgtext);
                             $onenews->appendChild($img);
                             $news->appendChild($onenews);
                             $allnews->appendChild($news);

                         } elseif($index == 'title') {

                             $title = $dom->createElement("title");
                             $titleText = $dom -> createTextNode($data);
                             $title->appendChild($titleText);
                             $onenews->appendChild($title);
                             $news->appendChild($onenews);
                             $allnews->appendChild($news);

                         } elseif($index == "author") {

                             $author = $dom->createElement("author");
                             $authorText = $dom -> createTextNode($data);
                             $author->appendChild($authorText);
                             $onenews->appendChild($author);
                             $news->appendChild($onenews);
                             $allnews->appendChild($news);

                         } elseif($index == "date") {

                             $date = $dom->createElement("date");
                             $dateText = $dom -> createTextNode($data);
                             $date ->appendChild($dateText);
                             $onenews->appendChild($date);
                             $news->appendChild($onenews);
                             $allnews->appendChild($news);

                         } elseif($index == "source") {

                             $source = $dom->createElement("source");
                             $sourceText = $dom -> createTextNode($data);
                             $source ->appendChild($sourceText);
                             $onenews->appendChild($source);
                             $news->appendChild($onenews);
                             $allnews->appendChild($news);

                         } elseif($index == "data") {

                             $dataNews = $dom->createElement("data");
                             $dataNewsText = $dom -> createTextNode($data);
                             $dataNews ->appendChild($dataNewsText);
                             $onenews->appendChild($dataNews);
                             $news->appendChild($onenews);
                             $allnews->appendChild($news);
                         }
                     }
                 }
             }
         }
         $dom->save("newsList.xml");
     }
}