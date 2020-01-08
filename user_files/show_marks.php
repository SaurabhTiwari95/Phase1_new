<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/w3.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/w3.css">

    <meta charset="UTF-8">
    <title>Marks Show</title>
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
</head>
<?php
session_start();
require "database.php";
@$uname = $_SESSION['uname'];
@$uid = $_SESSION['urid'];
@$rsem = $_SESSION['rsem1'];
@$dep = $_SESSION['rdep'];
if (empty($uname)) {
    ?>
    <script>
        window.location = "register_login.html";
    </script>
    <?php
}
?>
<body style="background-color: #d2d6ef" id="one">
<img src="../images/demologo.png" class="img-rounded" height="100">
<img style="float: right;height: 130px;width: 190px" src="../images/united_logo1.png">
<a class="" style="float: left;text-decoration: none;margin-left: 20px" href="Student.php"
   title="Go to Previous Page"><i
        class="fa fa-4x fa-arrow-circle-left"></i></a>
<center>
    <div style="width: 80%;height: 80%">
        <h1><u>Marks Details</u></h1>

        <h3>Maximum Marks : 30</h3>

        <form>

<span style="float: left;font-size: 20px"><?php
    echo $uname . " ( " . ucwords($dep) . " )"; ?>
        </span>
        <span style="float: right;font-size: 20px">SEMESTER : <?php
            echo $rsem; ?>
        </span>
            <br>
            <br>
            <table>
                <tr>
                    <th>Subjects</th>
                    <th>First Sessional</th>
                    <th>Second Sessional</th>
                    <th>Third Sessional</th>
                </tr>

                <?php
                $marks = mysqli_query($db, "select * from sessional where stud_id='$uid'");
                if (mysqli_num_rows($marks) > 0) {
                    $count = 0;
                    while ($rowq = mysqli_fetch_assoc($marks)) {

                        ?>
                        <tr>
                            <td><?php echo ucwords($rowq['stud_subject']); ?></td>
                            <td><?php echo $rowq['first_xam'] ?></td>
                            <td><?php echo $rowq['second_xam'] ?></td>
                            <td><?php echo $rowq['third_xam'] ?></td>
                        </tr>
                        <?php
                        $count++;
                        $to = mysqli_query($db, "select sum(first_xam),sum(second_xam),sum(third_xam)from sessional where stud_id='$uid' ");
                        while ($t = mysqli_fetch_assoc($to)) {
                            $first = $t['sum(first_xam)'];
                            $second = $t['sum(second_xam)'];
                            $third = $t['sum(third_xam)'];
                        }
                    }
                    $no = $count;
                }
                ?>
            </table>
            <br><br>

            <div style="border: groove;width: 80%;">
        <span>First Sessional :
        <b><?php echo $first;
            $to = $no * 30; ?></b> out of <?php echo $to ?> </span>&nbsp&nbsp <span>Percentage : <b> <?php
                        $per = $first / $to;
                        $per1 = $per * 100;
                        echo $a = number_format((float)$per1, 2, '.', '') . " %"; ?></b></span><br><br>

        <span>Second Sessional : <b><?php echo $second;
                $to = $no * 30; ?> </b>out of <?php echo $to; ?></span>&nbsp&nbsp<span>Percentage : <b> <?php
                        $per = $second / $to;
                        $per1 = $per * 100;
                        echo $a = number_format((float)$per1, 2, '.', '') . " %"; ?> </b></span><br><br>
        <span>Third Sessional : <b><?php echo $third;
                $to = $no * 30; ?></b> out of <?php echo $to; ?></span>&nbsp&nbsp<span>Percentage : <b> <?php
                        $per = $third / $to;
                        $per1 = $per * 100;
                        echo $a = number_format((float)$per1, 2, '.', '') . " %"; ?></b></span><br>
            </div>
            <br>
            <a href="#" style="cursor: pointer;" class="" onclick="printContent('one')" title="Print Marksheet"><i
                    class=" fa fa-3x fa-print"></i></a>
        </form>
    </div>
    <br>
</center>

</body>
</html>
<script type="text/javascript">
    <!--
    function printContent(id) {
        str = document.getElementById(id).innerHTML;
        newwin = window.open('', 'printwin', 'left=300,top=100,width=1000,height=800');
        newwin.document.write('<HTML>\n<HEAD>\n');
        newwin.document.write('<TITLE>Print Page</TITLE>\n');
        newwin.document.write('<script>\n');
        newwin.document.write('function chkstate(){\n');
        newwin.document.write('if(document.readyState=="complete"){\n');
        newwin.document.write('window.close()\n');
        newwin.document.write('}\n');
        newwin.document.write('else{\n');
        newwin.document.write('setTimeout("chkstate()",2000)\n');
        newwin.document.write('}\n');
        newwin.document.write('}\n');
        newwin.document.write('function print_win(){\n');
        newwin.document.write('window.print();\n');
        newwin.document.write('chkstate();\n');
        newwin.document.write('}\n');
        newwin.document.write('<\/script>\n');
        newwin.document.write('</HEAD>\n');
        newwin.document.write('<BODY onload="print_win()">\n');
        newwin.document.write(str);
        newwin.document.write('</BODY>\n');
        newwin.document.write('</HTML>\n');
        newwin.document.close();
    }
    //-->
</script>