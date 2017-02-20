<?php require_once('includes/include.php') ?>
<?php

use PayGenius\Sample\PayGeniusClientFactory;
use PayGenius\ValidateRequest;

$client = PayGeniusClientFactory::create();

try {
    $response = $client->validate(new ValidateRequest());
} catch (Exception $exception) {
    ExceptionHandler::display($exception);
}
?>
<?php require_once('includes/header.php') ?>
<div class="row">
    <h1>Validation Test</h1>
    <dl>
        <dt>Merchant Name</dt>
        <dd><?php e($response->merchant) ?></dd>
    </dl>
</div>
<?php require_once('includes/footer.php') ?>