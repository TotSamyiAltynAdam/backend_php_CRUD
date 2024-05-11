<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Shipping</title>
    <link rel="stylesheet" href="../../styles/styleTable.css">
</head>
<body>
    <div class="container">
        <p><a href="../../shipping.php" class="back-link">All shippings</a></p>
        <h2>Delete Shipping</h2>
        <?php
            include_once '../../php/config.php';

            $shippingID = $_GET['id'];
            $query = "SELECT * FROM p2shipping WHERE ShippingID = $shippingID";
            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) == 1) {
                $shippingData = mysqli_fetch_assoc($result);
        ?>
        <form action="doDeleteShipping.php" method="post">
            <label for="shippingID">Shipping ID:</label><br>
            <input type="number" id="shippingID" name="shippingID" value="<?php echo $shippingData['ShippingID']; ?>" disabled><br>
            <input type="hidden" id="shippingID" name="shippingID" value="<?php echo $shippingData['ShippingID']; ?>">

            <label for="login">Login:</label><br>
            <input type="text" id="login" name="login" value="<?php echo $shippingData['Login']; ?>" disabled><br>

            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name" value="<?php echo $shippingData['Name']; ?>" disabled><br><br>

            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address" value="<?php echo $shippingData['Address']; ?>" disabled><br><br>
            
            <label for="city">City:</label><br>
            <input type="text" id="city" name="city" value="<?php echo $shippingData['City']; ?>" disabled><br><br>

            <label for="state">State:</label><br>
            <input type="text" id="state" name="state" value="<?php echo $shippingData['State']; ?>" disabled><br><br>

            <label for="zip">Zip:</label><br>
            <input type="text" id="zip" name="zip" value="<?php echo $shippingData['Zip']; ?>" disabled><br><br>

            <input type="submit" value="Confirm Delete">
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
