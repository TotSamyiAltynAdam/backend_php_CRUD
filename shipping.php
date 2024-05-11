<?php 
    session_start();

    include("php/config.php");
    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Information</title>
    <link rel="stylesheet" href="styles/styleTable.css">
</head>
<body>
    <div class="container">
        <?php
            $shippings_query = "SELECT * FROM p2shipping WHERE Login=?";
            $stmt = mysqli_prepare($con, $shippings_query);
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['login']);
            mysqli_stmt_execute($stmt);
            $shippings_result = mysqli_stmt_get_result($stmt);

            if (!$shippings_result) {
                echo "Error: " . mysqli_error($con);
                exit();
            }
        ?>

        <p style="text-align:center;">
            <a href="components/shipping/insertShipping.php">Insert Shipping</a>
        </p>

        <h2>Shipping Information</h2>
        <table>
            <tr>
                <th>Shipping ID</th>
                <th>Login</th>
                <th>Name</th>
                <th>Address</th>
                <th>City</th>
                <th>State</th>
                <th>Zip</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($shippings_result)) {
                echo "<tr>";
                echo "<td>".$row['ShippingID']."</td>";
                echo "<td>".$row['Login']."</td>";
                echo "<td>".$row['Name']."</td>";
                echo "<td>".$row['Address']."</td>";
                echo "<td>".$row['City']."</td>";
                echo "<td>".$row['State']."</td>";
                echo "<td>".$row['Zip']."</td>";
                echo "<td><a href='components/shipping/updateShipping.php?id=".$row['ShippingID']."'>Update</a></td>";
                echo "<td><a href='components/shipping/deleteShipping.php?id=".$row['ShippingID']."'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>

        <?php include_once 'php/closeDbConn.php'; ?>

        <p><a href="home.php" class="back-link">Back to Home</a></p>
    </div>
</body>
</html>
