<?php
session_start();
setcookie("rid", "", time() - 60);
session_destroy();
header('Location: register_login.html');
?>