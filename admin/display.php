<?php
include './config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data anak Posyandu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <button class="btn btn-primary my-5">
            <a href="user.php" class="text-light">Tambah Data</a>
        </button>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Anak</th>
                    <th scope="col">Jenis Kelamin</th>
                    <th scope="col">Umur</th>
                    <th scope="col">TB</th>
                    <th scope="col">BB</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">


                <?php
                $sql = "Select * from `dataanak`";
                $result = mysqli_query($con, $sql);
                $no = 1;
                if ($result) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['id'];
                        $nama_anak = $row['nama_anak'];
                        $jenis_kelamin = $row['jenis_kelamin'];
                        $umur = $row['umur'];
                        $tb = $row['tb'];
                        $bb = $row['bb'];

                        echo '<tr>
                        <th scope="row">' . $no . '</th>
                        <td>' . $nama_anak . '</td>
                        <td>' . $jenis_kelamin . '</td>
                        <td>' . $umur . '</td>
                        <td>' . $tb . '</td>
                        <td>' . $bb . '</td>
                        
                        <td>
                            <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" class="text-light">Update</a></button>
                            <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '" class="text-light">Delete</a></button>
                        </td>
                    </tr>';
                        $no = $no + 1;
                    }
                }

                ?>

            </tbody>
        </table>
    </div>
</body>

</html>