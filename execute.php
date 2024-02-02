<?php 
    error_reporting(E_ALL ^ E_NOTICE); 
?>
<?php
include("connect.php");
session_start();
if(isset($_POST['submit']))
{
    $name=$_POST['customername']; $address=$_POST['address']; $dob=$_POST['dob']; $contactnumber=$_POST['contactnumber']; $lga=$_POST['lga'];
    $state=$_POST['state']; $gender=$_POST['gender']; $email=$_POST['email']; $appdate=$_POST['appdate']; $apptime=$_POST['apptime'];
    $category=$_POST['category']; $loginid=$_POST['loginid']; $password=$_POST['password']; $cpassword=$_POST['cpassword'];

    if ($password != $cpassword){
        $err = "Password not match, Try Again";
        header("location: customerappointment.php?customerappointment_err=$err");
        exit();
    }
    else{
    
        $query2 = "select email from customers where email='".$_SESSION['email']."'";

        $result2 = mysqli_query($con, $query2);

        $c = mysqli_num_rows($result2);
            if ($c == 1){
                $err = 'email already exist in the database, please login';
                header("location: customerdashboard.php?customerappointment.php=$err");
                exit();
            }
    //inserting data to database
    $sql="insert into customers (customername,address,dob,contactnumber,lga,state,gender,email,appdate,apptime,category,loginid,password,cpassword) values('$name','$address','$dob','$contactnumber','$lga','$state','$gender','$email','$appdate','$apptime','$category','$loginid','$password','$cpassword')";

    $result = mysqli_query($con,$sql);
    if($result){
        header("location: customerlogin.php");
        exit();
    } else{
        die(mysqli_error($con));
    }
    
    }
    $query="SELECT * FROM appointment WHERE appdate='$_POST[appdate]' AND apptime='$_POST[apptime]' AND staffid='$_POST[staff]' AND status='Approved'";
	$queryapp = mysqli_query($con,$query);
    $reres=mysqli_num_rows($queryapp);
	if($reres == 1)
	{
		echo "<script>alert('Appointment already scheduled for this time..');</script>";
	}
	else
	{
		$cusid=$_SESSION['customerid']; $pen='Pending';
        $sqlapp = "insert into appointment (customerid,category,appdate,apptime,status) values('$cusid', '$category', '$appdate', '$apptime', '$pen')";
		if($qsqlapp = mysqli_query($con,$sqlapp))
		{
			echo "<script>alert('Appointment record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}

if(isset($_SESSION['customerid']))
{
    $sqlcustomer = "SELECT * FROM customers WHERE customerid='$_SESSION[customerid]' ";
    $qsqlcustomer = mysqli_query($con,$sqlcustomer);
    $rscustomer = mysqli_fetch_array($qsqlcustomer);
}

?>
