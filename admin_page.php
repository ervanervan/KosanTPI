<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['admin_name'])) {
    header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Halaman Admin | Kosan TPI</title>

</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img class="logo" src="img/KosanTPI-Dark.svg" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="admin_profile.php"><span>Welcome,
                                <?php echo $_SESSION['admin_name'] ?>
                            </span>
                        </a>
                    </li>
                </ul>
                <button class="btn btn_blue ms-lg-3" onclick="document.location='logout.php'">Logout</button>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->


    


    <footer class="footer_b py-4">
        <div class="container">
            <div class="row">
                <p class="mb-0 text-center">Copyright &copy; 2022 Kosan TPI</a></p>
            </div>
        </div>
    </footer>
</body>

</html>