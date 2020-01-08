<html>
<head>
    <meta charset="UTF-8">
    <title>Student List</title>
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">

    </link>
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
</head>
<?php
require "database.php";
session_start();
@$user = $_SESSION['uname'];
@$trid = $_SESSION['urid'];
if (empty($user))
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
if (array_key_exists('j', $_GET)) {
$id = $_GET['j'];
$_SESSION['idd'] = $id;


$result1 = mysqli_query($db, "select * from checksub where ch_id='$id'");
if (mysqli_num_rows($result1) > 0) {

$rc = mysqli_fetch_assoc($result1);
$depp = $rc['depp_name'];
$se = $rc['sec'];
//$dep=$_SESSION['dn'];
//$se=$_SESSION['sr'];
$sub = $rc['subj_name'];
$sem = $rc['sem'];


$n = mysqli_query($db, "select * from registration,subject where subject.subname='$sub' and rdesignation='student' and registration.rsem='$sem' and rsection='$se'and registration.rdepartment=subject.sdname");
if (mysqli_num_rows($n) > 0)
{
?>

<body>
<a class="" href="Teacher.php" style="width: 80px;text-decoration: none;" title="Go to Previous Page"><i
        class="fa fa-arrow-circle-o-left fa-4x"></i>

</a>
<img src="../images/demologo.png" class="img-circle " height="100" style="position: absolute;top: -10px;left: 1230px;">
<br>
<center>
    <h3><u>List Of Students</u></h3>
    <h4>Subject:<i> <?php echo ucwords($sub); ?><br></i>
        Branch & Section:<i> <?php echo ucwords($depp) . " / " . $se; ?></i><br>
        Semester: <i><?php echo $sem; ?></h4></b></center>

<div class="w3-animate-opacity" style="overflow-x:auto">
    <table data-bar-Spacing="1" border="1">
        <tr class="w3-accordion w3-animate-opacity w3-animate-zoom w3-hover-light-blue">
            <th>Roll Number</th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact</th>
            <th>ADD Marks</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($n))
        {
        ?>

        <tr class="w3-accordion w3-hover-green">
            <td><?php echo $sid = $row['rid']; ?></td>
            <td><?php echo $sname = $row['rname']; ?></td>
            <td><?php echo $row['remail']; ?></td>
            <td><?php echo $row['rmobile']; ?></td>

            <td><?php
                echo "<a  class='btn btn-sm info label-danger ' href='stu_marks.php?k=" . $row['rid'] . "' title='Click to Add Marks'>" . "Add Marks" . "</a>";
                ?> </td>

            <?php

            $ins = mysqli_query($db, "insert into sessional(stud_id,stud_name,stud_section,stud_branch,stud_sem,stud_subject)values('$sid','$sname','$se','$depp','$sem','$sub')");

            }
            }
            }
            }
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
        </tr>
    </table>
</div>
</body>
</html>