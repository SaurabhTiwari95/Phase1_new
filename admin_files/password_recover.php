<?php
require "database.php";
session_start();
@$aid = $_SESSION['aid'];
if (empty($aid)) {
    ?>
    <script>
        window.location = "admin_login.php";
    </script>
    <?php
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Deplyser | Password panel</title>
    <link href="js/jquery.multiselect.css" rel="stylesheet" type="text/css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.multiselect.js"></script>
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
    <!-- Tell the browser to be responsive to screen width -->

    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="../library/vegas/vegas.min.css">
    <!-- [ Boot STYLESHEET ]
  <!-- Tell the browser to be responsive to screen width -->
    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<style>

    #ana:hover, #cp:hover, #da:hover {

        font-weight: 600;
    }

    #aname:hover {

        font-weight: 800;
    }
</style>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="admin_index.php" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>D</b><b>L</b>r</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>Deplyser</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>

            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                    <?php


                    $q = mysqli_query($db, "select * from admin where aid='$aid'");
                    $row = mysqli_fetch_assoc($q);

                    ?>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                           title="Click to explore more options">
                            <img src="<?= $row['apic'] ?>" class="user-image" alt="User Image" height="25px">
                            <span class="hidden-xs"><?php echo ucwords($row['aname']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?php echo $row['apic']; ?>" class="img-circle" alt="User Image">

                                <p>
                                    <a id="aname" style="color: white" href="#" data-toggle="modal"
                                       data-target="#infomodal"
                                       title="Click to get Info"><?php echo ucwords($row['aname']); ?></a><br>//
                                    Deplyser Admin //
                                    <small></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="admin_signup.php" id="ana">Add New Admin</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="password_setting_admin.php" id="cp">Change Password</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="admin_del.php" id="da">Delete Account</a>
                                    </div>
                                    <!-- <div class="col-xs-4 text-center">
                                       <a href="#"></a>
                                     </div>-->
                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <button type="button" class="btn btn-default" data-toggle="modal"
                                            data-target="#myModal">Change Pic
                                    </button>
                                </div>
                                <div class="pull-right">
                                    <a href="admin_logout.php" class="btn btn-default btn-flat">Sign Out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->

                </ul>
            </div>
        </nav>
    </header>

    <div class=" modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Change Profile Pic</h4>
                </div>
                <div class="modal-body">
                    <form action="admin_pic.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="img" id="img"/><br>
                        <input type="submit" value="Upload" name="upl"/>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <div class=" modal fade" id="infomodal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h3 class="modal-title">Admin Info<img src="../images/demologo.png" class="img-rounded pull-right"
                                                           style="position: relative;top: -20px;" height="100"></h3>
                </div>
                <div class="modal-body bg-light-blue-gradient">
                    <center>
                        <img src="<?= $row['apic']; ?>" class="img-circle" alt="User Image" height="150">

                        <p style="font-size: larger"><b>Name:</b>
                            <span><?php echo "&nbsp" . ucwords($row['aname']); ?></span></p>

                        <p style="font-size: larger"><b>Branch:</b>
                            <span><?php echo "&nbsp" . ucwords($row['abranch']); ?></span></p>

                        <p style="font-size: larger"><b>Admin id(Faculty Id):</b>
                            <span><?php echo "&nbsp" . $row['aid']; ?></span></p>
                    </center>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user_files panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo $row['apic'] ?>" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p><?php echo $row['aname']; ?></p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>


                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-table"></i> <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="students.php"><i class="fa fa-circle-o"></i> Student</a></li>
                        <li><a href="teachers_data.php"><i class="fa fa-circle-o"></i> Teacher</a></li>
                    </ul>
                </li>

                <li class="treeview ">
                    <a href="subject_addition.php">
                        <i class="fa fa-edit "></i> <span>Add or Remove Subjects</span>

                    </a>

                </li>
                <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-laptop"></i> <span>Managing Section</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

                        <li class="active"><a href="#"><i class="fa fa-circle-o"></i> Password Setting</a></li>
                        <li><a href="subject_division.php"><i class="fa fa-circle-o"></i> Subjects Allotment Portal</a>
                        </li>
                        <li><a href="teachers_alotted_subjects.php"><i class="fa fa-circle-o"></i> Teachers Alotted
                                Subjects List</a></li>
                    </ul>
                </li>
            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Password Panel
                <small>Password Recovery</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="admin_index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Settings</a></li>
                <li class="active">Password Setting</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="post" action="">

                <!-- SELECT2 EXAMPLE -->
                <div class="box box-default">
                    <div class="box-header with-border">
                        <label>Password Change </label><br>
                        <small>To change password,Enter ID and click the verify button to verify the correct user
                            ,then enter the password in password field to change it
                        </small>

                    </div>
                    <!-- /.box-header -->


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-10">

                                <div class="form-group">
                                    <label>Enter Id</label>
                                    <input type="text" class="form-control" placeholder="Enter ID" name="uid" required>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <center><input type="submit" class="btn btn-lg btn-bitbucket" value="VERIFY"
                                                   name="verify"></center>
                                </div>
                            </div>
                        </div>
                    </div>
            </form>


            <div class="box-body">
                <div class="row">
                    <div class="col-md-10">

                        <div class="form-group">
                            <label>Check Name and Branch </label>
                            <?php


                            if (isset($_POST['verify'])) {
                                $uid = $_POST['uid'];
                                $q = mysqli_query($db, "select rname,rdepartment from registration where rid='$uid'");
                                if (mysqli_num_rows($q) == 1) {
                                    $row = mysqli_fetch_assoc($q);
                                    $name = $row['rname'];
                                    $br = $row['rdepartment'];
                                    $_SESSION['name'] = $name;
                                    ?>
                                    <input type="text" class="form-control"
                                           value="<?php echo "Name:  " . $name . " and Branch:  " . ucwords($br); ?>"
                                           readonly>
                                    <form method="post" action="">
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-10">

                                                    <div class="form-group">
                                                        <label>Enter Password to Change</label>
                                                        <input type="text" class="form-control"
                                                               placeholder="Enter Password" name="pass" required>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <center><input type="submit" class="btn btn-sm btn-bitbucket"
                                                                       value="Change" name="change"></center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php

                                } else {
                                    ?>
                                    <input type="text" class="form-control" value="No User Found In Database" readonly>
                                    <?php
                                }
                            } ?>


                        </div>
                    </div>
                </div>
            </div>

            <?php
            if (isset($_POST['change'])) {
                $r = $_SESSION['name'];
                $pass = $_POST['pass'];
                $updd = mysqli_query($db, "update registration set rpass='$pass'where rname='$r'");
                if ($updd) {
                    ?>

                    <script>

                        swal({
                                title: " Successful !",
                                text: 'Password changed ',

                                type: "success"
                            },
                            function () {
                                window.location.href = 'password_recover.php';

                            });

                    </script>
                <?php

                }
                else
                {
                ?>
                    <script>

                        swal({
                                title: " Failed !",
                                text: 'User not found in database ',

                                type: "error"
                            },
                            function () {
                                window.location.href = 'password_recover.php';

                            });

                    </script>
                    <?php
                }

            }
            ?>


        </section>
    </div>

</div>


<!-- /.box -->


<!-- checkbox -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Deplyser</a>.</strong> All rights
    reserved.
</footer>


<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- Sparkline -->

<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<!-- Page script -->

</body>
</html>







