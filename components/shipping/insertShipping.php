<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Shipping</title>
    <link rel="stylesheet" href="../../styles/styleTable.css">
    <script>
        function validateForm() {
            var shippingID = document.getElementById("shippingID").value;
            var name = document.getElementById("name").value;
            var address = document.getElementById("address").value;
            var city = document.getElementById("city").value;
            var state = document.getElementById("state").value;
            var zip = document.getElementById("zip").value;

            if (
                shippingID === "" || name === "" || address === "" ||
                city === "" || state === "" || zip === ""
            ) {
                alert("Please fill in all required fields.");
                return false;
            }

            if (shippingID.length > 30 || name.length > 50 || address.length > 30 || city.length > 30 || state.length > 20 || zip.length > 10) {
                alert("Please make sure all fields satisfy the maximum length requirements.");
                return false;
            }
                   
            return true;
        }
    </script>
</head>
<body>
    <?php include_once '../../php/config.php'; ?>
    <div class="container">
        <p><a href="../../shipping.php" class="back-link">All shippings</a></p>
        <h2>Add New Shipping</h2>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
        ?>
        <form action="doInsertShipping.php" method="post" onsubmit="return validateForm()">
            <label for="shippingID">Shipping ID:</label><br>
            <input type="number" id="shippingID" name="shippingID"><br><br>

            <label for="login">Login</label><br>
            <input type="text" id="login" name="login" value="<?php echo isset($_SESSION['login']) ? $_SESSION['login'] : ''; ?>" readonly><br><br>

            <label for="name">Name</label><br>
            <input type="text" id="name" name="name"><br><br>

            <label for="address">Address</label><br>
            <input type="text" id="address" name="address"><br><br>

            <label for="city">City</label><br>
            <input type="text" id="city" name="city"><br><br>

            <label for="state">State</label><br>
            <input type="text" id="state" name="state"><br><br>

            <label for="zip">Zip</label><br>
            <input type="text" id="zip" name="zip"><br><br>

            <input type="submit" value="Insert">
        </form>
    </div>
</body>
</html>
