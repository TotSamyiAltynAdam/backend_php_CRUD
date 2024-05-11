<?php
include_once '../../php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shippingID = $_POST['shippingID'];

    $delete_query = "DELETE FROM p2shipping WHERE ShippingID = $shippingID";
    $delete_result = mysqli_query($con, $delete_query);

    if ($delete_result) {
        header("Location: ../../shipping.php");
        exit();
    } else {
        echo "Error deleting shipping: " . mysqli_error($con);
    }
}

include_once '../../php/closeDbConn.php';
?>
