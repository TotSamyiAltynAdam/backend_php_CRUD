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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Change Profile</title>
</head>
<body>
    <div class="nav">
        <div class="logo">
            <p><a href="home.php"> Logo</a></p>
        </div>

        <div class="right-links">
            <a href="#">Change Profile</a>
            <a href="php/logout.php"> <button class="btn">Log Out</button> </a>
        </div>
    </div>
    <div class="container">
        <div class="box form-box">
            <?php 
                if(isset($_POST['submit'])){
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $password = $_POST['password'];
                    $email = $_POST['email'];
                    $newsletter = $_POST['newsletter'];

                    $login = $_SESSION['login'];

                    $edit_query = mysqli_query($con,"UPDATE p2user 
                                                    SET FirstName='$firstName', LastName='$lastName', 
                                                    Passwd='$password', Email='$email', NewsLetter='$newsletter'
                                                    WHERE Login='$login'") 
                                                or die("error occurred");

                    if($edit_query){
                        echo "<div class='message'>
                                <p>Profile Updated!</p>
                            </div> <br>";
                        echo "<a href='home.php'><button class='btn'>Go Home</button>";
                    }
                } else {

                    $login = $_SESSION['login'];
                    $query = mysqli_query($con,"SELECT * FROM p2user WHERE Login = '$login'");

                    while($result = mysqli_fetch_assoc($query)){
                        $res_Login = $result['Login'];
                        $res_Email = $result['Email'];
                        $res_FirstName = $result['FirstName'];
                        $res_LastName = $result['LastName'];
                        $res_Password = $result['Passwd'];
                        $res_Newsletter = $result['NewsLetter'];
                    }
            ?>
                <header>Change Profile</header>
                <form action="" method="post">
                    <div class="field input">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" value="<?php echo $res_Email; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="firstName">FirstName</label>
                        <input type="text" name="firstName" id="firstName" value="<?php echo $res_FirstName; ?>" autocomplete="off" required>
                    </div>
                    
                    <div class="field input">
                        <label for="lastName">LastName</label>
                        <input type="text" name="lastName" id="lastName" value="<?php echo $res_LastName; ?>" autocomplete="off" required>
                    </div>

                    <div class="field input">
                        <label for="password">Password</label>
                        <input type="text" name="password" id="password" value="<?php echo $res_Password; ?>" autocomplete="off" required>
                    </div>

                    <div class="field">
                        <label>Newsletter:</label>
                        <div>
                            <input type="radio" name="newsletter" value="yes" id="newsletter_yes" <?php if($res_Newsletter == 'yes') echo 'checked'; ?> required>
                            <label for="newsletter_yes">Yes</label>
                        </div>
                        <div>
                            <input type="radio" name="newsletter" value="no" id="newsletter_no" <?php if($res_Newsletter == 'no') echo 'checked'; ?> required>
                            <label for="newsletter_no">No</label>
                        </div>
                    </div>

                    <div class="field">
                        
                        <input type="submit" class="btn" name="submit" value="Update" required>
                    </div>
                    
                </form>
            <?php 
                } 
            ?>
        </div>
    </div>
</body>
</html>