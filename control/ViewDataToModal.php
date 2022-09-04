<?php

require_once __DIR__ . "/../classes/control/DataNews.php";

try {

    /*echo $_GET['source'] . '-' . $_GET['number'];
    echo 'onenews-' . $_GET['id'];*/
    echo $cache['allnews'][$_GET['source'] . '-' . $_GET['number']]['onenews-' . $_GET['id']]['data'];

} catch(Error $e) {
    echo $e;
    //$log = new Log\ErrorLog($e, '../log.txt');
}
