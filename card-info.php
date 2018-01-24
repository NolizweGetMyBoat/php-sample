<?php require_once('includes/header.php') ?>

<div class="row">
    <h1>Card Information</h1>
    <form method="POST" action="card-auth.php">
        <h3>Consumer Information</h3>
        <div class="col-md-12">
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="consumer[firstname]" placeholder="First Name" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="consumer[lastname]" placeholder="Last Name" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="consumer[email]" placeholder="Email" class="form-control"/>
            </div>
        </div>
        <h3>Transaction Information</h3>
        <div class="col-md-12">
            <div class="form-group">
                <label>Transaction Reference</label>
                <input type="text" name="transaction[reference]" placeholder="Transaction Reference" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Amount</label>
                <input type="text" name="transaction[amount]" placeholder="Amount" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Currency</label>
                <select name="transaction[currency]" class="form-control">
                  <option value="ZAR">ZAR</option>
                  <option value="USD">USD</option>
                  <option value="EUR">EUR</option>
   		</select>
            </div>
        </div>
        <h3>Card Information</h3>
        <div class="col-md-12">
            <div class="form-group">
                <label>Card Number</label>
                <input type="text" name="card[number]" placeholder="Card Number" class="form-control"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Expiry Month</label>
                <select class="form-control" name="card[expiry-month]">
                    <option value="1">01 - January</option>
                    <option value="2">02 - February</option>
                    <option value="3">03 - March</option>
                    <option value="4">04 - April</option>
                    <option value="5">05 - May</option>
                    <option value="6">06 - June</option>
                    <option value="7">07 - July</option>
                    <option value="8">08 - August</option>
                    <option value="9">09 - September</option>
                    <option value="10">10 - October</option>
                    <option value="11">11 - November</option>
                    <option value="12">12 - December</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Expiry Year</label>
                <select class="form-control" name="card[expiry-year]">
                    <?php for ($i = date('Y'), $c = date('Y') + 20; $i < $c; $i++): ?>
                        <option value="<?php echo $i ?>"><?php echo $i ?></option>
                    <?php endfor ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Card Holder Name</label>
                <input type="text" name="card[holder]" placeholder="Card Holder Name" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>CVV</label>
                <input type="text" name="card[cvv]" placeholder="CVV" class="form-control"/>
            </div>
        </div>

        <div class="col-md-12">
            <input type="submit" value="Submit"/>
        </div>
    </form>
</div>

<?php require_once('includes/footer.php') ?>
