<?php

namespace PayGenius\Sample;

use Exception;

class ExceptionHandler
{

    public function display(Exception $exception)
    {
        require_once(__DIR__.'/../error-page.php');

        die();
    }
}