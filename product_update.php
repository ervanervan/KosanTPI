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
    <title>Update Produk | Kosan TPI</title>

</head>

<body>

    <section id="contact" class="">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 mx-auto text-center">
                    <h1>Edit Profil</h1>
                </div>
            </div>
            <?php
            if (isset($_POST["update"])) {
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                $id = $_GET['id'];
                $name =  $_POST['name'];
                $price =  $_POST['price'];
                $desc =  $_POST['desc'];
                $fasilitas =  $_POST['fasilitas'];
                $img =  $_FILES["fileToUpload"]["name"];
                $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                if ($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                }
                $updte = "UPDATE `products` SET `name` = '$name', `price` ='$price', `desc` ='$desc', `fasilitas` ='$fasilitas', `img` ='$img' WHERE `id`= '$id'";
                $results = mysqli_query($conn, $updte);
                // print_r($results);

                header('location:pemilikkos_page.php');
            }
            ?>
            <?php
            if (isset($_POST["batal"])) {
                header("location:pemilikkos_page.php");
            }
            ?>
            <form method="post" enctype="multipart/form-data">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE id ='$id'";

                $gotResuslts = mysqli_query($conn, $sql);

                if ($gotResuslts) {
                    if (mysqli_num_rows($gotResuslts) > 0) {
                        while ($row = mysqli_fetch_array($gotResuslts)) {
                            // print_r($row['name']);
                ?>
                            <div class="row g-3 justify-content-center">
                                <div class="col-md-7">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Kos" required value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="price" class="form-control" placeholder="Harga Kos" required value="<?php echo $row['price']; ?>">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="desc" class="form-control" placeholder="Deskripsi" required value="<?php echo $row['desc']; ?>">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="fasilitas" class="form-control" placeholder="Fasilitas" required value="<?php echo $row['fasilitas']; ?>">
                                </div>
                                <div class="col-md-7">
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div class="col-md-7">
                                    <input class="btn btn_blue" type="submit" name="update" value="Update"></input>
                                    <input class="btn btn-danger" href="pemilikkos_page.php" value="Batal" name="batal" type="submit"></input>
                                </div>
                            </div>

                <?php
                        }
                    }
                }


                ?>

            </form>

        </div>
    </section>


</body>

</html>