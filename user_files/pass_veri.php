<?php
require "database.php";
session_start();
?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Password Verification</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/">
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="register_login.css">
    <script src="../js/sweetalert.min.js"></script>
    <script src="../bootstrap/css/bootstrap.css"></script>
    <script src="../js/jquery-1.12.4.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script src="../bootstrap/css/bootstrap.css"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/jquery.min.js"></script>
</head>
<body style="background-color: #13232F">

<div class="container" style="margin-left: 180px;margin-top: 20px">
    <a class="btn btn-default" href="register_login.html">Go Back to Login</a>
    <img src="../images/demologo.png" class="img-circle " height="100"
         style="position: absolute;top: -10px;left: 1230px;"><br>

    <form method="post" action="">
        <div class="container">
            <div class="top-row" style="margin-top: 20px">
                <div class="field-wrap">
                    <input type="text" name="mob1" placeholder="Enter Mobile Number">
                </div>
                <div class="field-wrap">
                    <button class="btn btn-default" style="height: 40px;width: 100px" type="submit"
                            value="get otp on registered mobile" name="sub2">GET OTP
                    </button>
                </div>
            </div>
            <div class="top-row">
                <div class="field-wrap">
                    <input type="email" name="mail1" placeholder="Enter Email">
                </div>
                <div class="field-wrap">
                    <button type="submit" style="height: 40px;width: 100px" class="btn btn-default"
                            value="get otp on registered email" name="sub5">GET OTP
                    </button>
                </div>
            </div>
            <div class="top-row">
                <div class="field-wrap">
                    <input type="text" name="votp" placeholder="Enter OTP">
                </div>
                <div class="field-wrap">
                    <button type="submit" style="height: 40px;width: 100px" class="btn btn-default" name="sub3"
                            value="verify otp">Confirm
                    </button>
                </div>
            </div>
            <?php
            @$mobile = $_POST['mob1'];
            @$email = $_POST['mail1'];
            if (isset($_POST['sub2'])) {

                $q = mysqli_query($db, "select * from registration where rmobile='$mobile'");
            if (mysqli_num_rows($q) > 0) {
                $row = mysqli_fetch_assoc($q);
                $mob1 = $row['rmobile'];
                $uid = $row['rid'];
                //$_SESSION['con'] = $mob1;
                $mail = $row['remail'];
                $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                $s = '';
                for ($i = 1; $i <= 6; $i++) {
                    $num = rand() % strlen($salt);
                    $tmp = substr($salt, $num, 1);
                    $s = $s . $tmp;
                }
                $ch = curl_init();
                $user = "ninadkhot171@gmail.com:1491414";
                $receipientno = $mobile;
                $senderID = "TEST SMS";
                $msgtxt = "your otp is: " . $s . " -Regards from Deplyser";
                curl_setopt($ch, CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
                $buffer = curl_exec($ch);
                if (empty($buffer)) {
                    echo "empty";
                } else {
                    echo " ";
                }
                $nk = mysqli_query($db, "insert into otp(otp_contact,otp_mail,otp_userid)values('$mob1','$mail','$uid')");

                $upd = mysqli_query($db, "update otp set otp_no='$s' where otp_contact='$mobile'");
            if ($upd) {

                ?>
                <script>
                    swal({
                            title: "Successfull :)",
                            text: " otp sent successfully :)",
                            type: "success"
                        },
                        function () {

                            window.location.href = 'pass_veri.php';

                        });

                </script>
            <?php
            }
            else{
            ?>
                <script>
                    swal({
                            title: "Failed :(",
                            text: "error occured",
                            type: "error"
                        },
                        function () {
                            window.location.href = 'pass_veri.php';

                        });
                </script>
            <?php
            }
            }

            else {
            ?>
                <script>

                    swal({
                            title: " contact admin !",
                            text: 'your mobile number is not found in our database..please contact to your admin  ',

                            type: "info"
                        },
                        function () {
                            window.location.href = 'register_login.html';

                        });

                </script>
            <?php

            }
            }
            elseif (isset($_POST['sub3'])) {
            $otp1 = $_POST['votp'];
            $nn = mysqli_query($db, "select * from otp where otp_no='$otp1'");
            if (mysqli_num_rows($nn) == 1) {
            $a = mysqli_fetch_assoc($nn);
            $_SESSION['cont'] = $a['otp_contact'];

            ?>
                <div>
                    <div><h1>OTP Verification Successful</h1>

                        <h2 style="color: white">Now Change The Password</h2>

                        <a class="btn btn-default" href="pass_change.php">Click Me to Change Password</a>


                    </div>
                </div>
            <?php


            } else {
            ?>
                <script>
                    swal({
                            title: "Failed :(",
                            text: "error occured",
                            type: "error"
                        },
                        function () {
                            window.location.href = 'pass_veri.php';

                        });
                </script>
            <?php
            }
            }

            elseif (isset($_POST['sub5']))
            {
            $q = mysqli_query($db, "select * from registration where remail='$email'");
            if (mysqli_num_rows($q) > 0) {
            $row = mysqli_fetch_assoc($q);
            $mob1 = $row['rmobile'];
            $uid = $row['rid'];
            //$_SESSION['con'] = $mob1;
            $mail = $row['remail'];
            $customer = $email;
            $emailSubject = "DEPLYSER OTP verification";
            $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
            $s = '';
            for ($i = 1; $i <= 6; $i++) {
                $num = rand() % strlen($salt);
                $tmp = substr($salt, $num, 1);
                $s = $s . $tmp;
            }
            $emailContent = "Thanks to request an OTP" . "\n" . "your otp code is " . $s . " -Regards from Deplyser";
            $headers = "From: deplyserapp@gmail.com" . "\r\n";

            $nk = mysqli_query($db, "insert into otp(otp_contact,otp_mail,otp_userid)values('$mob1','$mail','$uid')");

            $upd = mysqli_query($db, "update otp set otp_no='$s' where otp_mail='$email'");
            if ($upd)
            {
            ?>
                <script>
                    swal({
                            title: "Successfull :)",
                            text: " otp sent successfully :)",
                            type: "success"
                        },
                        function () {

                            window.location.href = 'pass_veri.php';

                        });

                </script>
            <?php
            }
            else{
            ?>
                <script>
                    swal({
                            title: "Failed :(",
                            text: "error occured",
                            type: "error"
                        },
                        function () {
                            window.location.href = 'pass_veri.php';

                        });
                </script>
            <?php
            }
            mail($customer, $emailSubject, $emailContent, $headers);

            }
            else
            {
            ?>
                <script>

                    swal({
                            title: " contact admin !",
                            text: 'your email is not found in our database..please contact to your admin  ',

                            type: "info"
                        },
                        function () {
                            window.location.href = 'register_login.html';

                        });

                </script>
                <?php
            }
            }


            ?>

    </form>
</div>
</body>
</html>
