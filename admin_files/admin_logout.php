<?php
session_start();
setcookie("aid", "", time() - 60);
session_destroy();
header('Location: admin_login.php');
?>