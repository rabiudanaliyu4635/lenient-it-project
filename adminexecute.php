<?php 
   error_reporting(E_ALL ^ E_NOTICE); 
?>

<?php
    session_start();
    require("connect.php");
    
    if(isset($_POST['submit'])){
        if ($_POST['password'] != $_POST['cpassword']){
            $err = "Password not match, Try Again";
            header("location: admin.php?customerappointment_err=$err");
            exit();
        }
        else{
            $_SESSION['loginid'] = $_POST['loginid'];
            $_SESSION['password'] = $_POST['password'];
            $status = 1;
    
            $query = "select password from adminlogin where password='".$_SESSION['password']."'";
    
            $resl = mysqli_query($con, $query);
    
            $c = mysqli_num_rows($resl);
                if ($c == 1){
                    $err = 'email already exist in the database, please login';
                    header("location: admin.php?customerappointment.php=$err");
                    exit();
                }
                //inserting into the database
                $sql = "insert into customers(loginid,password)
                values('".$_POST['loginid']."','".$_POST['password']."')";
                    $result = mysqli_query($con, $sql);
                    if ($result){
                        header("location: admin.php");
                        exit();
                    }
        }
    }
    
?>

