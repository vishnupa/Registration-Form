<?php
require 'config.php';
if(isset($_SESSION["id"])){
  header("Location: index.php");
}

if(isset($_POST["submit"])){
  $email = $_POST["email"];
  $password = $_POST["password"];
  $captcha = $_POST["captcha"];
  $confirmcaptcha = $_POST["confirmcaptcha"];

  if($captcha != $confirmcaptcha){
    echo
    "<script> alert('Incorrect Captcha'); </script>";
  }
  else{
    $row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM userdetails WHERE email = '$email'"));
    if(isset($row) && $password == $row["password"]){
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password or Email'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <style media="screen">
    *{
      user-select: none;
    }
    input.captcha{
      pointer-events: none;
      letter-spacing: 12px;
      text-decoration: line-through;
    }
  </style>
  <body>
    <h2>Login</h2>
    <form class="" action="" method="post">
      Email <input type="text" name="email" value=""> <br>
      Password <input type="password" name="password" value=""> <br>
      <input type="text" class = "captcha" name="captcha" value="<?php echo substr(uniqid(), 5); ?>"> <br>
      <input type="text" name="confirmcaptcha" placeholder="Captcha" value=""> <br>
      <button type="submit" name="submit">Login</button>
    </form>
    <br>
    <a href="registration.php">Registration</a>
  </body>
</html>
