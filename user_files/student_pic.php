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
session_start();
require "database.php";
$r = $_SESSION['urid'];

if (isset($_POST['upl1'])) {
    $name = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    $error = $_FILES['img']['error'];
    $size = $_FILES['img']['size'];
    $arr = explode(".", $name);
    $ext = end($arr);
    $ext = strtolower($ext);
    $allowedExt = array("jpg", "png", "jpeg");
    if (in_array($ext, $allowedExt)) {
        if ($error == 0) {
            if (($size / 1024) <= 28000) {
                $path = "propics/" . time() . $name;
                if (move_uploaded_file($tmp_name, $path)) {

                    $updquery = mysqli_query($db, "UPDATE registration SET rpropic = '$path' WHERE  rid='$r'");
                    if ($updquery) {
                        ?>
                        <script>

                            swal({
                                    title: "Changed :)",
                                    text: "picture has changed ",
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
                                    title: "Sorry :(",
                                    text: "something went wrong! try again",
                                    type: "error"
                                },
                                function () {
                                    window.location.href = 'Student.php';

                                });

                        </script>

                        <?php
                    }
                } else {
                    ?>
                    <script>
                        swal({
                                title: "Sorry :(",
                                text: "something went wrong! try again",
                                type: "error"
                            },
                            function () {
                                window.location.href = 'Student.php';
                            });

                    </script>

                    <?php
                }
            } else {
                ?>
                <script>

                    swal({
                            title: " size is exceeding",
                            text: "picture should be less than 500kb :)",
                            type: "warning"
                        },
                        function () {
                            window.location.href = 'Student.php';
                        });


                </script>
                <?php
            }
        } else {
            ?>
            <script>
                swal({
                        title: "Sorry :(",
                        text: "something went wrong! try again",
                        type: "error"
                    },
                    function () {
                        window.location.href = 'Student.php';
                    });

            </script>

            <?php
        }
    } else {
        ?>
        <script>
            swal({
                    title: "Sorry :(",
                    text: "file format is invalid",
                    type: "error"
                },
                function () {
                    window.location.href = 'Student.php';
                });

        </script>

        <?php
    }
}


?>