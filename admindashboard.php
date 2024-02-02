<?php
include("admin.php");
include("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
        <small class="text-muted">Welcome to Admin Panel</small>
    </div>
    <div class="row">
        <div class="content">
            <div class="text">Total Customers</div>
            <div class="number">
                <?php
                    $sql = "SELECT * FROM customers";
                    $qsql = mysqli_query($con,$sql);
                      echo mysqli_num_rows($qsql);
                ?>
            </div>
            <div class="icon"><i class='bx bx-male-female'></i></div>
        </div>
    </div>
    <div class="row">
        <div class="content">
            <div class="text">Total Staff </div>
            <div class="number">
                <?php
                  $sql = "SELECT * FROM staff WHERE status='Active' ";
                   $qsql = mysqli_query($con,$sql);
                      echo mysqli_num_rows($qsql);
                ?>
            </div>
            <div class="icon"><i class='bx bxs-user-circle'></i></div>
        </div>
    </div>
    <div class="row">
        <div class="content">
            <div class="text">Total Administrator</div>
            <div class="number">
               <?php
                   $sql = "SELECT * FROM adminlogin";
                   $qsql = mysqli_query($con,$sql);
                    echo mysqli_num_rows($qsql);
                ?>
            </div>
            <div class="icon"><i class='bx bxs-user-account'></i></div>
        </div>
    </div>

    <div class="clear"></div>
</div>
</div>