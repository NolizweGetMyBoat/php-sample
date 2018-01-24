<?php require_once('includes/include.php') ?>
<?php

use PayGenius\Consumer;
use PayGenius\CreatePaymentRequest;
use PayGenius\CreditCard;
use PayGenius\Sample\ExceptionHandler;
use PayGenius\Sample\Http;
use PayGenius\Sample\PayGeniusClientFactory;
use PayGenius\Transaction;

########################################################################################################################
# Collect Input
########################################################################################################################
$cardCvv              = trim(@$_POST['card']['cvv']);
$cardExpiryMonth      = trim(@$_POST['card']['expiry-month']);
$cardExpiryYear       = trim(@$_POST['card']['expiry-year']);
$cardHolder           = trim(@$_POST['card']['holder']);
$cardNumber           = trim(@$_POST['card']['number']);
$transactionReference = trim($_POST['transaction']['reference']);
$transactionAmount    = trim($_POST['transaction']['amount']);
$consumerFirstname    = trim($_POST['consumer']['firstname']);
$consumerLastname     = trim($_POST['consumer']['lastname']);
$consumerEmail        = trim($_POST['consumer']['email']);

########################################################################################################################
# Create Payyment Request
########################################################################################################################

$client = PayGeniusClientFactory::create();

$creditCard  = new CreditCard($cardNumber, $cardHolder, $cardExpiryYear, $cardExpiryMonth, $cardCvv, $cardType);
$transaction = new Transaction($transactionReference, 'ZAR', round($transactionAmount * 100));
$consumer    = new Consumer($consumerFirstname, $consumerLastname, $consumerEmail);

$request = new CreatePaymentRequest($creditCard, $transaction, $consumer);

try {
    $response = $client->createPayment($request);
} catch (Exception $exception) {
    ExceptionHandler::display($exception);
}

// Without 3D-Secure
if (!isset($response->threeDSecure)) {
    Http::redirect('card-execute.php?trx='.$response->reference);
}

$returnUrl = Http::relativeUrl('card-3ds.php?trx='.$response->reference);

########################################################################################################################
# Handle 3D-Secure
########################################################################################################################
?>
<?php include_once('includes/header.php') ?>

<div class="row">
    <h1>3D Secure Confirmation Required</h1>
    <p>You are required to go to the bank's website to validate your card</p>

    <form method="post" action="<?php echo $response->threeDSecure->acsUrl ?>">
        <input type=hidden name="PaReq" value="<?php e($response->threeDSecure->paReq) ?>">
        <input type=hidden name="TermUrl" value="<?php e($returnUrl) ?>"/>
        <input type=hidden name="MD" value="<?php e($response->threeDSecure->transactionId) ?>">
        <input type="submit" value="Continue to Bank"/>
    </form>
</div>

<?php include_once('includes/footer.php') ?>
