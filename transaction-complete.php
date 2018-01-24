<?php require_once('includes/include.php') ?>
<?php

use PayGenius\LookupTransactionRequest;
use PayGenius\Sample\ExceptionHandler;
use PayGenius\Sample\PayGeniusClientFactory;

$transactionReference = $_GET['trx'];

$client = PayGeniusClientFactory::create();

try {
    $response = $client->lookupTransaction(new LookupTransactionRequest($transactionReference));
} catch (Exception $exception) {
    ExceptionHandler::display($exception);
}
?>
<?php include_once('includes/header.php') ?>

<div class="row">
    <h1>Payment Complete</h1>
    <dl>
        <dt>Reference</dt>
        <dd><?php e($response->reference) ?></dd>
        <dt>Amount</dt>
        <dd><?php e(number_format($response->amount / 100, 2, '.', '')) ?></dd>
        <dt>Currency</dt>
        <dd><?php e($response->currency) ?></dd>
        <dt>Status</dt>
        <dd><?php e($response->status) ?></dd>
    </dl>
</div>

<?php include_once('includes/footer.php') ?>