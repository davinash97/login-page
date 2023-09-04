<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/mystyle.css">
  <title>Home Page</title>
</head>
<body>
    <a class="logout" href="logout.php"><div class="btn">Logout</div></a>
    <div>
      <?php
        session_start();
        if (isset($_SESSION['email'])) {
          include "../database_creds/_dbconnect.php";
          $sql = "SELECT * FROM `users_database`"; //fetching every coloumn from database
          $result = mysqli_query($conn, $sql);
          $row = $result->fetch_assoc();
          $email = $_SESSION['email'];
          if ($email == $row['email']){
            if (isset($_SESSION['password'])) {
              if ($_SESSION['password'] == $row['password']) {
                  if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
                    $email = $_COOKIE['email'];
                    $password = $_COOKIE['password'];
                  }
                  else {
                    echo '<script>window.alert("Please accept cookies, it is to validate the session."</script>';
                  };
                  $_SESSION['email'] = $email;
                  mysqli_close($conn);
              }
              else {
                header("Location: ../index.php");
              } 
            }
            else {
              header("Location: ../index.php");
            }
          }
          else {
            header("Location: ../index.php");
          }
        }
        else {
            header("Location: index.php");
        };
      ?>
    </div>
    <div class="details">
      <span><b>Hey there!</b> "<?php echo $row['fname'] ?> <?php echo $row['lname'] ?>",</span>
      <span><b>Your Username:</b> "<?php echo $row['username'] ?>",</span>
      <span><b>Your Phone:</b> "<?php echo $row['phone'] ?>",</span>
      <span><b>Date of Birth:</b> "<?php echo $row['dob'] ?>",</span>
      <span><b>Your Email:</b> "<?php echo $row['email'] ?>",</span>
      <span><b>From:</b> "<?php echo $row['city'] ?>, <?php echo $row['district'] ?>, <?php echo $row['state'] ?>"</span>
      </div>
</body>
</html>