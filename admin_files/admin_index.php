<?php
session_start();
require_once "database.php";
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
    <title>Admin | Dashboard</title>

    <link rel="shortcut icon" type="image/x-icon" href="../images/onlyD.png">
    <link rel="stylesheet" type="text/css" href="../css/animate.css">
    <link rel="stylesheet" type="text/css" href="../css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="../library/vegas/vegas.min.css">
    <!-- [ Boot STYLESHEET ]
  <!-- Tell the browser to be responsive to screen width -->

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- jvectormap -->

    <!-- Theme style -->
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
    #aname:hover {

        font-weight: 800;
    }

    #ana:hover, #cp:hover, #da:hover {

        font-weight: 600;
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
            <!-- Navbar Right Menu -->
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
                            <img src="<?= $row['apic']; ?>" class="img-circle" alt="User Image" height="25px;">
                            <span class="hidden-xs"><?php echo ucwords($row['aname']); ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="<?= $row['apic']; ?>" class="img-circle" alt="User Image">

                                <p>
                                    <a id="aname" style="color: white" href="#" data-toggle="modal"
                                       data-target="#infomodal"
                                       title="Click to get Info"><?php echo ucwords($row['aname']); ?></a> <br>//
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
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?= $row['apic']; ?>" class="img-circle" alt="User Image">
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
            <!-- <ul class="sidebar-menu">
                 <ul class="treeview-menu">
                   <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                   <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                   <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                 </ul></ul>-->

            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="treeview">

                </li>
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
                <li class="treeview">
                    <a href="subject_addition.php">
                        <i class="fa fa-edit "></i> <span>Add or Remove Subjects</span>

                    </a>

                </li>
                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-laptop"></i> <span>Managing Section</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                    </a>
                    <ul class="treeview-menu">

                        <li><a href="password_recover.php"><i class="fa fa-circle-o"></i> Password Setting</a></li>
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
                Dashboard
                <small>Version 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="admin_index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a></a>Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.col -->

            <!-- /.col -->

            <!-- fix for small devices only -->

            <!-- /.col -->

            <!-- /.row -->


            <!-- /.box-header -->


            <!-- /.col -->

            <!-- /.col -->

            <!-- /.row -->

            <!-- Main row -->

            <!-- /.col -->
            <div class="row>"
            <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <?php
                        $ee = mysqli_query($db, "select * from registration order by rand() LIMIT 20 ");
                        $c = (mysqli_num_rows($ee));
                        ?>
                        <h3 class="box-title"> Latest Members</h3>

                        <div class="box-tools pull-right">
                            <span class="label label-danger"><?php echo $c; ?> New Members</span>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            <?php

                            $i = 0;
                            while (($row9 = mysqli_fetch_assoc($ee))) {


                                ?>
                                <li>


                                    <img src="../user_files/<?php echo $row9['rpropic']; ?>" class="img-circle"
                                         style="height: 40px;width: 35px;"><?php
                                    echo "<a  class='users-list-name' href='stu_info.php?i=" . $row9['rid'] . "' title='Click to know more'>";
                                    echo $row9['rname'] . "</a>"; ?>


                                    <span class="users-list-name"><?php echo ucfirst($row9['rdesignation']); ?></span>
                                </li>
                                <?php


                            }


                            ?>


                            <!------------------------------------------------------------------------ ->
                                               <!-- <li>
                                                  <img src="dist/img/user8-128x128.jpg" alt="User Image">
                                                  <a class="users-list-name" href="#">Norman</a>
                                                  <span class="users-list-date">Yesterday</span>
                                                </li>
                                                <li>
                                                  <img src="dist/img/user7-128x128.jpg" alt="User Image">
                                                  <a class="users-list-name" href="#">Jane</a>
                                                  <span class="users-list-date">12 Jan</span>
                                                </li>
                                                <li>
                                                  <img src="dist/img/user6-128x128.jpg" alt="User Image">
                                                  <a class="users-list-name" href="#">John</a>
                                                  <span class="users-list-date">12 Jan</span>
                                                </li>
                                                <li>
                                                  <img src="dist/img/user2-160x160.jpg" alt="User Image">
                                                  <a class="users-list-name" href="#">Alexander</a>
                                                  <span class="users-list-date">13 Jan</span>
                                                </li>
                                                <li>
                                                  <img src="dist/img/user5-128x128.jpg" alt="User Image">
                                                  <a class="users-list-name" href="#">Sarah</a>
                                                  <span class="users-list-date">14 Jan</span>
                                                </li>
                                                <li>
                                                  <img src="dist/img/user4-128x128.jpg" alt="User Image">
                                                  <a class="users-list-name" href="#">Nora</a>
                                                  <span class="users-list-date">15 Jan</span>
                                                </li>
                                                <li>
                                                  <img src="dist/img/user3-128x128.jpg" alt="User Image">
                                                  <a class="users-list-name" href="#">Nadia</a>
                                                  <span class="users-list-date">15 Jan</span>
                                                </li>-->
                        </ul>


                    </div>
                </div>
                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->

            <!-- /.box-footer -->
    </div>
    <!--/.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->

</div>
<!-- /.col -->
<!-- /.col -->
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.6
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="#">Deplyser</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->

<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->

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

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script>
    $(document).on('ready', function () {
        $("#input-4").fileinput({showCaption: false});
    });
</script>
</body>
</html>
