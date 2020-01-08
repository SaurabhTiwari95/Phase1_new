<?php


?>

<html xmlns="http://www.w3.org/1999/html">
<title>Marks Panel</title>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">

    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">

    <meta charset="UTF-8">
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
<u><i>
        <center style="font-size: 30px;font-weight: 500">Marking Panel</center>
    </i></u>
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
if (array_key_exists('k', $_GET)) {
$id = $_GET['k'];
$subj = $_SESSION['subj'];
$ic = $_SESSION['idd'];

$q = mysqli_query($db, "select * from sessional where stud_id='$id' and stud_subject='$subj'");
if (mysqli_num_rows($q) == 1)
{
$row = mysqli_fetch_assoc($q);
?><br><span class="w3-text-black w3-hover-text-blue w3-large" style="margin-left: 30px"><?php echo $row['stud_name']; ?>
    <span>
            <?php
            ?><span class="w3-text-black w3-hover-text-blue w3-large w3-text-shadow"
                    style="float: right;margin-right: 30px"><?php echo ucwords($row['stud_subject']); ?></span>


<body>

<div style="overflow-x:auto">
    <form action="" method="post">

        <table>
            <tr class="w3-accordion w3-animate-zoom w3-hover-green">
                <td>First Sessional</td>
                <td><input type="text" class="w3-text-shadow w3-text-indigo" name="firsts"
                           value=" <?php echo $row['first_xam']; ?>"></td>
            </tr>
            <tr class="w3-accordion w3-animate-zoom w3-hover-green">
                <td>Second Sessional</td>
                <td><input type="text" class="w3-text-shadow w3-text-indigo" name="seconds"
                           value=" <?php echo $row['second_xam']; ?>"></td>
            </tr>
            <tr class="w3-accordion w3-animate-zoom w3-hover-green">
                <td>Third Sessional</td>
                <td><input type="text" class="w3-text-shadow w3-text-indigo" name="thirds"
                           value=" <?php echo $row['third_xam']; ?>"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <a class="" href="stu_list.php?j=<?php echo $ic; ?>" style="" title="Go to Previous Page"><i
                            class="fa fa-4x fa-arrow-circle-o-left"></i></a>
                    <button class="w3-btn-group w3-btn-floating-large" type="submit" name="marks" value="add marks"
                            style="float:right" title="Click to Add Marks">Add
                    </button>
                </td>
            </tr>
        </table>

    </form>


    <?php


    if ((isset($_POST['marks']))) {
        $fs = $_POST['firsts'];
        $ss = $_POST['seconds'];
        $ts = $_POST['thirds'];
        if ($fs) {

            $upq = mysqli_query($db, "update sessional set first_xam='$fs' where stud_id='$id' and stud_subject='$subj'");

        }
        if ($ss) {
            $upq = mysqli_query($db, "update sessional set second_xam='$ss' where stud_id='$id' and stud_subject='$subj' ");

        }
        if ($ts) {
            $upq = mysqli_query($db, "update sessional set third_xam='$ts' where stud_id='$id' and stud_subject='$subj'");

        }


        //echo"successful";
        $url1 = $_SERVER['REQUEST_URI'];
        header("Refresh: .8; URL=$url1");


    } else {
        // echo"please enter marks";
    }
    }
    else {
        echo "user is not avilable";
    }
    }
    else {
        echo "Array key does not exist";
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
</div>
</body>
</html>