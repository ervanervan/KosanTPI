<?php

include './config.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `user` where id=$id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Delete succesfull";
        header('location:admin_page.php');
    } else {
        die(mysqli_error($conn));
    }
}
