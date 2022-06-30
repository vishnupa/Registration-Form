<?php
require 'config.php';
if(isset($_SESSION["id"])){
  header("Location: index.php");
}

if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $password = $_POST["password"];

  $double = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM userdetails WHERE email = '$email'"));
  if(isset($double)){
    echo "<script> alert('Email Has Already Taken'); </script>";
  }
  else{
    $query = "INSERT INTO userdetails VALUES('', '$name', '$email', '$password')";
    mysqli_query($conn, $query);
    echo "<script> alert('Registration Successful'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registration</title>
  </head>
  <body>
    <h2>Registration</h2>
    <form class="" action="" method="post">
      Name <input type="text" name="name" value=""> <br>
      Email <input type="email" name="email" value=""> <br>
      Password <input type="password" name="password" value=""> <br>
      <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
  </body>
</html>
