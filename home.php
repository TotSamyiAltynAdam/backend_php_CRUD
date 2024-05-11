<?php 
   session_start();

    include("php/config.php");
    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }

    $login = $_SESSION['login'];
    $query = mysqli_query($con,"SELECT * FROM P2User WHERE Login='$login'");
    $result = mysqli_fetch_assoc($query);

    if(!$result) {
        echo "Error: User not found.";
        exit();
    }

    $firstName = $result['FirstName'];
    $lastName = $result['LastName'];
    $email = $result['Email'];
    $newsLetter = $result['NewsLetter'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Home</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php">Logo</a> </p>
        </div>

        <div class="right-links">
            <a href="billing.php">Billing</a>
            <a href="shipping.php">Shipping</a>
            <a href="edit.php">Change Profile</a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <main>

       <div class="main-box top">
          <div class="top">
          <div class="box">
                <p>Hello <b><?php echo $firstName . " " . $lastName ?></b>, Welcome</p>
            </div>
            <div class="box">
                <p>Your email is <b><?php echo $email ?></b>.</p>
            </div>
          </div>
          <div class="bottom">
            <div class="box">
                <p>And <b><?php echo $login ?></b> have newsletter - <b><?php echo $newsLetter ?></b>.</p> 
            </div>
          </div>
       </div>

    </main>
</body>
</html>