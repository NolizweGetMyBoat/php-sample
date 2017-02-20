<?php

namespace PayGenius\Sample;

use PayGenius\Client;

class PayGeniusClientFactory
{

    /**
     *
     * @return Client
     */
    public static function create()
    {
        $config = Config::get();

        $logger = null;
        if (!empty($config['log'])) {
            if ($config['log'] === true) {
                $logger = function($message) {
                    error_log($message);
                };
            } elseif (is_string(@$config['log'])) {
                $logger = function($message) use($config) {
                    error_log($message, 3, $config['log']);
                };
            }
        }

        return new Client($config['token'], $config['secret'], $config['endpoint'], $logger);
    }
}