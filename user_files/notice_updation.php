<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <script src="../js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../js/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="../library/font-awesome-4.3.0/css/font-awesome.min.css">

    <!-- [ PLUGIN STYLESHEET ]
        =========================================================================================================================-->
    <link rel="shortcut icon" type="image/x-icon" href="../images/logo.jpg">
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
</head>
<body>
<a style="position: relative;top: 20px;left: 10px;" href="Teacher.php" class="btn-lg btn-info">Go Back</a>

<?php
require "database.php";
session_start();
if (!empty($_GET)) {
if (array_key_exists('i', $_GET)) {
    $id = $_GET['i'];
    $query = mysqli_query($db, "select * from notice where nid='$id'");

    $row = mysqli_fetch_assoc($query);
    ?>

    <form method="post" action="">
        <div class="container col-lg-6 col-md-4 col-sm-3 col-xs-2"
             style="margin-left: 300px;width: 800px;height: 300px;"><br><br><br><br>
            <span>Topic</span> <input type="text" name="ttitle" class="form-control"
                                      value="<?php echo $row['title']; ?>"><br>
            <span>Dscription</span><textarea name="ta"
                                             class="form-control"><?php echo $row['description']; ?></textarea><br>
            <button type="submit" value="update" class="btn-sm btn-info" style="float: right" name="up">Update</button>
        </div>
    </form>

<?php


}
if (isset($_POST['up'])){
$title = $_POST['ttitle'];
$desc = $_POST['ta'];
if ($title) {
    $updq = mysqli_query($db, "update notice set title='$title' where nid='$id'");
}
if ($desc) {
    $updq = mysqli_query($db, "update notice set description='$desc' where nid='$id'");
}
if ($updq){


?>
    <script>
        swal({
                title: "Updation Successful :)",
                text: " Successful :)",
                type: "success"
            },
            function () {
                window.location.href = 'Teacher.php';

            });
    </script>
<?php
}
else
{

?>
    <script>
        swal({
                title: "Failed :(",
                text: "Something Went wrong",
                type: "error"
            },
            function () {
                window.location.href = 'Teacher.php';

            });
    </script>
    <?php
}

}
}


?>
</body>
</html>
