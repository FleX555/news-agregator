<?php

namespace App\Cache;

class Memcache
{
    protected static ?\Memcached $instance = null;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance !== null) {
            return self::$instance;
        }

        self::$instance = new \Memcached();
        self::$instance->addServer('127.0.0.1', 11211); // коннекты в env

        return self::$instance;

//        if (self::$instance === null) {
//            self::$instance = new \Memcached();
//            self::$instance->addServer('127.0.0.1', 11211);
//        } else {
//            return self::$instance;
//        }
//
//        return self::$instance;
    }
}
