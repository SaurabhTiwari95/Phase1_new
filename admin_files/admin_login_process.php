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
/**
 * Created by PhpStorm.
 * User: ninad
 * Date: 22-02-2017
 * Time: 21:38
 */

require_once "database.php";
session_start();

$aid = $_POST['aid'];
$pass = $_POST['pass'];

$query = mysqli_query($db, "select * from admin where aid='$aid' and apassword='$pass'");
if (mysqli_num_rows($query) == 1) {
    $row = mysqli_fetch_assoc($query);
    $_SESSION['aname'] = $row['aname'];
    $_SESSION['aemail'] = $row['aemail'];
    $_SESSION['apic'] = $row['apic'];
    $_SESSION['aid'] = $row['aid'];
    $_SESSION['amobile'] = $row['amobile'];
    $_SESSION['abranch'] = $row['abranch'];
    header("location:admin_index.php");

} else {

    ?>
    <script>

        swal({
                title: " invalid email or password !",
                text: 'fill entries correctly ',

                type: "info"
            },
            function () {
                window.location.href = 'admin_login.php';

            });

    </script>
    <?php
}