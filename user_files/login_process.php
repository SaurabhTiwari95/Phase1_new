<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">


    <!-- <script src="../sweetalert2.min.js"></script>
     <link rel="stylesheet" href="../sweetalert2.min.css">-->
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
</head>
<body>

</body>
</html>
<?php
session_start();
require_once "database.php";

$uid = $_POST['uid'];
$upass = $_POST['upass'];
$query = mysqli_query($db, "SELECT * FROM registration WHERE rid='$uid' AND rpass='$upass'");
if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['urid'] = $row['rid'];
    $_SESSION['uname'] = $row['rname'];
    $_SESSION['rsem1'] = $row['rsem'];

    $_SESSION['ustatus'] = $row['rdesignation'];
    $_SESSION['rdep'] = $row['rdepartment'];
    $_SESSION['email'] = $row['remail'];
    $_SESSION['pass'] = $row['rpass'];


    if ($row['ractivation'] == 'deactivated') {
        ?>
        <script>

            swal({
                    title: " Sorry,your account is not activated yet !",
                    text: 'Please contact to your admin ',

                    type: "info"
                },
                function () {
                    window.location.href = 'register_login.html';

                });

        </script>
        <?php
    } elseif ($row['rdesignation'] == 'teacher') {
        header('Location:Teacher.php');
    } else {
        header('Location:Student.php');
    }
} else {

    ?>
    <script>

        swal({
                title: " Sorry, !",
                text: 'Please fill correct entry... or Signup first ',

                type: "info"
            },
            function () {
                window.location.href = 'register_login.html';

            });

    </script>
    <?php

}


?>