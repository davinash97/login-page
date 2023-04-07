<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/mystyle.css">
    <title>Login Page</title>
</head>
<body class="head" style="height: 100vh;">
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            include "../database_creds/_dbconnect.php";
            $email = $_POST["email"];
            $password = $_POST["password"];
            $login_sql = "SELECT `email` AND `password` FROM `users_database`
                        WHERE `email` = '$email' AND `password` = '$password'";
            $result = mysqli_query($conn, $login_sql);
            if($result) {
                if(mysqli_num_rows($result)>0) {
                    setcookie('email', $email);
                    setcookie('password', $password);
                    session_start();
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['loggedin'] = True;
                    mysqli_close($conn);
                    header("Location: home.php");
                    exit();
                }
                else {
                    echo "<div class='error' style='padding:20px'>Invalid login credentials.</div>";
                }
            }
            else{
                die("Connection Failed: " . $conn->connect_error);
            }
        }
    ?>
    <div>
        <div>
            <h1>Login to your Account:</h1>
        </div>
        <div class="login_page">
            <form method="post" action="login.php">
                Email:
                <span class="fieldbox">
                    <input type="email" id="email" name="email" placeholder=" Your Email here" required autofocus>
                </span>
                Password:
                <span class="fieldbox">
                    <input type="password" id="password" name="password" placeholder=" Password" required>
                </span>
                <span class="fieldbox">
                    <button type="submit">Submit</button>
                    <button type="reset">Reset</button>
                </span>
            </form>
        </div>
    </div>
    <div>
        <a href="signup.php" class="login">New here? Let's Create you an account.</a>
    </div>
</body>
</html>