<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Shipping</title>
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
    <div class="container">
        <p><a href="../../shipping.php" class="back-link">All shippings</a></p>
        <h2>Update Shipping Information</h2>
        <?php
        include_once '../../php/config.php';

        $shippingID = $_GET['id'];
        $query = "SELECT * FROM p2shipping WHERE ShippingID = $shippingID";
        $result = mysqli_query($con, $query);

        if (isset($_SESSION['error_message'])) {
            echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }

        if (mysqli_num_rows($result) == 1) {
            $shippingData = mysqli_fetch_assoc($result);
        ?>
        <form action="doUpdateShipping.php" method="post" onsubmit="return validateForm()">
            <label for="shippingID">Shipping ID:</label><br>
            <input type="number" id="shippingID" name="shippingID" value="<?php echo $shippingData['ShippingID']; ?>" readonly><br>

            <label for="login">Login:</label><br>
            <input type="text" id="login" name="login" value="<?php echo $shippingData['Login']; ?>" readonly><br>

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $shippingData['Name']; ?>"><br><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="<?php echo $shippingData['Address']; ?>"><br><br>

            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" value="<?php echo $shippingData['City']; ?>"><br><br>

            <label for="state">State:</label><br>
            <input type="text" id="state" name="state" value="<?php echo $shippingData['State']; ?>"><br><br>

            <label for="zip">Zip:</label><br>
            <input type="text" id="zip" name="zip" value="<?php echo $shippingData['Zip']; ?>"><br><br>

            <input type="submit" value="Update Shipping Info">
        </form>
        <?php
        } else {
            echo "Shipping not found.";
        }

        include_once '../../php/closeDbConn.php';
        ?>
    </div>
</body>
</html>
