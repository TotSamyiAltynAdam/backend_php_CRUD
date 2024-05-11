<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="box form-box">
            <?php 
                include("php/config.php");
                if(isset($_POST['submit'])){
                    $login = $_POST['login'];
                    $email = $_POST['email'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $password = $_POST['password'];
                    $newsletter = $_POST['newsletter'];

                //verifying the unique login
                $verify_query = mysqli_query($con,"SELECT Login FROM p2user WHERE Login='$login'");

                    if(mysqli_num_rows($verify_query) !=0 ){
                        echo "<div class='message'>
                                <p>This login is used, Try another One Please!</p>
                            </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
                    } else{

                        mysqli_query($con,"INSERT INTO p2user(Login, FirstName, LastName, Email, Passwd, NewsLetter) 
                                            VALUES('$login','$firstName','$lastName', '$email', '$password', '$newsletter')"
                                    ) 
                                    or die("Erroe Occured");

                        echo "<div class='message'>
                                <p>Registration successfully!</p>
                            </div> <br>";
                        echo "<a href='index.php'><button class='btn'>Login Now</button>";
                    }

                } else {
            ?>
                <header>Sign Up</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="firstName">FirstName</label>
                        <input type="text" name="firstName" id="firstName" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="lastName">LastName</label>
                        <input type="text" name="lastName" id="lastName" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <label>Newsletter:</label>
                        <div>
                            <input type="radio" name="newsletter" value="yes" id="newsletter_yes" required>
                            <label for="newsletter_yes">Yes</label>
                        </div>
                        <div>
                            <input type="radio" name="newsletter" value="no" id="newsletter_no" required>
                            <label for="newsletter_no">No</label>
                        </div>
                    </div>

                    <div class="field">
                        <input type="submit" class="btn" name="submit" value="Register" required>
                    </div>
                    <div class="links">
                        Already a member? <a href="index.php">Sign In</a>
                    </div>
                </form>
            <?php
                } 
            ?>
        </div>
    </div>
</body>
</html>