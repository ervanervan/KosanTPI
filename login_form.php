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
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
   <link rel="stylesheet" href="css/stylelogin.css">
   <title>Login | Kosan TPI</title>

</head>

<body>
   <div class="form-container">
      <form action="" method="post">
         <div class="text-center my-4">
            <img src="img/KosanTPI-Dark.svg" alt="logo" width="210" class="mt-4">
         </div>
         <h5 class="text-start"><strong>Login</strong></h5>
         <?php
         if (isset($error)) {
            foreach ($error as $error) {
               echo '<span class="error-msg">' . $error . '</span>';
            };
         };
         ?>
         <input type="email" name="email" required placeholder="Masukan alamat Email">
         <input type="password" name="password" required placeholder="Masukan Password">
         <input type="submit" name="submit" value="Login" class="form-btn">
         <p>Belum memiliki Akun? <a href="register_form.php">Daftar disini!</a></p>
      </form>
   </div>

</body>

</html>