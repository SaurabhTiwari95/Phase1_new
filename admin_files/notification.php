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
$sno = $_SESSION['nomsg'];

require_once "../user_files/database.php";
if (!empty($_GET)) {
    if (array_key_exists('j', $_GET)) {
        $id = $_GET['j'];

        $result = mysqli_query($db, "select * from registration where rid='$id'");
        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);

            $bn = $row['rmobile'];
            $ch = curl_init();
            $user = "ninadcs00@gmail.com:1491414";
            $receipientno = $bn;
            $senderID = "TEST SMS";
            $msgtxt = $sno;
            curl_setopt($ch, CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
            $buffer = curl_exec($ch);
            if (empty ($buffer)) {
                echo " buffer is empty ";
            } else {
                echo "";
            }


            curl_close($ch);
            ?>
            <script>

                swal({
                        title: "Congratulations :)",
                        text: "Message Sent",
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
                        title: "Sorry :)",
                        text: "Failed",
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