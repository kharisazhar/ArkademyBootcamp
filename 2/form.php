<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Arka Bootcamp 4</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>

<form method="POST">
    <label for="">username</label>
    <input type="text" name="username">
    <br>

    <label for="">email</label>
    <input type="text" name="email">
    <br>

    <label for="">phone number</label>
    <input type="number" name="phonenumber">
    <br>

    <input type="submit" name="submit" value="SUBMIT">
</form>

<?php
if(isset($_POST['submit'])){
  if(ctype_lower($_POST['username'])){
    echo "Valid Username<br>";
  }else{
    echo "<script>alert('Username Must Be Lower');</script>";
  }
  if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $_POST['email'])) {
    echo 'Valid Email<br>';
  } else {
    echo "<script>alert('Invalid Email');</script>";
  }
  if (preg_match("/^[\+0-9\-\(\)\s]*$/", $_POST['phonenumber'])) {
    echo "Valid Phone Number<br>";
  }else{
    echo "<script>alert('Invalid Phone Number');</script>";
  }
}else{
  echo "isi data terlebih dahulu";
}
?>


</body>
</html>