<?php
require "database.php";
session_start();
@$user = $_SESSION['uname'];
@$trid = $_SESSION['urid'];
@$dep = $_SESSION['rdep'];
@$dv = $_SESSION['rsem1'];
@$id = $_SESSION['urid'];
?>
<!DOCTYPE html>
<html lang="en" xmlns:margin-left="http://www.w3.org/1999/xhtml" xmlns:float="http://www.w3.org/1999/xhtml"
      xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Student-Homepage</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devidev-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">


    <!-- [ FONT-AWESOME ICON ]
        =========================================================================================================================-->
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">

    <!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="../library/vegas/vegas.min.css">
    <!-- [ Boot STYLESHEET ]
        =========================================================================================================================-->
    <link rel="stylesheet" type="text/css" href="../library/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="../library/bootstrap/css/bootstrap.css">

    <!-- [ DEFAULT STYLESHEET ]
    =========================================================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../css/responsive.css">
    <link rel="stylesheet" type="text/css" href="../css/color/white.css">
    <style>


        /* Full-width input fields
        input[type=text], input[type=password]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
            */
        /* Set a style for all buttons
         button
        {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 30%;
             alignment: center;
        }*/

        /* Extra styles for the cancel button */
        /*        .cancelbtn
                {
                    width: auto;
                    padding: 10px 18px;
                    background-color: #f44336;
                }

                /* Center the image and position the close button
                .container fluid
                {
                    text-align: center;
                    margin: 24px 0 12px 0;
                    position: relative;
                }
                */
        .container {
            padding: 16px;
        }

        /* span.psw
         {
             float: right;
             padding-top: 16px;
         }

         /* The Modal (background) */
        #id01 {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            /*z-index: 1;  Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, .1); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        /*.modal-content*/

        /* The Close Button (x)*/
        .close {
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }

        .update {
            color: #2e6da4;
            font-size: 20px;
        }

        .navbar-brand {
            height: 120px;
            width: 120px;
        }

        /*Css for Viewing Notice*/
        button.accordion {
            background-color: #5e5e5e;
            color: black;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 15px;
            transition: 0.4s;
            font-weight: bold;
        }

        button.accordion.active, button.accordion:hover {
            background-color: whitesmoke;
            color: black;
        }

        div.panel {
            padding: 0 18px;
            display: none;
            background-color: #555555;
        }

        div.panel.show {
            display: block !important;
        }

        .dropbtn {
            color: inherit;
            font-size: inherit;
            border: none;
            cursor: pointer;
        }

        /* The container <div> - needed to position the dropdown content */
        .dropdown {
            position: inherit;
            display: inline-block;
            margin-top: 12px;

        }

        /* Dropdown Content (Hidden by Default) */
        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 100px;
            box-shadow: 0px 5px 10px 0px rgba(0, 0, 0, 0.2);
        }

        /* Links inside the dropdown */
        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        /* Change color of dropdown links on hover */
        .dropdown-content a:hover {
            background-color: #f1f1f1
        }

        /* Show the dropdown menu on hover */
        .dropdown:hover .dropdown-content {
            display: list-item;
        }

        /*CSS for Side Navigation Panel*/
        .sidenav {
            height: 80%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 100px;
            left: 0;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 100px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s
        }

        .sidenav a:hover, .offcanvas a:focus {
            color: #f1f1f1;
        }

        .sidenav {
            color: white;
        }

        .closebtn {
            position: absolute;
            top: 70px;
            right: 25px;
            font-size: 36px !important;
            margin-left: 50px;
            color: transparent;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        /*++++++++Css for Profile Picture++++++++++++++++*/

        .img-thumbnail {
            height: 140px;
            width: 140px;
        }

        .img-thumbnail:hover {
            background-color: #0c0c0c;
        }

        #bn {
            cursor: pointer;
        }

        /*+++++++++++++++++++++++*/

        /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
    </style>
</head>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "400px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0px";
        document.getElementById("main").style.marginLeft = "-50px";
        document.body.style.backgroundColor = "white";
    }
</script>


<body>
<!-- Button trigger modal -->
<!--<button class = "btn btn-primary btn-lg" data-toggle = "modal" data-target = "#myModal2">
    Launch demo modal
</button>-->

<!-- Modal -->
<div class="modal fade" id="myModal2" role="dialog">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>

                <h4 style="color: #13232F" class="modal-title" id="myModalLabel">
                    <center>Information</center>
                </h4>
            </div>

            <div class="modal-body" style="color: #555555">
                <center>Keep Your <b>Contact Number</b> & <b>Email</b> updated,So That You Can Have Latest Notification
                    On Your Phone & Email.You Can Edit Your Details By Clicking on <u>"Edit Profile"</u> From Menu.
                </center>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn-lg btn-primary" data-dismiss="modal">
                    Close
                </button>


            </div>

        </div>
    </div>
</div>

<!-- [ LOADERs ]
================================================================================================================================-->

<div class="preloader">
    <div class="loader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- [ /PRELOADER ]
=============================================================================================================================-->
<!-- [WRAPPER ]
=============================================================================================================================-->
<div class="wrapper">


    <!-- [NAV]
    ============================================================================================================================-->
    <!-- Navigation
     ==========================================-->
    <nav style="height: 120px"
         class="amd-menu navbar navbar-default navbar-fixed-top theme_background_color fadeInDown">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="">
                <section class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <?php
                    $query1 = mysqli_query($db, "select * from registration where rid='$trid'");
                    $row1 = mysqli_fetch_assoc($query1);
                    $ro = $row1['rpropic'];
                    ?>
                    <img class="img-thumbnail" src="<?= $ro; ?>"
                         style="height:140px;width:140px;margin-top:1px;margin-left: -75px;" data-toggle="modal"
                         data-target="#myModal" id="bn" title="Click to Change Your DP">
                    <span style="color: #0b0b0b;font-family: 'Adobe Caslon Pro'"><?php
                        //$uname=$_SESSION['uname'];
                        echo $row1['rname']; ?><?php
                        echo "&nbsp&nbsp- " . ucwords($row1['rdesignation']);
                        ?>
                </span>
                </section>

            </div>
            <img src="../images/demologo.png" class="img-circle " height="100"
                 style="position: absolute;top: -10px;left: 1230px;">

            <br>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="#mysubj" class="page-scroll" style="color: #0b0b0b">MySubjects</a></li>
                    <li><a href="#" onclick='openNav()' class="" style="color: #0b0b0b" title="Edit Your Profile">Edit
                            Profile</a></li>
                    <li><a href="show_marks.php" class="page-scroll" style="color: #0b0b0b"
                           title="See Your Sessional Marks">Show Marks</a></li>
                    <li><a href="show_attendance.php" class="page-scroll" style="color: #0b0b0b"
                           title="See Your Attendance"> Show Attendance</a>
                    </li>

                    <li><a href="#notice" class="page-scroll" style="color: #0b0b0b" title="See Notices">Notice</a></li>
                    <li><a href="#ask_queries" class="page-scroll" id="queries" style="color: #0b0b0b" title="Do Mails">MailBox</a>
                    </li>
                    <div class="dropdown">
                        <li><a href="#" class="dropbtn"
                               style="color: #0b0b0b;margin-top: inherit; font-family:inherit;font-size:14px;font-weight: inherit">Account
                                setting</a>
                        <li class="dropdown-content">
                            <a style="font-size: 13px" href="password_setting_student.php" title="Change Your password">Change
                                Password</a>
                            <a style="font-size: 13px" href="logout.php" name="hj">Sign Out</a>

                        </li>

                    </div>

                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!--++++++++++++++++++++++++++++++++++++++++++++++++++++
<We get User Name Form Session>
<div style="height: 4000px;width: auto" class="how-works">welcome <b style="margin- top: 200px"><php echo $user; ?></b>

    </div>



    +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
    <section id="mysubj" class="how-works" style="margin-top:120px;width:100%;height:50%">
        <div class="how-it-works-heading"><br>

            <h2 class="text-center" style="margin-left: 50px;"><u>Teachers & Subjects</u></h2>
        </div>
        <br>

        <?php
        $uname = $_SESSION['uname'];
        if (empty($uname))
        {
            ?>
            <script>
                window.location = "register_login.html";
            </script>
            <?php

        }
        else
        {
        $njl = mysqli_query($db, "select * from registration where rid='$id'");
        if (mysqli_num_rows($njl) > 0)
        {
        $e = mysqli_fetch_assoc($njl);
        $d = $e['rdepartment'];
        $df = $e['rsem'];
        ?>
        <div style="margin-left:420px;" class="">
            <?php
            $nk = mysqli_query($db, "select * from subject where subject.sdname='$d' and subject.ssem='$df' ");
            if (mysqli_num_rows($nk) > 0) {
                while ($r = mysqli_fetch_assoc($nk)) {
                    $sss = $r['subname'];
                    ?>
                    <?php
                    //echo $r['sdname'].;
                    $quehh = "select * from checksub,registration  where subj_name LIKE '%$sss%' and registration.rid=checksub.teacher_id";
                    $q = mysqli_query($db, $quehh);

                    while ($row2 = mysqli_fetch_array($q)) {
                        $ds = $row2['rpropic'];
                        ?>
                        <div style="margin-bottom: 50px;width:50%;float: left;">
                            <span style="margin-top: 100px;"><img
                                    style="margin-left:1px;margin-top:20px;height: 100px;width: 100px"
                                    class="img-thumbnail" src="<?= $ds; ?>"></span><br>
                            <span style="margin-bottom: 250px;"><?php echo $row2['rname']; ?></span><br>
                            <span>-<?php echo ucwords($sss = $r['subname']); ?></span></div>
                        <?php
                    }

                }
            }
            }
            else {
                echo "Failed to load Subjects";
            }
            }
            ?>
        </div>
    </section>
    <section id="hid" class="how-works">
        <form method='POST' id="bn" class='' action='student_updation.php'>
            <div class='container text-justify'>
                <div id="mySidenav" class="sidenav container-fluid text-justify">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">X</a>
                    <span style="margin-left:30px;">Name(Uppercase)</span><input style="margin-left:30px;" type="text"
                                                                                 name="sname" class="form-control"
                                                                                 value="<?php echo $row1['rname']; ?>"><br>
                    <span style="margin-left:30px;">Gender(Uppercase)</span><input style="margin-left:30px;" type="text"
                                                                                   name="sgender" class="form-control"
                                                                                   value="<?php echo $row1['rgender']; ?>"><br>
                    <span style="margin-left:30px;">Mobile</span><input style="margin-left:30px;" type="text"
                                                                        name="smobile" class="form-control"
                                                                        value="<?php echo $row1['rmobile']; ?>"><br>
                    <span style="margin-left:30px;">Email</span><input style="margin-left:30px;" type="email"
                                                                       name="semail" class="form-control"
                                                                       value="<?php echo $row1['remail']; ?>"><br>


                    <!--UserName will be the university roll number or College ID-->
                    <button type="submit" class="btn btn-style blue" style="margin-left:250px;color: #000;"><b>UPDATE<b>
                    </button>
                </div>
            </div>
        </form>
    </section>


    <section class="how-works" style="" id="notice">
        <div class="overlay">
            <div class="container">
                <div class="row text-center">
                    <div class="how-it-works-heading">
                        <h2 class=""><u>Notice</u></h2><br>
                        <?php
                        $no = mysqli_query($db, "select * from notice,registration where notice.tecid=registration.rid order by notice.datetime1 DESC ");
                        if (mysqli_num_rows($no) > 0) {
                            while ($row = mysqli_fetch_assoc($no)) {
                                $date2 = new DateTime($row['datetime1']);
                                $formatdate2 = date_format($date2, 'd-M-Y');
                                $time = date_format($date2, "h:i a");
                                $by = $row['rname'];


                                ?>
                                <button class="accordion"><span style="float: left"><?php echo $row['title']; ?></span>
                                    <center><?php echo $formatdate2 . "    " . $time ?> <span style="float: right">Created By: <?php echo $by; ?></span>
                                    </center><!--Enter the php variable here which stores the notice title--></button>
                                <div class="panel">
                                    <p>
                                        <!--Enter the php variable here which stores the notice Description--><?php echo $row['description']; ?></p>


                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
    </section>

    <!-- [/Notice]
    =============================================================================================================================-->

    <!-- [SUBSCRIBE]
    =============================================================================================================================-->
    <section class="how-works" id="ask_queries">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="testimonial-area-heading">
                        <h2 class="grey" style="font-size: 40px;margin-top: 20px;"><u>MailBox</u></h2>
                    </div>
                </div>
            </div>
            <form id="ask_queries-form" enctype="multipart/form-data" method="POST" action="sendmail_student.php">
                <div class="gap"></div>
                <div class="row">
                    <!-- /ask_queries info -->
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <!-- ask_queries form -->

                        <div class="row form-group">

                            <div class="col-xs-6">


                                <select class="form-control" name="tname" id="teac">
                                    <option>Select Teacher</option>

                                    <?php
                                    $nk = mysqli_query($db, "select * from subject where subject.sdname='$d' and subject.ssem='$df' ");
                                    if (mysqli_num_rows($nk) > 0) {
                                        while ($r = mysqli_fetch_assoc($nk)) {
                                            $sss = $r['subname'];

                                            //echo $r['sdname'].;
                                            $quehh = "select * from checksub,registration  where subj_name LIKE '%$sss%' and registration.rid=checksub.teacher_id";
                                            $q = mysqli_query($db, $quehh);

                                            while ($row2 = mysqli_fetch_array($q)) {

                                                ?>
                                                <option
                                                    value="<?php echo $row2['remail']; ?>"><?php echo $row2['rname']; ?></option>

                                                <?php
                                            }
                                            ?>
                                            <?php
                                        }
                                    } ?>


                                </select>


                                <!-- <input type="email" name="tname" class="form-control" placeholder="Email">-->
                            </div>
                            <div class="col-xs-6 ">
                                <input type="file" name="my_file" class="form-control "/>

                            </div>

                            <!--<input type="email" name="email" placeholder="e-mail" id="ask_queries-email" class="form-control ">-->
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input name="subject" placeholder="Subject" id="ask_queries-message" class="form-control "
                                   required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <textarea name="message" rows="4" placeholder="Message" id="ask_queries-message"
                                      class="form-control "></textarea>
                        </div>
                    </div>
                    <?php
                    if (empty($_SESSION['email'])) {
                        ?>
                        <input type="submit" class="btn btn-style blue disabled" style="color: #000;float: right"
                               value="Set  mail first in your Profile"
                               name="submit">
                        <?php
                    } else {
                        ?>
                        <input type="submit" class="btn btn-style blue" style="color: #000;float: right" value="send"
                               name="submit">
                        <?php

                    }
                    ?>


            </form>
            <span class="form-message" style="display: none;"></span>

            <!-- /ask_queries form -->
        </div>
</div>
</div>

</section>
<!--  [CONTACT INFO ENDS ]-->
<!-- [/SUBSCRIBE]
=============================================================================================================================-->
<div></div>
<!-- [ /WRAPPER is closed here]
=============================================================================================================================-->
</div>
<!-- [ DEFAULT SCRIPT ] -->
<script src="../library/modernizr.custom.97074.js"></script>
<script src="../library/jquery-1.11.3.min.js"></script>
<script src="../library/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../js/jquery.easing.1.3.js"></script>
<script src="../library/vegas/vegas.min.js"></script>
<!-- [ PLUGIN SCRIPT ] -->

<script src="../js/plugins.js"></script>
<script src="../js/fappear.js"></script>
<script src="../js/jquery.countTo.js"></script>
<script src="../js/scrollreveal.js"></script>
<!-- [ COMMON SCRIPT ] -->
<script src="../js/common.js"></script>
<script>
    // Get the modal
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
<!--View Notice-->
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function () {
            this.classList.toggle("active");
            this.nextElementSibling.classList.toggle("show");
        }
    }
</script>
<script type="text/javascript">
    $(window).load(function () {
        setTimeout(function () {
            $('#myModal2').modal('show');
        }, 2000);
    });
</script>
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" style="color: #0b0b0b">Change Profile Picture</h4>
            </div>
            <div class="modal-body">
                <form action="student_pic.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="img" id="img" class="btn-primary"/><br>
                    <input type="submit" value="Upload" name="upl1" style="width: 100px;"
                           class="btn-primary btn-success"/>
                </form>
            </div>
        </div>
    </div>
</body>
</html>