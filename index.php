<?php 
   session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Login</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
            <?php 
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $login = mysqli_real_escape_string($con,$_POST['login']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);

                    $result = mysqli_query($con,"SELECT * FROM p2user WHERE Login='$login' AND Passwd='$password' ") or die("Select Error");
                    $row = mysqli_fetch_assoc($result);

                    if(is_array($row) && !empty($row)){
                        $_SESSION['login'] = $row['Login'];
                        $_SESSION['firstName'] = $row['FirstName'];
                        $_SESSION['lastName'] = $row['LastName'];
                        $_SESSION['email'] = $row['Email'];
                    }else{
                        echo "<div class='message'>
                            <p>Wrong Username or Password</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Go Back</button>";
                    }
                    if(isset($_SESSION['login'])){
                        header("Location: home.php");
                    }
                } else {
            ?>
                    <header>Login</header>
                    <form action="" method="post">
                        <div class="field input">
                            <label for="login">Login</label>
                            <input type="text" name="login" id="login" autocomplete="off" required>
                        </div>

                        <div class="field input">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" autocomplete="off" required>
                        </div>

                        <div class="field">
                            <input type="submit" class="btn" name="submit" value="Login" required>
                        </div>

                        <div class="links">
                            Don't have account? <a href="register.php">Sign Up Now</a>
                        </div>
                    </form>
            <?php 
                } 
            ?>
        </div>
    </div>
</body>
</html>