<?php
session_start();
require_once "database.php";
@$stu_id = $_SESSION['urid'];
@$sem = $_SESSION['rsem1'];
@$branch = $_SESSION['rdep'];
if (empty($stu_id)) {
    ?>
    <script>
        window.location = "register_login.html";
    </script>
    <?php
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Show Attendance</title>
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">

    <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
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

    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
</head>


<body style="background-color: #d2d6ef">

<img style="float: right;height: 130px;width: 190px" src="../images/united_logo1.png">
<a class="" style="float: left;text-decoration: none;margin-left: 20px" href="Student.php"
   title="Go to Previous Page"><i
        class="fa fa-4x fa-arrow-circle-left"></i></a>
<img src="../images/demologo.png" class="img-rounded pull-left" height="100">
<center>
    <div>
        <label style="margin-top: 50px;font-size: 30px;font-weight: 100;margin-left: 30px"><u><i>Select Date To Check
                    Attendance</i></u></label>

        <form action="" style="margin-top: 50px" method="post">
            <div class="input-group date">
                <input type="text" name="start" class="form-control pull-right" id="datepicker1"
                       placeholder="Enter Start Date">
                <input type="text" name="end" class="form-control pull-right" id="datepicker2"
                       placeholder="Enter End Date">

                <select name="su" class="form-control select2">
                    <?php
                    $query = mysqli_query($db, "select * from subject where ssem='$sem' and sdname='$branch'");
                    if (mysqli_num_rows($query) > 0) {

                        while ($row = mysqli_fetch_assoc($query)) {


                            echo '<option value="' . $row['subname'] . '">';
                            echo $row['subname'];
                            echo '</option>';


                        }
                    }
                    ?>
                </select></div>


            <br>
            <input type="submit" name="sub" value="submit" class="btn btn-info"
                   title="Enter dates & subject to see Attendance">
            <!-- /.input group -->


        </form>
    </div>
</center>


</html><br>

<?php
if (isset($_POST['sub'])) {
    @$cm = new DateTime($_POST['start']);
    @$cm2 = new DateTime($_POST['end']);
    $start = date_format($cm, 'Y-m-d');
    $end = date_format($cm2, 'Y-m-d');
    $subject = $_POST['su'];
    // $student=$_POST['u_name'];
    ?>
    <center>
    <table border="1">
    <tr>
        <th>Name</th>
        <th>Status</th>
        <th>Subject</th>
        <th>Date</th>

    </tr>

    <?php

    $q = mysqli_query($db, "select * from attendance where stud_date1 BETWEEN '$start' and '$end' and stud_subject='$subject' and stud_id='$stu_id'");
    if (mysqli_num_rows($q) > 0) {
        while ($row = mysqli_fetch_assoc($q)) {
            ?>
            <tr>
                <td><?php echo $row['stud_name']; ?></td>
                <td><?php echo $row['stud_status']; ?></td>
                <td><?php echo ucwords($row['stud_subject']); ?></td>
                <td><?php $s = new DateTime($row['stud_date1']);

                    echo date_format($s, 'd-M-y'); ?></td>
            </tr>
            <?php
        }
        $a = mysqli_num_rows($q);
        echo "total numbers of attendance: " . $a . "<br>";
        $ab = mysqli_query($db, "select * from attendance where stud_date1 BETWEEN '$start' and '$end' and stud_status='A' and stud_id='$stu_id' and stud_subject='$subject'");
        $bx = mysqli_num_rows($ab);
        echo "Total numbers of absentees: " . $bx . "<br>";

        $pre = $a - $bx;
        echo "Total numbers of presents: " . $pre . "<br>";

        $percent = ($pre / $a) * 100;
        echo "Percentage of attendance is: " . number_format((float)$percent, 2, '.', '') . " %";


        ?>
        </table></center>
        <?php
    } elseif (empty($subject) && empty($_POST['start']) && empty($_POST['end'])) {
        echo "You can not leave all fields blank";
    } else {
        echo "Result Not Found";
    }

}

?>

<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>

<!-- Bootstrap 3.3.6 -->
<!--<script src="bootstrap/js/bootstrap.min.js"></script>-->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap 3.3.6 -->

<script>
    $('#datepicker1').datepicker({
        autoclose: true,
        dateFormat: "Y-m-d"
    });
</script>
<script>
    $('#datepicker2').datepicker({
        autoclose: true,
        dateFormat: "Y-m-d"
    });
</script>

<script type="text/javascript">
    function printv() {
        window.print();
    }
</script>

