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

        $result = mysqli_query($db, "select * from registration where rid='$id'");
        if (mysqli_num_rows($result) > 0) {

            $row = mysqli_fetch_assoc($result);
            $uid = $row['rid'];
            $pw = $row['rpass'];
            if ($row['ractivation'] == 'deactivated')//if('$block'==="BlockStatus")
            {
                $state = mysqli_query($db, "UPDATE registration SET ractivation='activated' WHERE rid = '$id';");
                if ($state) {
                    $bn = $row['rmobile'];
                    $ch = curl_init();
                    $user = "ninadcs00@gmail.com:1491414";
                    $receipientno = $bn;
                    $senderID = "TEST SMS";
                    $msgtxt = "Your Account on Deplyser is Activated.Now you can Log in.Your id is " . $uid . " and password is " . $pw . ". Please change your password after login";
                    curl_setopt($ch, CURLOPT_URL, "http://api.mVaayoo.com/mvaayooapi/MessageCompose");
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, "user=$user&senderID=$senderID&receipientno=$receipientno&msgtxt=$msgtxt");
                    $buffer = curl_exec($ch);
                    if (empty ($buffer)) {

                        echo " buffer is empty ";
                    } else {
                        echo $buffer;
                    }


                    curl_close($ch);


                }

            } else {
                $state = mysqli_query($db, "UPDATE registration SET ractivation='deactivated' WHERE rid = '$id';");

            }
            if ($state) {
                if ($row['rdesignation'] == 'teacher') {
                    header('location:teachers_data.php#example1');
                } else {


                    //header('Location: '.$_SERVER['REQUEST_URI']);

// header('Location: '.$_SERVER['PHP_SELF']);
                    header('location:students.php#example1');
                    //header("location:students.php#b");
                    // header("Location: ".$_SERVER['HTTP_REFERER']);
                }


            } else {
                ?>
                <script>
                    window.alert("something went wrong");
                    window.location = "students.php";
                </script>
                <?php


            }
        }
    }
}

