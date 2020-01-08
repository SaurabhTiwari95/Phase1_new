<?php

@$user = $_SESSION['uname'];
@$trid = $_SESSION['urid'];


?>

<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <style>
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            border: none;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
    <meta charset="UTF-8">
    <title>Attendance Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">

    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
</head>


<body>
<a class="" href="Teacher.php" style="width: 75px;text-decoration: none;"><i class="fa fa-4x fa-arrow-circle-left"
                                                                             title="Go to Previous Page"></i></a>
<?php
require "database.php";
session_start();
@$teacher = $_SESSION['uname'];
if (empty($teacher))
{
    ?>
    <script>
        window.location = "register_login.html";
    </script>
    <?php
}
else
{

if (!empty($_GET)) {
if (array_key_exists('k', $_GET)) {
$id = $_SESSION['id'] = $_GET['k'];
$date = $_GET['date'];

$result1 = mysqli_query($db, "select * from checksub where ch_id='$id'");
if (mysqli_num_rows($result1) > 0) {

$rc = mysqli_fetch_assoc($result1);
$depp = $rc['depp_name'];
$se = $rc['sec'];
//$dep=$_SESSION['dn'];
//$se=$_SESSION['sr'];
$sub = $rc['subj_name'];
$sem = $rc['sem']; ?>

<center>
    <h3><u>Students List For Attendance</u></h3>
    <h4>Teacher Name: <i><u></u><?php echo $teacher; ?></u></i><br>
        Subject & Semester: <i><u><?php echo ucwords($sub) . " -  " . $sem;; ?></u></i><br>
        Branch & Section: <i><u><?php echo ucwords($depp) . " - " . $se; ?></u></i></h4>

    <div>
        <label><b>Select Date For Attendance</b></label>

        <form action="" method="post" name="f1" id="f1">
            <div class="input-group date">

                <input type="text" name="d" class="" id="datepicker" style="height: 32px;" placeholder="Select Date"
                       required>
                <button class="w3-btn" type="submit" name="sub" value="submit" style="height: 32px;"
                        title="Select Date & Click me "> SUBMIT
                </button>

            </div>

        </form>

        <!-- /.input group -->
    </div>


</center>
<br>
<?php
date_default_timezone_set("Asia/kolkata");
if (isset($_POST['sub']))
{
@$cm = new DateTime($_POST['d']);
$da = date_format($cm, 'Y-m-d');
//$s = date_format($cm, 'd-M-Y');
?>
<?php
$sam = mysqli_query($db, "select * from attendance,registration where attendance.stud_date1='$da' and attendance.stud_subject='$sub'and attendance.stud_section='$se' and attendance.stud_sem='$sem' and attendance.stud_branch='$depp'and attendance.stud_id=registration.rid ");
if (mysqli_num_rows($sam) > 0)
{
?>


<div style="overflow-x:auto" id="result">
    <center>
        <table>
            <tr class="w3-accordion w3-hover-light-blue">
                <th>Roll number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Contact</th>

                <th>Add Attendance</th>
                <th>Current Status</th>
                <th>Date</th>
            </tr>
            <?php
            while ($dsa = mysqli_fetch_assoc($sam)) {
                ?>
                <tr class="w3-accordion w3-hover-green">
                    <td><?php echo $rd = $dsa['stud_id']; ?></td>
                    <td><?php echo $dsa['stud_name']; ?></td>
                    <td><?php echo $dsa['remail']; ?></td>
                    <td><?php echo $dsa['rmobile']; ?></td>

                    <td> <?php

                        echo "<a  class='btn btn-sm info label-danger ' href='attendance_process.php?date=" . $dsa['stud_date1'] . "&i=" . $dsa['stud_id'] . "'>" . $dsa['stud_status'] . "</a>";
                        ?></td>
                    <td><?php echo $dsa['stud_status']; ?></td>
                    <td><?php $sa = new DateTime($dsa['stud_date1']);
                        echo $cx = date_format($sa, 'd-M-Y'); ?></td>

                </tr>
                <?php
            }
            ?>
        </table>
    </center>
    <?php
    }

    else {
        echo "no record found";
    }


    }



    else
    {


    //$dam=date_format($cm,'d-M-y');
    // $f = date("d-M-Y");
    // if (!$date) {
    //  echo "enter date";
    // }
    $za = new DateTime($date);
    $as = date_format($za, 'Y-m-d');

    ?>

    <?php
    $n = mysqli_query($db, "select * from registration,subject where subject.subname='$sub' and rdesignation='student' and registration.rsem='$sem' and rsection='$se' and registration.rdepartment=subject.sdname");
    if (mysqli_num_rows($n) > 0)
    {
    ?>


    <div id="result" style="overflow-x:auto">
        <center>
            <table data-bar-Spacing="1" border="1">
                <tr class="w3-accordion w3-hover-light-blue">
                    <th>Roll Number</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>


                    <th>Add Attendance</th>
                    <th>Current Status</th>
                    <th>Date</th>
                </tr>

                <?php


                //$d=$_POST['f1'];

                //$da=$_POST['d'];


                while ($row = mysqli_fetch_assoc($n)) {
                    $sid = $row['rid'];
                    $sname = $row['rname'];

                    $ins = mysqli_query($db, "insert into attendance(stud_id,stud_name,stud_section,stud_branch,stud_sem,stud_subject,stud_date1)values('$sid','$sname','$se','$depp','$sem','$sub',NOW())");

                    ?>


                    <?php


                    $dis = mysqli_query($db, "select * from attendance,registration where stud_id='$sid'and attendance.stud_date1='$as' and attendance.stud_subject='$sub'and attendance.stud_section='$se' and attendance.stud_sem='$sem' and attendance.stud_branch='$depp'and attendance.stud_id=registration.rid ");
                    if (mysqli_num_rows($dis) > 0) {
                        while ($ro1 = mysqli_fetch_assoc($dis)) {

                            ?>

                            <tr class="w3-accordion w3-hover-green">
                                <td><?php echo $ro1['stud_id']; ?></td>
                                <td><?php echo $ro1['stud_name']; ?></td>
                                <td><?php echo $ro1['remail']; ?></td>
                                <td><?php echo $ro1['rmobile']; ?></td>

                                <td> <?php
                                    echo "<a  class='btn btn-sm info label-danger ' href='attendance_process.php?date=" . $date . "&i=" . $row['rid'] . "'>" . $ro1['stud_status'] . "</a>";
                                    ?>
                                </td>
                                <td><?php echo $ro1['stud_status']; ?></td>

                                <td><?php $ds = new DateTime($ro1['stud_date1']);
                                    echo date_format($ds, 'd-M-Y')
                                    ?></td>
                            </tr>
                            <?php
                        }
                    }

                }


                }
                else {
                    echo "no students found in database";
                }

                }
                }
                }
                ?>


                <?php


                }
                else {
                    ?>
                    <script>
                        window.location = "register_login.html";
                    </script>
                    <?php
                }
                }

                ?>

            </table>
        </center>

    </div>
    <i style="margin-left: 50%;cursor: pointer;" title="Click Me to Print Attendance" class=" fa fa-4x fa-print"
       onclick="printv()"></i>
    <img src="../images/demologo.png" class="img-circle " height="100"
         style="position: absolute;top: -10px;left: 1230px;">
</body>

</html>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<!--<script src="bootstrap/js/bootstrap.min.js"></script>-->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap 3.3.6 -->

<script>
    $('#datepicker').datepicker({
        autoclose: true,
        dateFormat: "Y-m-d"
    });
</script>

<script type="text/javascript">
    function printv() {
        window.print();
    }
</script>

