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
 * Date: 21-02-2017
 * Time: 15:41
 */
session_start();
require_once "../user_files/database.php";
if (!empty($_GET)) {
    if (array_key_exists('i', $_GET)) {
        $id = $_GET['i'];

        $result = mysqli_query($db, "select * from checksub where ch_id='$id'");
        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);


            $state = mysqli_query($db, "delete from checksub where ch_id='$id'");

            if ($state) {
                ?>

                <script>

                    swal({
                            title: " Successful !",
                            text: 'Data Deleted ',

                            type: "success"
                        },
                        function () {
                            window.location.href = 'teachers_alotted_subjects.php';

                        });

                </script>
                <?php


            } else {
                ?>
                <script>

                    swal({
                            title: " Failed !",
                            text: 'Something went wrong',

                            type: "error"
                        },
                        function () {
                            window.location.href = 'teachers_alotted_subjects.php';

                        });

                </script>
                <?php
            }
        }
    }
}

