<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Billing</title>
    <link rel="stylesheet" href="../../styles/styleTable.css">
    <script>
        function validateForm() {
            var billingID = document.getElementById("billingID").value;
            var title = document.getElementById("title").value;
            var author = document.getElementById("author").value;
            var isbn = document.getElementById("isbn").value;

            if (bookID === "" || title === "" || author === "" || isbn === "") {
                alert("Please fill in all required fields.");
                return false;
            }
            if (isbn.length !== 13 || isNaN(isbn)) {
                alert("ISBN must be exactly 13 digits and contain only numbers.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
    <div class="container">
        <p><a href="../../billing.php" class="back-link">All billings</a></p>
        <h2>Update Billing Information</h2>
        <?php
        include_once '../../php/config.php';

        $billingID = $_GET['id'];
        $query = "SELECT * FROM p2billing WHERE BillingID = $billingID";
        $result = mysqli_query($con, $query);

        if (isset($_SESSION['error_message'])) {
            echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }

        if (mysqli_num_rows($result) == 1) {
            $billingData = mysqli_fetch_assoc($result);

            $expMonth = trim(substr($billingData['ExpDate'], 0, 2));
            $expYear = trim(substr($billingData['ExpDate'], 3));
        ?>
        <form action="doUpdateBilling.php" method="post" onsubmit="return validateForm()">
            <label for="billingID">Billing ID:</label><br>
            <input type="number" id="billingID" name="billingID" value="<?php echo $billingData['BillingID']; ?>" readonly><br>

            <label for="login">Login:</label><br>
            <input type="text" id="login" name="login" value="<?php echo $billingData['Login']; ?>" readonly><br>

            <label for="billName">BillName:</label><br>
            <input type="text" id="billName" name="billName" value="<?php echo $billingData['BillName']; ?>"><br><br>

            <label for="billAddress">BillAddress:</label><br>
            <input type="text" id="billAddress" name="billAddress" value="<?php echo $billingData['BillAddress']; ?>"><br><br>

            <label for="billCity">BillCity:</label><br>
            <input type="text" id="billCity" name="billCity" value="<?php echo $billingData['BillCity']; ?>"><br><br>

            <label for="billState">BillState:</label><br>
            <input type="text" id="billState" name="billState" value="<?php echo $billingData['BillState']; ?>"><br><br>

            <label for="billZip">BillZip:</label><br>
            <input type="text" id="billZip" name="billZip" value="<?php echo $billingData['BillZip']; ?>"><br><br>

            <label>CardType:</label><br>
            <input type="radio" id="Visa" name="cardType" value="Visa" <?php if ($billingData['CardType'] == 'Visa') echo 'checked'; ?>>
            <label for="Visa">Visa</label>

            <input type="radio" id="MasterCard" name="cardType" value="MasterCard" <?php if ($billingData['CardType'] == 'MasterCard') echo 'checked'; ?>>
            <label for="MasterCard">MasterCard</label>

            <input type="radio" id="Discover" name="cardType" value="Discover" <?php if ($billingData['CardType'] == 'Discover') echo 'checked'; ?>>
            <label for="Discover">Discover</label>

            <input type="radio" id="AmericanExpress" name="cardType" value="American Express" <?php if ($billingData['CardType'] == 'American Express') echo 'checked'; ?>>
            <label for="AmericanExpress">American Express</label>

            <label for="cardNumber">Card Number:</label><br>
            <input type="text" id="cardNumber" name="cardNumber" value="<?php echo $billingData['CardNumber']; ?>"><br><br>

            <label for="expMonth">Expiration Month:</label><br>
            <select name="expMonth" id="expMonth">
                <option value="- Expiration Month -">- Expiration Month -</option>
                <?php
                    for ($month = 1; $month <= 12; $month++) {
                        $selected = ($month == $expMonth) ? 'selected' : '';
                        echo "<option value=\"$month\" $selected>$month</option>";
                    }
                ?>
            </select>
            <br/><br/>

            <label for="expYear">Expiration Year:</label><br>
            <select name="expYear" id="expYear">
                <option value="- Expiration Year -">- Expiration Year -</option>
                <?php
                    for ($year = 24; $year <= 50; $year++) {
                        $selected = ($year == $expYear) ? 'selected' : '';
                        echo "<option value=\"$year\" $selected>$year</option>";
                    }
                ?>
            </select>
            <br/><br/>

            <input type="submit" value="Update Book Info">
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