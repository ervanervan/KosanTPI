<?php
include './config.php';
if (isset($_POST['create'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

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
    $insert = "INSERT INTO `products`( `name`, `price`, `desc`, `fasilitas`, `img`) VALUES ( '$name', '$price', '$desc', '$fasilitas', '$img')";
    $result = mysqli_query($conn, $insert);
    if ($result) {
        // echo "Data inserted succesfull";
        header('location:pemilikkos_page.php');
    } else {
        die(mysqli_error($conn));
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Input kos</title>
</head>

<body>
    <div class="container my-5">
        <form method="POST" enctype="multipart/form-data">
            <div class="row mb-4">
                <h4 class="text-center ">Tambah Data</h4>
            </div>
            <div class="row g-3 justify-content-center">
                <div class="col-md-7">
                    <input type="text" name="name" class="form-control" placeholder="Nama Kos" required>
                </div>
                <div class="col-md-7">
                    <input type="text" name="price" class="form-control" placeholder="Harga Kos" required>
                </div>
                <div class="col-md-7">
                    <input type="text" name="desc" class="form-control" placeholder="Deskripsi" required>
                </div>
                <div class="col-md-7">
                    <input type="text" name="fasilitas" class="form-control" placeholder="Fasilitas" required>
                </div>
                <div class="col-md-7">
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="col-md-7">
                    <input class="btn btn_blue" href="admin_page.php" type="submit" name="create" value="Create"></input>
                    <input class="btn btn-danger" href="admin_page.php" value="Batal" name="batal" type="submit"></input>
                </div>
            </div>
        </form>
    </div>
</body>

</html>