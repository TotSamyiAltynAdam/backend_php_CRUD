<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Billing</title>
    <link rel="stylesheet" href="../../styles/styleTable.css">
    <script>
        function validateForm() {
            var billingID = document.getElementById("billingID").value;
            var billName = document.getElementById("billName").value;
            var billAddress = document.getElementById("billAddress").value;
            var billCity = document.getElementById("billCity").value;
            var billState = document.getElementById("billState").value;
            var billZip = document.getElementById("billZip").value;
            var cardType = document.querySelector('input[name="cardType"]:checked');
            var cardNumber = document.getElementById("cardNumber").value;
            var expMonth = document.getElementById("expMonth").value;
            var expYear = document.getElementById("expYear").value;

            if (!cardType) {
                alert("Please select a card type.");
                return false;
            }
            if (
                billingID.length > 30 || billName.length > 50 || billAddress.length > 30 ||
                billCity.length > 30 || billState.length > 20 || billZip.length > 10 ||
                cardNumber.length > 16
            ) {
                alert("Please make sure all fields satisfy the maximum length requirements.");
                return false;
            }
            if (!/^\d{1,16}$/.test(cardNumber)) {
                alert("Card number must be between 1 and 16 digits.");
                return false;
            }
            if (!(/^\d{1,2}\/\d{1,2}$/.test(expMonth + '/' + expYear))) {
                alert("Expiration date must be in the format MM/YY.");
                return false;
            }
            if (
                billingID === "" || billName === "" || billAddress === "" ||
                billCity === "" || billState === "" || billZip === "" || cardType === "" ||
                cardNumber === "" || expMonth === "" || expYear === ""
            ) {
                alert("Please fill in all required fields.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <?php include_once '../../php/config.php'; ?>
    <div class="container">
        <p><a href="../../billing.php" class="back-link">All billings</a></p>
        <h2>Add New Billing</h2>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
        ?>
        <form action="doInsertBilling.php" method="post" onsubmit="return validateForm()">
            <label for="billingID">Billing ID:</label><br>
            <input type="number" id="billingID" name="billingID"><br><br>

            <label for="login">Login</label><br>
            <input type="text" id="login" name="login" value="<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : ''; ?>" readonly><br><br>

            <label for="billName">BillName</label><br>
            <input type="text" id="billName" name="billName"><br><br>

            <label for="billAddress">BillAddress</label><br>
            <input type="text" id="billAddress" name="billAddress"><br><br>

            <label for="billCity">BillCity</label><br>
            <input type="text" id="billCity" name="billCity"><br><br>

            <label for="billState">BillState</label><br>
            <input type="text" id="billState" name="billState"><br><br>

            <label for="billZip">BillZip</label><br>
            <input type="text" id="billZip" name="billZip"><br><br>

            <span>CardType?</span><br>
            <input type="radio" id="Visa" name="cardType" value="Visa">
            <label for="Visa">Visa</label>
            <input type="radio" id="MasterCard" name="cardType" value="MasterCard">
            <label for="MasterCard">MasterCard</label>
            <input type="radio" id="Discover" name="cardType" value="Discover">
            <label for="Discover">Discover</label>
            <input type="radio" id="AmericanExpress" name="cardType" value="American Express">
            <label for="AmericanExpress">American Express</label><br><br>

            <label for="cardNumber">Card Number:</label><br>
            <input type="number" id="cardNumber" name="cardNumber"><br><br>

            <label for="expMonth">Expiration Month:</label><br>
            <select name="expMonth" id="expMonth">
                <option value="- Expiration Month -">- Expiration Month -</option>
                <?php
                    for ($month = 1; $month <= 12; $month++) {
                        echo "<option value=\"$month\">$month</option>";
                    }
                ?>
            </select>
            <br/><br/>

            <label for="expYear">Expiration Year:</label><br>
            <select name="expYear" id="expYear">
                <option value="- Expiration Year -">- Expiration Year -</option>
                <?php
                    for ($year = 24; $year <= 50; $year++) {
                        echo "<option value=\"$year\">$year</option>";
                    }
                ?>
            </select>
            <br/><br/>

            <input type="submit" value="Insert">
        </form>
    </div>
</body>
</html>
