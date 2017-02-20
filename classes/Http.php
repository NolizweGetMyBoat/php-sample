<?php

namespace PayGenius\Sample;

class Http
{

    public function redirect($url)
    {
        header(sprintf('Location: '.$url));

        die();
    }

    public static function relativeUrl($path = "")
    {
        return Config::get('baseurl').$path;
    }
}