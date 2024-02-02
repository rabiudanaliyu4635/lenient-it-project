<?php include("header.php"); ?>
<?php 
    error_reporting(E_ALL ^ E_NOTICE); 
?>
<?php
    // Initialize the session
    session_start();
    include('connect.php');
?>
<?php 
    
    $err='';
    if(isset($_POST['submit']))
    {
        $_SESSION['loginid']=$_POST['loginid'];
        $_SESSION['password']=$_POST['password'];
        $sql = "SELECT * FROM customers WHERE loginid='".$_SESSION['loginid']."' AND password='".$_SESSION['password']."'";
        $qsql = mysqli_query($con,$sql);
        if(mysqli_num_rows($qsql) >= 1)
        {
            $rslogin = mysqli_fetch_array($qsql);
            $_SESSION['id']= $rslogin['id'] ;
            echo "<script>window.location='customerdashboard.php';</script>";
        }
        else
        {
            $err = "<h4 class='alert alert-danger'>
            <strong>Oh !</strong> Change a few things up and try submitting again.
        </h4>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Lenient Computer Technology</title>
        <link rel="stylesheet" href="login.css">
    </head>
<body>
<div class="section">
<div class="container">
    <div class="title">Customer Login</div>
    <form method="post" onSubmit="return validateform()">
        <p><?php echo $err; ?></p>
        <div class="user-details">
            <div class="input-box">
                <span class="details">User Login ID</span>
                <input type="text" name="loginid" placeholder="Enter your login id" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Enter your password" required>
            </div>
        </div> 
        <div class="button">
            <input type="submit" name="submit" value="Login">
        </div>   
    </form>
</div>
</div>
        
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
    if(document.frmpatlogin.loginid.value == "")
    {
        alert("Username should not be empty..");
        document.frmpatlogin.loginid.focus();
        return false;
    }
    else if(document.frmpatlogin.password.value == "")
    {
        alert("Password should not be empty..");
        document.frmpatlogin.password.focus();
        return false;
    }
    else if(document.frmpatlogin.password.value.length < 8)
    {
        alert("Password length should be more than 8 characters...");
        document.frmpatlogin.password.focus();
        return false;
    }
}
</script>
    </body>
</html>
<?php
include("footer.php");
?>