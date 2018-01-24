<?php require_once('includes/include.php') ?>
<?php

use PayGenius\ExecutePaymentRequest;
use PayGenius\Sample\ExceptionHandler;
use PayGenius\Sample\Http;
use PayGenius\Sample\PayGeniusClientFactory;

$transactionReference = $_GET['trx'];

$client = PayGeniusClientFactory::create();

try {
    $response = $client->executePayment(new ExecutePaymentRequest($transactionReference));
} catch (Exception $exception) {
    ExceptionHandler::display($exception);
}

Http::redirect('transaction-complete.php?trx='.$transactionReference);
