<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "css/css.php"; ?>
    <title>Invoice | Kosan TPI</title>
    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg py-3 sticky-top navbar-light bg-white d-flex justify-content-around">
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
                        <a class="nav-link" href="user_profile.php"><span>Welcome,
                                <?php echo $_SESSION['user_name'] ?>
                            </span>
                        </a>
                    </li>
                </ul>
                <button class="btn btn_blue ms-lg-3" onclick="document.location='logout.php'">Logout</button>
            </div>
        </div>
    </nav>
    <!-- NAVBAR -->

    <!-- PRODUCT -->
    <section id="product" class="bg-light">
        <div class="container">
            <div class="row mb-5">
            </div>
            <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id ='$id'";

            $gotResuslts = mysqli_query($conn, $sql);

            if ($gotResuslts) {
                if (mysqli_num_rows($gotResuslts) > 0) {
                    while ($row = mysqli_fetch_array($gotResuslts)) {
                        // print_r($row['name']);
            ?>
                        <div class="row g-4">
                            <div class="col">
                                <div class="products-post card-effect d-flex flex-column">
                                    <div class="col-md-9 mx-auto text-center mb-5">
                                        <h1>Invoice</h1>
                                    </div>
                                    <div id="printableArea" class="d-flex gap-4 align-it">
                                        <div style="flex:0.6;">
                                            <img src="uploads/<?php echo $row['img'] ?>" alt="" style="width: 100%; height:300px">
                                        </div>
                                        <div style="flex:0.4;">
                                            <h5><a href="#"><?php echo $row['name'] ?></a></h5>
                                            <p>Rp<?php echo $row['price'] ?> / Bulan</p>

                                            <h5 class="mt-4"><a href="#">Invoice number: </a></h5>
                                            <p><?php
                                                function generatenumber($limit)
                                                {
                                                    $code = '';
                                                    for ($i = 0; $i < $limit; $i++) {
                                                        $code .= mt_rand(0, 9);
                                                    }
                                                    return $code;
                                                }
                                                echo generatenumber(16);
                                                ?></p>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end gap-3">
                                        <button class="btn btn-secondary" onclick="document.location='user_page.php'">Cari kos lain</button>
                                        <button class="btn btn_blue" onclick="printDiv('printableArea')">Cetak</button>

                                    </div>
                                </div>
                            </div>
                        </div>
            <?php
                    }
                }
            }

            ?>
        </div>
    </section>
    <!-- PRODUCT -->

</body>

</html>