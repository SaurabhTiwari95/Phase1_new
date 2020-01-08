<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
</head>
<body>

</body>
</html>
<?php

require_once "database.php";
session_start();
$rid = $_SESSION['urid'];
$sname = $_POST['sname'];
$sgender = $_POST['sgender'];
$semail = $_POST['semail'];
$smobile = $_POST['smobile'];


if ($semail) {
    $upd = mysqli_query($db, "update registration set remail='$semail' where rid='$rid'");
}


if ($sname) {
    $upd = mysqli_query($db, "update registration set rname='$sname' where rid='$rid'");
}


if ($sgender) {
    $upd = mysqli_query($db, "update registration set rgender='$sgender' where rid='$rid'");
}

if ($smobile) {
    $upd = mysqli_query($db, "update registration set rmobile='$smobile' where rid='$rid'");
}


if ($upd) {

    ?>
    <script>
        swal({
                title: "Updation Successful :)",
                text: " Successful :)",
                type: "success"
            },
            function () {
                window.location.href = 'Student.php';

            });
    </script>
    <?php
} else {

    ?>
    <script>
        swal({
                title: "Failed :(",
                text: "Something Went wrong",
                type: "error"
            },
            function () {
                window.location.href = 'Student.php';

            });
    </script>
    <?php
}


?>