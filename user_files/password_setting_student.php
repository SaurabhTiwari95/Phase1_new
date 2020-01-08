<?php
require "database.php";
session_start();
@$uid = $_SESSION['urid'];
if (empty($uid)) {
    ?>
    <script>
        window.location = "register_login.html";
    </script>
    <?php
}
?>

    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>password setting</title>
        <script src="../js/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">

        <!-- [ PLUGIN STYLESHEET ]
            =========================================================================================================================-->
        <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
        <link rel="stylesheet" type="text/css" href="../css/animate.css">
        <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="../library/vegas/vegas.min.css">
        <!-- [ Boot STYLESHEET ]
            =========================================================================================================================-->
        <link rel="stylesheet" type="text/css" href="../library/bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" type="text/css" href="../library/bootstrap/css/bootstrap.css">

        <!-- [ DEFAULT STYLESHEET ]
        =========================================================================================================================-->
        <link rel="stylesheet" type="text/css" href="../css/style.css">
        <link rel="stylesheet" type="text/css" href="../css/responsive.css">
        <link rel="stylesheet" type="text/css" href="../css/color/white.css">
    </head>
    <body>
    <a style="position: relative;top: 20px;left: 10px;" href="Student.php" class="btn-lg btn-info">Go Back</a>
    <img src="../images/demologo.png" class="img-rounded pull-right" height="100">

    <form action="" method="post">
        <div class="container col-lg-6 col-md-4 col-sm-3 col-xs-2" style="margin-left: 300px"><br><br><br><br>

            <h1>password setting</h1>
            <span>old password</span> <input type="password" name="opass" id="opass" class="form-control"
                                             onmousemove="checkPass()"><br>
            <span>new password</span><input type="password" name="npass" class="form-control"><br>
            <input type="submit" value="update" class="btn-sm btn-info" name="up">
    </form>
    </div>


    </body>
    </html>

<?php

/**
 * Created by PhpStorm.
 * User: ninad
 * Date: 22-02-2017
 * Time: 10:23
 */


if (isset($_POST['up'])) {
    $userid = $_SESSION['urid'];

    $opass = $_POST['opass'];
    $npass = $_POST['npass'];
    $mj = mysqli_query($db, "select * from registration where rid='$userid'");
    if (mysqli_num_rows($mj) > 0) {
        $row = mysqli_fetch_assoc($mj);
        if ($row['rpass'] == $opass) {
            $upd = mysqli_query($db, "update registration set rpass='$npass' where rid='$userid'");
            if ($upd) {


                ?>
                <script>
                    swal({
                            title: "Successfull :)",
                            text: " password changed :)",
                            type: "success"
                        },
                        function () {

                            window.location.href = 'Student.php';

                        });

                </script>
                <?php
            }

        } else {
            ?>
            <script>
                swal({
                        title: "Failed :(",
                        text: "old password is not matching",
                        type: "error"
                    },
                    function () {
                        window.location.href = 'password_setting_student.php';

                    });
            </script>
            <?php
        } ?>


        <?php


    }
}





