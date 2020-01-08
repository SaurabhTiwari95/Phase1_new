<?php
require "database.php";
session_start();

if (!empty($_GET)) {
    if (array_key_exists('i', $_GET)) {
        $id = $_GET['i'];
        $d = $_SESSION['subj'];
        $date = $_GET['date'];
        $anu = $_SESSION['id'];
        $q = mysqli_query($db, "select * from attendance where stud_id='$id'and stud_date1='$date' ");
        if (mysqli_num_rows($q) > 0) {
            $row = mysqli_fetch_assoc($q);
            if ($row['stud_status'] == 'A') {
                $up = mysqli_query($db, "update attendance set stud_status='P' where stud_id='$id'and stud_subject='$d' and stud_date1='$date'  ");
            } else {
                $up = mysqli_query($db, "update attendance set stud_status='A' where stud_id='$id'and stud_subject='$d'and stud_date1='$date'");
            }
            //header("location:teacher_subject.php");
            header("location:stud_attendance_list.php?date=$date&k=$anu");
        }
    }
}