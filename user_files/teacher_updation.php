<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
</head>
<body>
<?php
require_once "database.php";
session_start();
$rid = $_SESSION['urid'];
if (isset($_POST['tname'])) {

    $tname = $_POST['tname'];
    $upd = mysqli_query($db, "update registration set rname='$tname' where rid='$rid'");
}
if (isset($_POST['tmobile'])) {
    if ($_POST['tmobile'] == "")
        $tmobile = NULL;
    else
        $tmobile = $_POST['tmobile'];
    $upd = mysqli_query($db, "update registration set rmobile='$tmobile' where rid='$rid'");
}
if (isset($_POST['temail'])) {
    $temail = $_POST['temail'];
    $upd = mysqli_query($db, "update registration set remail='$temail' where rid='$rid'");

}
if (isset($_POST['tgender'])) {
    $tgender = $_POST['tgender'];
    $upd = mysqli_query($db, "update registration set rdepartment='$tgender' where rid='$rid'");
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
                window.location.href = 'Teacher.php';

            });
    </script>
<?php
}



else
{

?>
    <script>
        swal({
                title: "Failed :(",
                text: "Something Went wrong",
                type: "error"
            },
            function () {
                window.location.href = 'Teacher.php';

            });
    </script>
    <?php
}


?>
</body>
</html>

