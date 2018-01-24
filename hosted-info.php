<?php require_once('includes/header.php') ?>

<div class="row">
    <h1>Payment Information</h1>
    <form method="POST" action="hosted-init.php">
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
                <label>Page ID</label>
                <input type="text" name="transaction[page]" placeholder="Page ID (optional)" class="form-control"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label>Currency</label>
                <select name="transction[currency]" class="form-control">
                  <option value="ZAR">ZAR</option>
                  <option value="USD">USD</option>
                  <option value="EUR">EUR</option>
   		</select>
            </div>
        </div>
        <div class="col-md-12">
            <input type="submit" value="Submit"/>
        </div>
    </form>
</div>

<?php require_once('includes/footer.php') ?>
