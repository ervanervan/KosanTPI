<?php

@include 'config.php';

session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="shortcut icon" href="img/favicon.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Profil pengguna | Kosan TPI</title>

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
                $userNewName  =    $_POST['updateUserName'];
                $userNewEmail =    $_POST['userEmail'];
                $loggedInUser = $_SESSION['user_name'];

                $sql = "UPDATE user SET name = '$userNewName', email ='$userNewEmail' WHERE name = '$loggedInUser'";

                $results = mysqli_query($conn, $sql);
                // print_r($results);
                $_SESSION['user_name'] = $userNewName;
                header('location:user_page.php');
            }
            ?>
            <?php
            if (isset($_POST["batal"])) {
                header("location:user_page.php");
            }
            ?>
            <form method="post">
                <?php
                $currentUser = $_SESSION['user_name'];
                $sql = "SELECT * FROM user WHERE name ='$currentUser'";

                $gotResuslts = mysqli_query($conn, $sql);

                if ($gotResuslts) {
                    if (mysqli_num_rows($gotResuslts) > 0) {
                        while ($row = mysqli_fetch_array($gotResuslts)) {
                            // print_r($row['name']);
                ?>
                            <div class="row g-3 justify-content-center">
                                <div class="col-md-7">
                                    <input type="text" name="updateUserName" class="form-control" placeholder="Username" required value="<?php echo $row['name']; ?>">
                                </div>
                                <div class="col-md-7">
                                    <input type="text" name="userEmail" class="form-control" placeholder="Email Address" required value="<?php echo $row['email']; ?>">
                                </div>
                                <div class="col-md-7">
                                    <input class="btn btn_blue" href="admin_page.php" type="submit" name="update" class="btn btn-info" value="Update"></input>
                                    <input class="btn btn-danger" href="admin_page.php" value="Batal" name="batal" type="submit"></input>
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