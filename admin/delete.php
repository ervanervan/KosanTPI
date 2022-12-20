<?php

include './config.php';
if (isset($_GET['deleteid'])) {
    $no = $_GET['deleteid'];

    $sql = "delete from `dataanak` where id=$no";
    $result = mysqli_query($con, $sql);
    if ($result) {
        // echo "Delete succesfull";
        header('location:display.php');
    } else {
        die(mysqli_error($con));
    }
}

?>