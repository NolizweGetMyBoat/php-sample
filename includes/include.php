<?php require_once(__DIR__.'/../vendor/autoload.php') ?>
<?php

function e($value, $return = false)
{
    $encoded = htmlentities($value, ENT_QUOTES, 'UTF-8', false);

    if ($return) {
        return $encoded;
    }

    echo $encoded;
}
