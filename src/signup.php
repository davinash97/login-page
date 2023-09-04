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
        $checkSQL = "SELECT `sno`, `email` AND `phone` AND `username` FROM `$db_name`";
        $result = $conn->query($checkSQL);
        $row = $result->fetch_assoc();
        ?>
    </head>

<body class="head">
    <div>
        <div>
            <h1>Let's create your Account:</h1>
        </div>
        <div class="content">
            <form method="post" id="sign_up" action="signup.php">
                <div>
                    Your Name:
                    <span class="fieldbox">
                        <input type="text" id="fname" name="fname" placeholder="First Name" maxlength="20" required autofocus>
                        <input type="text" id="lname" name="lname" placeholder="Last Name" maxlength="20" required>
                    </span>
                </div>
                <div>
                    Your Unique Id:
                    <span class="fieldbox">
                        <input type="text" id="username" name="username" placeholder="Username" maxlength="12" required>
                        <input type="email" id="email" name="email" placeholder="Your Email here" maxlength="30" required>
                    </span>
                    <span class="fieldbox">
                        <input type="tel" id="phone" name="phone" placeholder="9876543210" maxlength="10" required>
                        <input type="date" id="dob" name="dob" placeholder="MM-DD-YYYY" required>
                    </span>
                </div>
                <div>
                    From:
                    <span class="fieldbox">
                        <input type="text" id="city" name="city" placeholder="Which City?" maxlength="15" required>
                        <input type="text" id="district" name="district" placeholder=" District?" maxlength="15" required>
                    </span>
                    <span class="fieldbox">
                        <input type="text" id="state" name="state" placeholder="Which State" maxlength="15" required>
                    </span>
                </div>
                <div>
                    Your Unique Password:
                    <span class="fieldbox">
                        <input type="text" id="password" name="password" minlength="6" maxlength="15" placeholder="Password" required>
                        <input type="text" id="cpassword" name="cpassword" minlength="6" maxlength="15" placeholder="Confirm your Password" required>
                    </span>
                </div>
                <span class="fieldbox">
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                </span>
        </div>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $firstName = $_POST['fname'];
            $lastName = $_POST['lname'];
            $userName = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dateOfBirth = $_POST['dob'];
            $city = $_POST['city'];
            $district = $_POST['district'];
            $state = $_POST['state'];
            $password = $_POST["password"];
            $confirmPassword = $_POST["cpassword"];
            try {
                if ($result) {
                    if ($password == $confirmPassword) {
                        $SQL = "INSERT INTO `users_database` (`fname`, `lname`, `email`, `username`, `phone`, `dob`, `city`, `district`, `state`, `password`)
                                                        VALUES    ('$firstName', '$lastName', '$email', '$userName', '$phone', '$dateOfBirth', '$city', '$district', '$state', '$password')";
                        $result = mysqli_query($conn, $SQL);
                        if ($result) {
                            header("Location: login.php?email=$email");
                            exit();
                        } else {
                            die("Connection Failed: " . $conn->connect_error);
                        }
                    } else {
                        echo "<div style='padding-bottom:20px;' class='error'>Please check your password, they doesn't seem to match.</div>";
                    }
                }
            } catch (Exception $e) {
                echo "Error Occured . $e";
            } finally {
                $conn->close();
            }
        }
        ?>
        </form>
        <div class="login_field">
            <a href="login.php" class="login">Already a user? Let's log you in</a>
        </div>
    </div>
    </div>
</body>

</html>