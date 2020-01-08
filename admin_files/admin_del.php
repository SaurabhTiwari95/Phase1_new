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
$admin_id = $_SESSION['aid'];
$del_query = mysqli_query($db, "delete from admin where aid='$admin_id'");
if ($del_query) {
    ?>
    <script>

        swal({
                title: "Job Done :)",
                text: "Deletion Successful",
                type: "success"
            },
            function () {
                window.location.href = 'admin_login.php';

            });


    </script>

    <?php
} else {
    ?>
    <script>
        swal({
                title: "Sorry :(",
                text: "Deletion Unsuccessful!Try again",
                type: "error"
            },
            function () {
                window.location.href = 'admin_index.php';

            });

    </script>

    <?php
}
?>
