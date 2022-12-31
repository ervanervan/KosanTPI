<?php

@include 'config.php';

if (isset($_POST['submit'])) {
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $error[] = 'Pengguna sudah ada!';
   } else {

      if ($pass != $cpass) {
         $error[] = 'Password tidak cocok!';
      } else {
         $insert = "INSERT INTO user (name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:login.php');
      }
   }
};


?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include "css/csslogin.php"; ?>
   <title>Register | Kosan TPI</title>

</head>

<body>

   <div class="container_log">
      <form action="" method="post" class="form-log">
         <div class="text-center my-4">
            <img src="img/KosanTPI-Dark.svg" alt="logo" width="210" class="mt-4">
         </div>
         <h5 class="text-start"><strong>Register</strong></h5>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="err_msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="text" name="name" required placeholder="Masukan username">
         <input type="email" name="email" required placeholder="Masukan alamat Email">
         <input type="password" name="password" required placeholder="Masukan password">
         <input type="password" name="cpassword" required placeholder="Konfirmasi Password">
         <select name="user_type">
            <option value="admin">admin</option>
            <option value="pemilikkos">pemilikkos</option>
            <option value="user">user</option>
         </select>
         <input type="submit" name="submit" value="Register" class="form-btn">
         <p>Sudah memiliki Akun? <a href="login.php">Login disini!</a></p>
      </form>

   </div>

</body>

</html>