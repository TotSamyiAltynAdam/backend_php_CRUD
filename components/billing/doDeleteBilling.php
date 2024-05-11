<?php
include_once '../../php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $billingID = $_POST['billingID'];

    $delete_query = "DELETE FROM p2billing WHERE BillingID = $billingID";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        header("Location: ../../billing.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($con);
    }
}

include_once '../../php/closeDbConn.php';
?>
