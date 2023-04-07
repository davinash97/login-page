<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="../style/mystyle.css">
    <title>SignUp Page</title>
    <?php 
        include "../database_creds/_dbconnect.php";
        $chksql = "SELECT `sno`, `email` AND `phone` AND `username` FROM `$db_name`";
        $result = mysqli_query($conn, $chksql);
        $row = $result->fetch_assoc();
        $sno = $row['sno'] + 1;
    ?>
</head>
<body class="head">
    <?php
        if(isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }
        else {
            $email = '';
        }
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $username = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dob = $_POST['dob'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $state = $_POST['state'];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];
            if ($result){
                if(($email == $row['email']) || ($username == $row['username']) || ($phone == $row['phone'])) {
                    if($email == $row['email']) {
                        echo "
                        <script>window.alert('This Email already exists.')</script>
                        ";
                    }
                    if($username == $row['username']) {
                        echo "
                        <script>window.alert('This Username already exists.')</script>
                        ";
                    }
                    if($phone == $row['phone']) {
                        echo "
                        <script>window.alert('This Phone Number already exists.')</script>
                        ";
                    }
                }
                else {
                    if ($password == $cpassword) {
                        $sql = "INSERT INTO `users_database` (`sno`,`fname`, `lname`, `email`, `username`, `phone`, `dob`, `city`, `district`, `state`, `password`)
                                                    VALUES    ('$sno', '$fname', '$lname', '$email', '$username', '$phone', '$dob', '$city', '$district', '$state', '$password')";
                        $result = mysqli_query($conn, $sql);
                            if($result){
                                header("Location: login.php?email=$email");
                                exit();
                            }
                            else {
                                die("Connection Failed: " . $conn->connect_error);
                            }
                        }
                    else {
                        echo "<div style='padding-bottom:20px;' class='error'>Please check your password, they doesn't seem to match.</div>";
                    }
                }
            }
        }
    ?>
    <div>
        <div>
            <h1>Let's create your Account:</h1>
        </div>
        <div class="content">
            <form method="post" id="sign_up" action="signup.php">
                <div>
                    Your Name:
                    <span class="fieldbox">
                        <input type="text" id="fname" name="fname" placeholder="First Name" required autofocus>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" required>
                    </span>
                </div>
                <div>
                    Your Unique Id:
                    <span class="fieldbox">
                        <input type="text" id="username" name="username" placeholder="Username" required>
                        <input type="email" id="email" name="email" value="<?php echo $email?>" placeholder="Your Email here" required>
                    </span>
                    <span class="fieldbox">
                        <input type="tel" id="phone" name="phone" placeholder="9876543210" maxlength="10" required>
                        <input type="date" id="dob" name="dob" placeholder="MM-DD-YYYY" required>
                    </span>
                </div>
                <div>
                    From:
                    <span class="fieldbox">
                        <input type="text" id="city" name="city" placeholder="Which City?" required>
                        <input type="text" id="district" name="district" placeholder=" District?" required>
                    </span>
                    <span class="fieldbox">
                        <input type="text" id="state" name="state" placeholder="Which State" required>
                    </span>
                </div>
                <div>
                    Your Unique Password: 
                    <span class="fieldbox">
                        <input type="text" id="password" name="password" minlength="6" maxlength="16" placeholder="Password" required>
                        <input type="text" id="cpassword" name="cpassword" minlength="6" maxlength="16" placeholder="Confirm your Password" required>
                    </span>
                </div>
                    <span class="fieldbox">
                        <button type="submit">Submit</button>
                        <button type="reset">Reset</button>
                    </span>
                </div>
            </form>
            <div class="login_field">
                <a href="login.php" class="login">Already a user? Let's log you in</a>
            </div>
        </div>
    </div>
</body>
</html>