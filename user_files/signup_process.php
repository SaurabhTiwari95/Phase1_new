<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
</head>
<body>

</body>
</html><?php
session_start();
require_once "database.php";
$uname = $_POST['uname'];
$umail = $_POST['uemail'];
$umobile = $_POST['umobile'];
$uid = $_POST['uid'];
//$udate=$_POST['udate'];
$upass = $_POST['upass'];
$ucpass = $_POST['ucpass'];
$ustatus = $_POST['ustatus'];
$ugender = $_POST['gender'];
$udep = $_POST['udepartment'];
$sm = $_POST['sems'];

$query1 = mysqli_query($db, "select * from registration where rid='$uid'");
if (mysqli_num_rows($query1) > 0) {
    ?>
    <script>

        swal({
                title: "Already Registered :)",
                text: "You are alraedy registered,You may Sign in",
                type: "warning"
            },
            function () {
                window.location.href = 'register_login.html';

            });


    </script>
    <?php
} elseif ($upass != $ucpass) {
    ?>
    <script>

        swal({
                title: " Password Mismatch",
                text: "Confirm Password Correctly :)",
                type: "warning"
            },
            function () {
                window.location.href = 'register&login.html';

            });


    </script>
    <?php
} else {


    $result = mysqli_query($db, "INSERT INTO registration(rid,rsem,rname,remail,rmobile,rpass,rgender,rdepartment,rdesignation)VALUES('$uid','$sm','$uname','$umail','$umobile','$upass','$ugender','$udep','$ustatus')");
    if ($result) {
        ?>
        <script>

            swal({
                    title: "Congratulations :)",
                    text: "Registration Successful",
                    type: "success"
                },
                function () {
                    window.location.href = 'register_login.html';

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
                    window.location.href = 'register_login.html';

                });

        </script>

        <?php
    }
}
?>

