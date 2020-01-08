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
require_once "database.php";


$rmail = $_SESSION['email'];

if ($_POST && isset($_FILES['my_file'])) {

    $from_email = $rmail;
    $recipient_email = $_POST['tname'];


    // $reply_to_email = filter_var($_POST["sender_email"], FILTER_SANITIZE_STRING);
    $reply_to_email = $rmail;
    $subject = filter_var($_POST["subject"], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);


    $file_tmp_name = $_FILES['my_file']['tmp_name'];

    $file_name = $_FILES['my_file']['name'];
    $file_size = $_FILES['my_file']['size'];
    $file_type = $_FILES['my_file']['type'];
    $file_error = $_FILES['my_file']['error'];
    $boundary = md5("deplyser");


    if ($file_tmp_name != "") {
        $handle = fopen($file_tmp_name, "r");
        $content = fread($handle, $file_size);
        fclose($handle);
        $encoded_content = chunk_split(base64_encode($content));


//header
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From:" . $from_email . "\r\n";
        $headers .= "Reply-To: " . $reply_to_email . "" . "\r\n";
        $headers .= "Content-Type: multipart/mixed; boundary = $boundary\r\n\r\n";

//plain text
        $body = "--$boundary\r\n";
        $body .= "Content-Type: text/plain; charset=ISO-8859-1\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n\r\n";
        $body .= chunk_split(base64_encode($message));

//attachment
        $body .= "--$boundary\r\n";
        $body .= "Content-Type: $file_type; name=" . $file_name . "\r\n";
        $body .= "Content-Disposition: attachment; filename=" . $file_name . "\r\n";
        $body .= "Content-Transfer-Encoding: base64\r\n";
        $body .= "X-Attachment-Id: " . rand(1000, 99999) . "\r\n\r\n";
        $body .= $encoded_content;

        $sentMail = @mail($recipient_email, $subject, $body, $headers);
        if ($sentMail) //output success or failure messages
        {
            ?>
            <script>
                swal({
                        title: "Successful :)",
                        text: " Thank you for your email :)",
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
                        title: "Failed :(",
                        text: "Could not send mail! Please try again later",
                        type: "error"
                    },
                    function () {
                        window.location.href = 'Teacher.php';

                    });
            </script>
            <?php

        }

    } else {


        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";


        $headers = "From: " . $from_email . "\r\n";


        if (mail($recipient_email, $subject, $message, $headers)) {
            ?>
            <script>
                swal({
                        title: "Successful :)",
                        text: " Thank you for your email :)",
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
                        title: "Failed :(",
                        text: "Could not send mail! Please try again later",
                        type: "error"
                    },
                    function () {
                        window.location.href = 'Teacher.php';

                    });
            </script>
            <?php
        }
    }
}
?>