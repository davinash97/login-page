<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="style/mystyle.css">
    <title>Home Page</title>
</head>
<body>
    <div class="content">
    <?php
        session_start();
        if ((isset($_COOKIE['email'])) || (isset($_SESSION['email']))) {
            if ($_SESSION['loggedin'] == True){
                header('Location: src/home.php');
            }
            else {
                header('Location: src/login.php');
            }
        }
        else {
            header('Location: src/signup.php');
        };
    ?>
    </div>
</body>
</html>