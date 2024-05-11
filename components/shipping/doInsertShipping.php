<?php
session_start();

include_once '../../php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $shippingID = $_POST['shippingID'];

    $check_query = "SELECT ShippingID FROM p2shipping WHERE ShippingID = '$shippingID'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = "Error: Shipping with ID $shippingID already exists.";
        header("Location: insertShipping.php");
        exit();
    } else {
        $login = $_POST['login'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $zip = $_POST['zip'];

        $insert_query = "INSERT INTO p2shipping (ShippingID, Login, Name, Address, City, State, Zip) 
                            VALUES ('$shippingID', '$login', '$name', '$address', '$city', '$state', '$zip')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            header("Location: ../../shipping.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

include_once '../../php/closeDbConn.php';
?>
