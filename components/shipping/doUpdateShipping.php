<?php
include_once '../../php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shippingID = $_POST['shippingID'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];

    $update_query = "UPDATE p2shipping 
                    SET Name = '$name', 
                    Address = '$address', City = '$city', 
                    State = '$state', Zip = '$zip'
                    WHERE ShippingID = $shippingID";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        header("Location: ../../shipping.php");
        exit();
    } else {
        echo "Error updating shipping: " . mysqli_error($con);
    }
}

include_once '../../php/closeDbConn.php';
?>
