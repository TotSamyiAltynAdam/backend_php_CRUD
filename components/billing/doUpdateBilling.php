<?php
include_once '../../php/config.php';

function addLeadingZero($value) {
    return strlen($value) < 2 ? '0' . $value : $value;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $billingID = $_POST['billingID'];
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

    $update_query = "UPDATE p2billing 
                    SET BillName = '$billName', 
                    BillAddress = '$billAddress', BillCity = '$billCity', 
                    BillState = '$billState', BillZip = '$billZip',
                    CardType = '$cardType', CardNumber = '$cardNumber', ExpDate = '$expDate'
                    WHERE BillingID = $billingID";

    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        header("Location: ../../billing.php");
        exit();
    } else {
        echo "Error updating book: " . mysqli_error($con);
    }
}

include_once '../../php/closeDbConn.php';
?>
