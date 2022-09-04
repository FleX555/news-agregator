<?php

require  __DIR__ . "/../vendor/autoload.php";

$log = new \App\log\ErrorLog($_GET['error'], '../log.txt');
