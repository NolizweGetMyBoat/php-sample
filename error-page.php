<?php

function printValidationMessages($errors)
{
    foreach ($errors as $k => $v) {
        echo '<dl>';
        echo '<dt>'.e($k, true).'</dt>';
        echo '<dd>';
        if (is_array($v)) {
            printValidationMessages($v);
        } else {
            e($v);
        }
        echo '</dd>';
        echo '</dl>';
    }
}
$source = $exception->getTrace()[1];
?>
<?php require_once('includes/header.php') ?>

<div class="row">
    <h1>API Error</h1>
    <dl class="error">
        <dt>Exception Type</dt>
        <dd><?php echo e(get_class($exception)) ?></dd>
        <dt>Message</dt>
        <dd><?php echo e($exception->getMessage()) ?></dd>
        <dt>Code</dt>
        <dd><?php echo e($exception->getCode()) ?></dd>
        <dt>Source</dt>
        <dd><?php echo e($source['file']) ?> (<?php echo e($source['line']) ?>)</dd>

        <?php if ($exception instanceof PayGenius\PayGeniusValidationException): ?>
            <dt>Validation Errors</dt>
            <dd>
                <?php printValidationMessages($exception->getErrors()) ?>
            </dd>
        <?php endif ?>
    </dl>
</div>
<?php require_once('includes/footer.php') ?>