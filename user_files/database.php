<?php
const db = "project";
const USER = "root";
const PASS = "";
const HOST = "localhost";
$db = mysqli_connect(HOST, USER, PASS, db) or die(mysqli_error($db));
?>