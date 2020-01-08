<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Change</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <link rel="stylesheet" type="text/css" href="register_login.css">
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
<script src="../bootstrap/css/bootstrap.css"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../js/jquery.min.js"></script>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="register_login.css">


<script src="../js/jquery-1.12.4.js"></script>
<script src="../js/jquery-ui.js"></script>
<script src="../bootstrap/css/bootstrap.css"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<body style=" background-color:#13232F">
<a href="register_login.html" class="btn btn-info">Go to Login</a>
<img src="../images/demologo.png" class="img-circle " height="100" style="position: absolute;top: -10px;left: 1230px;">

<form action="" method="post">
    <div class="container" style="margin-left: 230px;margin-top: 50px">
        <div class="top-row">
            <div class="field-wrap">
                <input type="password" name="pwd" placeholder="Enter Your New Password">
            </div>
            <div class="field-wrap">
                <button type="submit" class="btn btn-default" style="height: 40px;width: 100px" name="sub4"
                        value="change">Confirm
                </button>
            </div>
        </div>
        <?php
        session_start();
        require_once "database.php";
        if (isset($_POST['sub4'])) {

            $pass = $_POST['pwd'];
            $m = $_SESSION['cont'];

            $s = mysqli_query($db, "select * from registration where rmobile='$m'");
            if (mysqli_num_rows($s) == 1) {
                $upd1 = mysqli_query($db, "update registration set rpass='$pass' where rmobile='$m'");
                if ($upd1) {
                    ?>
                    <h3 style="color: whitesmoke"><?php echo "Password Changed"; ?></h3>
                    <?php

                } else {
                    ?>
                    <h3 style="color: whitesmoke"><?php echo "Failed"; ?></h3>
                    <?php

                }
            }
        } ?>
    </div>
</form>
</body>
</html>