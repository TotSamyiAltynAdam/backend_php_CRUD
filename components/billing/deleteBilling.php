<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Billing</title>
    <link rel="stylesheet" href="../../styles/styleTable.css">
</head>
<body>
    <div class="container">
        <p><a href="../../billing.php" class="back-link">All billings</a></p>
        <h2>Delete Billing</h2>
        <?php
            include_once '../../php/config.php';

            $billingID = $_GET['id'];
            $query = "SELECT * FROM p2billing WHERE BillingID = $billingID";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) == 1) {
                $billingData = mysqli_fetch_assoc($result);
                $expMonth = trim(substr($billingData['ExpDate'], 0, 2));
                $expYear = trim(substr($billingData['ExpDate'], 3));
        ?>
        <form action="doDeleteBilling.php" method="post">
            <label for="billingID">Billing ID:</label><br>
            <input type="number" id="billingID" name="billingID" value="<?php echo $billingData['BillingID']; ?>" disabled><br>
            <input type="hidden" id="billingID" name="billingID" value="<?php echo $billingData['BillingID']; ?>">

            <label for="login">Login:</label><br>
            <input type="text" id="login" name="login" value="<?php echo $billingData['Login']; ?>" disabled><br>

            <label for="billName">BillName:</label><br>
            <input type="text" id="billName" name="billName" value="<?php echo $billingData['BillName']; ?>" disabled><br><br>

            <label for="billAddress">BillAddress:</label><br>
            <input type="text" id="billAddress" name="billAddress" value="<?php echo $billingData['BillAddress']; ?>" disabled><br><br>
            
            <label for="billCity">BillCity:</label><br>
            <input type="text" id="billCity" name="billCity" value="<?php echo $billingData['BillCity']; ?>" disabled><br><br>

            <label for="billState ">BillState:</label><br>
            <input type="text" id="billState" name="billState" value="<?php echo $billingData['BillState']; ?>" disabled><br><br>

            <label for="billZip">BillZip:</label><br>
            <input type="text" id="billZip" name="billZip" value="<?php echo $billingData['BillZip']; ?>" disabled><br><br>

            <label for="cardType">CardType:</label><br>
            <input type="text" id="cardType" name="cardType" value="<?php echo $billingData['CardType']; ?>" disabled><br><br>

            <label for="cardNumber ">CardNumber :</label><br>
            <input type="text" id="cardNumber" name="cardNumber" value="<?php echo $billingData['CardNumber']; ?>" disabled><br><br>

            <label for="expirationMonth">Expiration Month:</label><br>
            <input type="text" id="expirationMonth" name="expirationMonth" value="<?php echo $expMonth ?>" disabled><br>

            <label for="expirationYear">Expiration Year:</label><br>
            <input type="text" id="expirationYear" name="expirationYear" value="<?php echo $expYear ?>" disabled><br><br>

            <input type="submit" value="Delete Billing">
        </form>
        <?php
        } else {
            echo "Billing not found.";
        }

        include_once '../../php/closeDbConn.php';
        ?>
    </div>
</body>
</html>
