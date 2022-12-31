<?php

@include 'config.php';

session_start();

if (isset($_POST['submit'])) {
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);

   $select = " SELECT * FROM user WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if (mysqli_num_rows($result) > 0) {

      $row = mysqli_fetch_array($result);

      if ($row['user_type'] == 'admin') {
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
      } 
      elseif ($row['user_type'] == 'pemilikkos') {
         $_SESSION['pemilikkos_name'] = $row['name'];
         header('location:pemilikkos_page.php');
      }
      elseif ($row['user_type'] == 'user') {
         $_SESSION['user_name'] = $row['name'];
         header('location:user_page.php');
      } 
   } else {
      $error[] = 'Email atau Password salah!';
   }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
<?php include "css/csslogin.php"; ?>
   <title>Login | Kosan TPI</title>

</head>

<body>
   <div class="container_log">
      <form method="post" class="form-log">
         <div class="text-center my-4">
            <img src="img/KosanTPI-Dark.svg" alt="logo" width="210" class="mt-4">
         </div>
         <h5 class="text-start"><strong>Login</strong></h5>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="err-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Masukan alamat Email">
         <input type="password" name="password" required placeholder="Masukan Password">
         <input type="submit" name="submit" value="Login" class="form-btn">
         <p>Belum memiliki Akun? <a href="register.php">Daftar disini!</a></p>
      </form>
   </div>

</body>

</html>