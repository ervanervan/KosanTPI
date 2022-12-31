<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['pemilikkos_name'])) {
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "css/css.php"; ?>
    <title>Halaman pemilikkos | Kosan TPI</title>

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
                        <a class="nav-link" href="pemilikkos_profile.php"><span>Welcome,
                                <?php echo $_SESSION['pemilikkos_name'] ?>
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
            <button class="btn btn_blue my-5">
                <a href="product.php" class="text-light"><i class="bx bxs-plus-circle"></i> Tambah Kos</a>
            </button>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Gambar Kosan</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Fasilitas</th>
                        <th scope="col">Operations</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">


                    <?php
                    $sql = "SELECT * from products";
                    $result = mysqli_query($conn, $sql);
                    $no = 1;
                    if ($result) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $id = $row['id'];
                            $name = $row['name'];
                            $desc = $row['desc'];
                            $price = $row['price'];
                            $img = $row['img'];
                            $fasilitas = $row['fasilitas'];

                            echo '<tr>
                                    <th scope="row">' . $no . '</th>
                                    <td> <img src="uploads/' . $img . '"/></td>
                                    <td>' . $name . '</td>
                                    <td>' . $price . '</td>
                                    <td>' . $desc . '</td>
                                    <td>' . $fasilitas . '</td>
                        
                                    <td>
                                        <button class="btn btn-primary"><a href="product_update.php?id=' . $id . '" class="text-light"><i class="bx bxs-edit-alt"></i></a></button>
                                        <button class="btn btn-danger"><a href="product_delete.php?id=' . $id . '" class="text-light"><i class="bx bxs-trash-alt"></i></a></button>
                                    </td>
                                    </tr>';
                            $no = $no + 1;
                        }
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </section>
    <!-- PRODUCT -->


    <footer class="footer_b py-4">
        <div class="container">
            <div class="row">
                <p class="mb-0 text-center">Copyright &copy; 2022 Kosan TPI</a></p>
            </div>
        </div>
    </footer>
</body>

</html>