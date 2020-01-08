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
require "database.php";

if (isset($_POST['sub'])) {
    if ($_FILES['so']['size'] == 0) {
        ?>
        <script>

            swal({
                    title: "INFO",
                    text: 'please select file:) ',

                    type: "info"
                },
                function () {
                    window.location.href = 'teachers_data.php';

                });

        </script>
        <?php
    } else {

        $file = $_FILES['so']['tmp_name'];


        $handle = fopen($file, "r");
        $c = 0;
        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            $id = $filesop[0];
            $name = $filesop[1];
            $pass = $filesop[2];
            $gen = $filesop[3];
            $st = $filesop[4];
            $dep = $filesop[5];


            $q = mysqli_query($db, "insert into registration(rid,rname,rpass,rgender,rdepartment,rdesignation)values('$id','$name','$pass','$gen','$dep','$st')");
        }

        if ($q) {
            ?>
            <script>

                swal({
                        title: " Job Done",
                        text: 'files uploaded :) ',

                        type: "success"
                    },
                    function () {
                        window.location.href = 'teachers_data.php';

                    });

            </script>
            <?php

        } else {
            ?>
            <script>

                swal({
                        title: " Something Went Wrong",
                        text: 'files uploading are failed :) ',

                        type: "error"
                    },
                    function () {
                        window.location.href = 'teachers_data.php';

                    });

            </script>
            <?php
        }


    }
}

if ((isset($_POST['xsub']))) {
    if ($_FILES['xl']['size'] == 0) {
        ?>
        <script>

            swal({
                    title: "INFO",
                    text: 'please select file:) ',

                    type: "info"
                },
                function () {
                    window.location.href = 'students.php';

                });

        </script>
        <?php
    } else {


        $file = $_FILES['xl']['tmp_name'];
        $handle = fopen($file, "r");
        $c = 0;
        while (($filesop = fgetcsv($handle, 1000, ",")) !== false) {
            $id = $filesop[0];
            $name = $filesop[1];
            $pass = $filesop[2];
            $gender = $filesop[3];
            $designation = $filesop[4];
            $branch = $filesop[5];
            $sem = $filesop[6];
            $section = $filesop[7];

            $sql = mysqli_query($db, "INSERT INTO registration (rid,rname,rpass,rgender,rdesignation,rdepartment,rsem,rsection) VALUES ('$id','$name','$pass','$gender','$designation','$branch','$sem','$section')");
        }

        if ($sql) {
            ?>
            <script>

                swal({
                        title: " Job Done",
                        text: 'files uploaded :) ',

                        type: "success"
                    },
                    function () {
                        window.location.href = 'students.php';

                    });

            </script>
            <?php
        } else {
            ?>
            <script>

                swal({
                        title: " Something Went Wrong",
                        text: 'files uploading are failed :) ',

                        type: "error"
                    },
                    function () {
                        window.location.href = 'students.php';

                    });

            </script>
            <?php
        }


    }
}

?>