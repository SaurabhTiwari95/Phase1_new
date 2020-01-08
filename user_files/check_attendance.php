<?php
session_start();
require_once "database.php";
@$trid = $_SESSION['urid'];
@$user = $_SESSION['uname'];
if (empty($trid)) {
    ?>
    <script>
        window.location = "register_login.html";
    </script>
    <?php
}


/**
 * Created by PhpStorm.
 * User: ninad
 * Date: 06-04-2017
 * Time: 21:54
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Attendance Check</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">

</head>
<body>
<a href="Teacher.php" class=""><i class="fa fa-4x fa-arrow-circle-o-left" title="Go to Previous Page"></i></a>
<img src="../images/demologo.png" class="img-circle " height="100" style="position: absolute;top: -10px;left: 1230px;">
<center>
    <h2><u>Attendance Details</u></h2><br>
    <h4>Teacher's Name: <i><?php echo $user; ?></i></h4><br>

    <div class="input-sm">
        <form action="" method="post">

            <input type="text" class="form-control pull-right" name="roll" placeholder="Enter Roll Number" required><br><br><br>
            <select name="subj" class="form-control pull-right" required>
                <option>
                    Select Subjects
                </option>
                <?php
                $subj = mysqli_query($db, "select * from checksub where checksub.teacher_id='$trid' ");
                if (mysqli_num_rows($subj) > 0) {

                    while ($ss = mysqli_fetch_assoc($subj)) {
                        ?>
                        <option value="<?php echo $ss['subj_name']; ?>">
                            <?php echo $ss['subj_name'] ?>
                        </option>
                        <?php


                    }
                }
                ?></select><br><br><br>
            <input type="submit" class="btn-sm btn-primary" style="float: right;margin-right: 30px" name="submit"
                   value="Get Details"></form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
    $roll_number = $_POST['roll'];
    $subject = $_POST['subj'];
    $query = mysqli_query($db, "select * from attendance,registration where attendance.stud_id='$roll_number' and attendance.stud_subject='$subject'and attendance.stud_id=registration.rid");
    if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    ?>

    <br><br><br><br><br><br>

    <div><h4><i>Student Name:</i> <u><?php echo $data['stud_name']; ?></u></h4>

        <div><h4><i>Student Email:</i> <u><?php echo $data['remail']; ?></u></h4>

            <div><h4><i>Student Contact:</i> <u><?php echo $data['rmobile']; ?></u></h4>
                <h4><i>Semester:</i> <u><?php echo $data['stud_sem']; ?></u></h4>
                <h4><i>Branch & Section:</i> <u><?php echo $data['stud_branch'] . " / " . $data['stud_section']; ?></u>
                </h4>
                <?php
                $c = mysqli_num_rows($query);
                $query1 = mysqli_query($db, "select * from attendance where stud_status='A' and stud_id='$roll_number' and stud_subject='$subject'");
                $co = mysqli_num_rows($query1);

                ?>
                <h4><i>Total Classes:<u></i> <?php echo $c; ?></u></h4>
                <h4><i>Total Absentees:<u></i> <?php echo $co; ?></u></h4>
                <h4><i>Total Presents:<u></i> <?php echo $p = $c - $co; ?></u></h4>
                <?php
                $per = ($p / $c) * 100;
                ?>
                <h4><i> Percentage: </i><u><?php echo number_format((float)$per, 2, '.', '') . " %"; ?></u></h4>


            </div>


            <?php


            }
            else {

                echo "<h4><br><br><br><br><br><br><br>User not found or Roll number is wrong</h4>";

            }
            }

            ?>
</center>


</body>
</html>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>