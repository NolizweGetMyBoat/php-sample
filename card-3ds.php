<?php require_once('includes/include.php') ?>
<?php

use PayGenius\ConfirmPaymentRequest;
use PayGenius\Sample\ExceptionHandler;
use PayGenius\Sample\Http;
use PayGenius\Sample\PayGeniusClientFactory;

$transactionReference = $_GET['trx'];
$paRes                = $_POST['PaRes'];

try {
    $client = PayGeniusClientFactory::create();
} catch (Exception $exception) {
    ExceptionHandler::display($exception);
}

$response = $client->confirmPayment(new ConfirmPaymentRequest($transactionReference, $paRes));

Http::redirect('card-execute.php?trx='.$transactionReference);
