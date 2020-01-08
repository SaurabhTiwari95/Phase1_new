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
date_default_timezone_set('Asia/kolkata');
// echo "The time is " . date(" d-m-Y h:i:sa");
$s = date("Y-m-d H:i:s");
session_start();
require_once "database.php";


$trid = $_SESSION['urid'];
$title = $_POST['ntitle'];
$desc = $_POST['ndesc'];

$query = mysqli_query($db, "select * from registration ");
if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_assoc($query);
    $tid = $row['rid'];
    $insert = mysqli_query($db, "insert into notice(title,description,tecid,datetime1)values('$title','$desc','$trid','$s')");
    if ($insert) {
        ?>
        <script>

            swal({
                    title: "Job Done :)",
                    text: "notice is created",
                    type: "success"
                },
                function () {
                    window.location.href = 'Teacher.php';

                });


        </script>

        <?php
    } else {
        ?>
        <script>
            swal({
                    title: "Sorry :(",
                    text: "something went wrong ",
                    type: "error"
                },
                function () {
                    window.location.href = 'Teacher.php';

                });

        </script>

        <?php
    }
} else {
    ?>
    <script>
        swal({
                title: "Sorry :(",
                text: "something went wrong ",
                type: "error"
            },
            function () {
                window.location.href = 'Teacher.php';

            });

    </script>

    <?php
}
?>

