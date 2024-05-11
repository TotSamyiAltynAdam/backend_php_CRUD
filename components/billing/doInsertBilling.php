<?php
session_start();

include_once '../../php/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $billingID = $_POST['billingID'];

    $check_query = "SELECT BillingID FROM p2billing WHERE BillingID = '$billingID'";
    $check_result = mysqli_query($con, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        $_SESSION['error_message'] = "Error: Billing with ID $billingID already exists.";
        header("Location: insertBilling.php");
        exit();
    } else {

        function addLeadingZero($value) {
            return strlen($value) < 2 ? '0' . $value : $value;
        }

        $login = $_POST['login'];
        $billName = $_POST['billName'];
        $billAddress = $_POST['billAddress'];
        $billCity = $_POST['billCity'];
        $billState = $_POST['billState'];
        $billZip = $_POST['billZip'];
        $cardType = $_POST['cardType'];
        $cardNumber = $_POST['cardNumber'];

        $expMonth = addLeadingZero($_POST['expMonth']);
        $expYear = addLeadingZero($_POST['expYear']);
        $expDate = $expMonth . '/' . $expYear;

        $insert_query = "INSERT INTO p2billing (BillingID, Login, BillName, BillAddress, BillCity, BillState, BillZip, CardType, CardNumber, ExpDate) 
                            VALUES ('$billingID', '$login', '$billName', '$billAddress', '$billCity', '$billState', '$billZip', '$cardType', '$cardNumber', '$expDate')";
        $insert_result = mysqli_query($con, $insert_query);

        if ($insert_result) {
            header("Location: ../../billing.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}

include_once '../../includes/closeDbConn.php';
?>
