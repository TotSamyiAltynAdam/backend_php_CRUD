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
    <title>Select</title>
    <link rel="stylesheet" href="styles/styleTable.css">
</head>
<body>
    <div class="container">
        <?php
            $billings_query = "SELECT * FROM p2billing WHERE Login=?";
            $stmt = mysqli_prepare($con, $billings_query);
            mysqli_stmt_bind_param($stmt, "s", $_SESSION['login']);
            mysqli_stmt_execute($stmt);
            $billings_result = mysqli_stmt_get_result($stmt);

            if (!$billings_result) {
                echo "Error: " . mysqli_error($con);
                exit();
            }
        ?>

        <p style="text-align:center;">
            <a href="components/billing/insertBilling.php">Insert Billing</a>
        </p>

        <h2>Billing Information</h2>
        <table>
            <tr>
                <th>Billing ID</th>
                <th>Login</th>
                <th>BillName</th>
                <th>BillAddress</th>
                <th>BillCity</th>
                <th>BillState</th>
                <th>BillZip</th>
                <th>CardType</th>
                <th>CardNumber</th>
                <th>ExpDate</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($billings_result)) {
                echo "<tr>";
                echo "<td>".$row['BillingID']."</td>";
                echo "<td>".$row['Login']."</td>";
                echo "<td>".$row['BillName']."</td>";
                echo "<td>".$row['BillAddress']."</td>";
                echo "<td>".$row['BillCity']."</td>";
                echo "<td>".$row['BillState']."</td>";
                echo "<td>".$row['BillZip']."</td>";
                echo "<td>".$row['CardType']."</td>";
                echo "<td>".$row['CardNumber']."</td>";
                echo "<td>".$row['ExpDate']."</td>";
                echo "<td><a href='components/billing/updateBilling.php?id=".$row['BillingID']."'>Update</a></td>";
                echo "<td><a href='components/billing/deleteBilling.php?id=".$row['BillingID']."'>Delete</a></td>";
                echo "</tr>";
            }
            ?>
        </table>

        <?php include_once 'php/closeDbConn.php'; ?>

        <p><a href="home.php" class="back-link">Back to Home</a></p>
    </div>
</body>
</html>
