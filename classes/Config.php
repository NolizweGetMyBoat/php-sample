<?php

namespace PayGenius\Sample;

class Config
{
    private static $config;

    public static function get($key = null)
    {
        if (empty(self::$config)) {
            self::$config = require_once(__DIR__.'/../config.php');
        }

        if ($key === null) {
            return self::$config;
        } else {
            if (!isset(self::$config[$key])) {
                throw new Exception(sprintf('No configuration found for %s', $key));
            }
            
            return self::$config[$key];
        }
    }
}