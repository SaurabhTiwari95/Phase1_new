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
 * Date: 18-02-2017
 * Time: 22:33
 */

require "database.php";
session_start();
if (!empty($_GET)) {
    if (array_key_exists('i', $_GET)) {
        $id = $_GET['i'];
        $query = mysqli_query($db, "select * from notice where nid='$id'");
        if (mysqli_num_rows($query)) {
            $del = mysqli_query($db, "delete from notice where nid='$id'");
            if ($del) {
                ?>
                <script>
                    swal({
                            title: "job Done :(",
                            text: "Notice Deleted ",
                            type: "success"
                        },
                        function () {
                            window.location.href = 'Teacher.php#notice';

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
                            window.location.href = 'Teacher.php#notice';

                        });

                </script>

                <?php
            }
        } else {

        }
    }
}