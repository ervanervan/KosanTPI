<?php

$conn = mysqli_connect("localhost", "root", "","db_kosantpi");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>