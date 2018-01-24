<?php require_once('includes/include.php') ?>
<?php

use PayGenius\Consumer;
use PayGenius\CreateInstantEftPaymentRequest;
use PayGenius\Sample\ExceptionHandler;
use PayGenius\Sample\Http;
use PayGenius\Sample\PayGeniusClientFactory;
use PayGenius\Transaction;
use PayGenius\Urls;

########################################################################################################################
# Collect Input
########################################################################################################################
// Get POST data
$transactionReference = trim($_POST['transaction']['reference']);
$transactionAmount    = trim($_POST['transaction']['amount']);
$consumerFirstname    = trim($_POST['consumer']['firstname']);
$consumerLastname     = trim($_POST['consumer']['lastname']);
$consumerEmail        = trim($_POST['consumer']['email']);

########################################################################################################################
# Create EFT request
########################################################################################################################

$client = PayGeniusClientFactory::create();

$transaction = new Transaction($transactionReference, 'ZAR', round($transactionAmount * 100));
$consumer    = new Consumer($consumerFirstname, $consumerLastname, $consumerEmail);
$urls        = new Urls(Http::relativeUrl('transaction-complete.php').'?trx=${reference}',
    Http::relativeUrl('transaction-complete.php').'?trx=${reference}');
$request     = new CreateInstantEftPaymentRequest($transaction, $consumer, $urls);

try {
    $response = $client->createEftPayment($request);
} catch (Exception $exception) {
    ExceptionHandler::display($exception);
}

Http::redirect($response->redirectUrl);