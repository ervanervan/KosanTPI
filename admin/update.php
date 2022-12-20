<?php
include './config.php';
$id = $_GET['updateid'];
$sql = "Select * from `dataanak` where id=$id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$nama_anak = $row['nama_anak'];
$jenis_kelamin = $row['jenis_kelamin'];
$umur = $row['umur'];
$tb = $row['tb'];
$bb = $row['bb'];


if (isset($_POST['submit'])) {
    $nama_anak = $_POST['nama_anak'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $umur = $_POST['umur'];
    $tb = $_POST['tb'];
    $bb = $_POST['bb'];

    $sql = "update `dataanak` set id=$id, nama_anak='$nama_anak', jenis_kelamin='$jenis_kelamin', umur='$umur', tb='$tb', bb='$bb' where id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Updated succesfull";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="aidnymous">
</head>

<body>
    <div class="container my-5">
        <form method="POST">
            <div class="form-group mb-2">
                <label>Nama Anak</label>
                <input type="text" class="form-control" placeholder="Masukkan nama anak" name="nama_anak" autocomplete="off" value="<?php echo $nama_anak; ?>">
            </div>
            <div class="form-group mb-2">
                <label>Jenis Kelamin</label> <br>
                <input type="radio" name="jenis_kelamin" autocomplete="off" value="0"> Laki-laki <br>
                <input type="radio" name="jenis_kelamin" autocomplete="off" value="1"> Perempuan
            </div>
            <div class="form-group mb-2">
                <label>Umur</label>
                <input type="text" class="form-control" placeholder="Masukkan umur anak" name="umur" autocomplete="off" value="<?php echo $umur; ?>">
            </div>
            <div class="form-group mb-2">
                <label>Tinggi Badan</label>
                <input type="number" class="form-control" placeholder="Masukkan tinggi badan anak" name="tb" autocomplete="off" value="<?php echo $tb; ?>">
            </div>
            <div class="form-group mb-2">
                <label>Berat Badan</label>
                <input type="number" class="form-control" placeholder="Masukkan berat badan anak" name="bb" autocomplete="off" value="<?php echo $bb; ?>">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>