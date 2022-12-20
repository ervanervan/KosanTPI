<?php
include './config.php';
if (isset($_POST['submit'])) {
    // untuk memeriksa apakah suatu variabel sudah diatur atau belum
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $insert = "insert into `user` (name, email) values ('$name', '$email')";
    $result = mysqli_query($con, $insert);
    if ($result) {
        // echo "Data inserted succesfull";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Input data anak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <div class="form-group mb-2">
                <label>Nama Anak</label>
                <input type="text" class="form-control" placeholder="Masukkan nama anak" name="nama_anak" autocomplete="off">
            </div>
            <div class="form-group mb-2">
                <label>Jenis Kelamin</label> <br>
                <input type="radio" name="jenis_kelamin" autocomplete="off" value="0"> Laki-laki <br>
                <input type="radio" name="jenis_kelamin" autocomplete="off" value="1"> Perempuan
            </div>
            <div class="form-group mb-2">
                <label>Umur</label>
                <input type="text" class="form-control" placeholder="Masukkan umur anak" name="umur" autocomplete="off">
            </div>
            <div class="form-group mb-2">
                <label>Tinggi Badan</label>
                <input type="text" class="form-control" placeholder="Masukkan tinggi badan anak" name="tb" autocomplete="off">
            </div>
            <div class="form-group mb-2">
                <label>Berat Badan</label>
                <input type="text" class="form-control" placeholder="Masukkan berat badan anak" name="bb" autocomplete="off">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>