<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
</head>
<body>

</body>
</html>
<?php
session_start();
require_once "database.php";

$user = $_POST['aid'];
$uname = $_POST['aname'];
$umob = $_POST['amobile'];
$umail = $_POST['aemail'];
$upass = $_POST['apass'];
$udepp = $_POST['branch'];
$query = mysqli_query($db, "select * from registration where rid='$user'and rdesignation='teacher'");
if (mysqli_num_rows($query) > 0) {

    $ins = mysqli_query($db, "insert into admin(aid,aname,amobile,aemail,apassword,abranch) values ('$user','$uname','$umob','$umail','$upass','$udepp')");
    if ($ins) {
        ?>
        <script>

            swal({
                    title: "Congratulations :)",
                    text: "Registration Successful",
                    type: "success"
                },
                function () {
                    window.location.href = 'admin_signup.php';

                });


        </script>

        <?php

    } else {
        ?>
        <script>
            swal({
                    title: "Sorry :(",
                    text: "Registration Unsuccessful!Try again",
                    type: "error"
                },
                function () {
                    window.location.href = 'admin_signup.php';

                });

        </script>

        <?php
    }
} else {

    ?>
    <script>
        swal({
                title: "User id is wrong :(",
                text: "user is not in database ",
                type: "error"
            },
            function () {
                window.location.href = 'admin_signup.php';

            });

    </script>

    <?php
}


?>