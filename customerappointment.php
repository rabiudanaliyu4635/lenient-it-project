<?php 
include("header.php"); 
error_reporting(E_ALL ^ E_NOTICE);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenient Computer Technology</title>
    <link rel="stylesheet" href="_forms.css">
</head>
<body>
<?php
include("connect.php");
if(isset($_POST['submit']))
{
	if(isset($_SESSION['customerid']))
	{
		$lastinsid =$_SESSION['customerid'];
	}
	else
	{
		$dt = date("Y-m-d");
		$tim = date("H:i:s");
		$sql ="INSERT INTO customers(customername,address,dob,contactnumber,lga,state,gender,email,appdate,apptime,category,loginid,password,cpassword,status) values('$_POST[customername]','$_POST[address]','$_POST[dob]','$_POST[contactnumber]','$_POST[lga]','$_POST[state]','$_POST[gender]','$_POST[email]','$dt','$tim','$_POST[category]','$_POST[loginid]','$_POST[password]','$_POST[cpassword]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
			/* echo "<script>alert('customer record inserted successfully...');</script>"; */
		}
		else
		{
			echo mysqli_error($con);
		}
		$lastinsid = mysqli_insert_id($con);
	}
	
    $_SESSION['appdate']=$_POST['appdate'];
    $_SESSION['apptime']=$_POST['apptime'];
    $_SESSION['staff']=$_POST['staff'];
	$sqlappointment="SELECT * FROM appointment WHERE appdate='".$_SESSION['appdate']."' AND apptime='".$_SESSION['apptime']."' AND staffid='".$_SESSION['staff']."' AND status='Approved'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	if(mysqli_num_rows($qsqlappointment) >= 1)
	{
		echo "<script>alert('Appointment already scheduled for this time..');</script>";
	}
	else
	{
		$sql ="INSERT INTO appointment(appointmenttype,customerid,appdate,apptime,app_reason,status,categoryid,staffid) values('ONLINE','$lastinsid','$_POST[appdate]','$_POST[apptime]','$_POST[app_reason]','Pending','$_POST[category]','$_POST[staff]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Appointment record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
if(isset($_SESSION['customerid']))
{
    $sqlcustomer = "SELECT * FROM customers WHERE customerid='$_SESSION[customerid]' ";
    $qsqlcustomer = mysqli_query($con,$sqlcustomer);
    $rscustomer = mysqli_fetch_array($qsqlcustomer);
    $readonly = " readonly";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="wrapper col4">
    <div id="container">

        <?php
        if(isset($_POST['submit']))
        {
           if(mysqli_num_rows($qsqlappointment) >= 1)
           {		
             echo "<h2>Appointment already scheduled for ". date("d-M-Y", strtotime($_POST['appdate'])) . " " . date("H:i A", strtotime($_POST['apptime'])) . " .. </h2>";
         }
         else
         {
          if(isset($_SESSION['customerid']))
          {
             echo "<h2 class='text-center'>Appointment taken successfully.. </h2>";
             echo "<p class='text-center'>Appointment record is in pending process. Kinldy check the appointment status. </p>";
             echo "<p class='text-center'> <a href='viewappointment.php'>View Appointment record</a>. </p>";			
         }
         else
         {
             echo "<h2 class='text-center'>Appointment taken successfully.. </h2>";
             echo "<p class='text-center'>Appointment record is in pending process. Please wait for confirmation message.. </p>";
             echo "<p class='text-center'> <a href='customerlogin.php'>Click here to Login</a>. </p>";	
         }
     }
 }
 else
 {
    ?>
<div class="section">
<div class="container">
    <div class="title">Schedule Appointment</div>
    <form action="" method="post" onSubmit="return validateform()">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" name="customername" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <span class="details">Address</span>
                <input type="text" name="address" placeholder="Enter your full address" required>
            </div>
            <div class="input-box">
                <span class="details">Date of Birth</span>
                <input type="text" name="dob" placeholder="Date of Birth" id="dob" onfocus="(this.type='date')" required>
            </div>
            <div class="input-box">
                <span class="details">Contact Number</span>
                <input type="text" name="contactnumber" placeholder="Enter your contact number" required>
            </div>
            <div class="input-box">
                <span class="details">LGA</span>
                <input type="text" name="lga" placeholder="Enter your L.G.A" required>
            </div>
            <div class="input-box">
                <span class="details">State</span>
                <input type="text" name="state" placeholder="Enter your State" required>
            </div>
        </div>
        <div class="gender-details">
            <span class="gender-title">Gender</span>
            <input type="radio" name="gender" id="dot-1">
            <input type="radio" name="gender" id="dot-2">
            <input type="radio" name="gender" id="dot-3">
            <div class="category">
                <label for="dot-1">
                    <span class="dot one"></span>
                    <span class="gender">Male</span>
                </label>
                <label for="dot-2">
                    <span class="dot two"></span>
                    <span class="gender">Female</span>
                </label>
                <label for="dot-3">
                    <span class="dot three"></span>
                    <span class="gender">Other</span>
                </label>
            </div>
        </div>
        <div class="user-details">
            <div class="input-box">
                <span class="details">Email Address</span>
                <input type="text" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="input-box">
                <span class="details">Appointment Date</span>
                <input type="text" name="appdate" placeholder="Appointment Date" id="appdate" onfocus="(this.type='date')" required>
            </div>
            <div class="input-box">
                <span class="details">Appointment Time</span>
                <input type="text" name="apptime" placeholder="Appointment Time" id="dob" onfocus="(this.type='time')" required>
            </div>
            <div class="input-box">
                <span class="details">Category</span>
                <input list="category" name="category" placeholder="Select your category" required>
                    <datalist id="category">
                        <option value="Jamb Registration"></option>
                        <option value="NIN Registration"></option>
                        <option value="BVN Registration"></option>
                    </datalist>
            </div>
            <div class="input-box">
                <span class="details">Staff</span>
                <input list="staff" name="staff" placeholder="Select your staff" required>
                    <datalist id="staff">
                        <option value="Abdulrazaq Abubakar"></option>
                        <option value="Rabiu Aliyu"></option>
                        <option value="Muhammad Bakari Ma'aji"></option>
                    </datalist>
            </div>
            <div class="input-box">
                <span class="details">Login ID</span>
                <input type="text" name="loginid" placeholder="Create your login id" required>
            </div>
            <div class="input-box">
                <span class="details">Password</span>
                <input type="password" name="password" placeholder="Create your password" required>
            </div>
            <div class="input-box">
                <span class="details">Confirm Password</span>
                <input type="password" name="cpassword" placeholder="Confirm your password" required>
            </div>
        </div> 
        <div class="button">
            <input type="submit" name="submit" value="Register">
        </div>
        <p>Already have an account? <a href="customerlogin.php">Login here</a></p>   
    </form>
</div>
</div>


<?php
}
?>


<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmpatapp.customer.value == "") {
        alert("Customer name should not be empty..");
        document.frmpatapp.customer.focus();
        return false;
    } else if (!document.frmpatapp.customer.value.match(alphaspaceExp)) {
        alert("Customer name not valid..");
        document.frmpatapp.customer.focus();
        return false;
    } else if (document.frmpatapp.textarea.value == "") {
        alert("Address should not be empty..");
        document.frmpatapp.textarea.focus();
        return false;
    } else if (document.frmpatapp.city.value == "") {
        alert("City should not be empty..");
        document.frmpatapp.city.focus();
        return false;
    } else if (!document.frmpatapp.city.value.match(alphaspaceExp)) {
        alert("City name not valid..");
        document.frmpatapp.city.focus();
        return false;
    } else if (document.frmpatapp.mobileno.value == "") {
        alert("Mobile number should not be empty..");
        document.frmpatapp.mobileno.focus();
        return false;
    } else if (!document.frmpatapp.mobileno.value.match(numericExpression)) {
        alert("Mobile number not valid..");
        document.frmpatapp.mobileno.focus();
        return false;
    } else if (document.frmpatapp.loginid.value == "") {
        alert("login ID should not be empty..");
        document.frmpatapp.loginid.focus();
        return false;
    } else if (!document.frmpatapp.loginid.value.match(alphanumericExp)) {
        alert("login ID not valid..");
        document.frmpatapp.loginid.focus();
        return false;
    } else if (document.frmpatapp.password.value == "") {
        alert("Password should not be empty..");
        document.frmpatapp.password.focus();
        return false;
    } else if (document.frmpatapp.password.value.length < 8) {
        alert("Password length should be more than 8 characters...");
        document.frmpatapp.password.focus();
        return false;
    } else if (document.frmpatapp.select6.value == "") {
        alert("Gender should not be empty..");
        document.frmpatapp.select6.focus();
        return false;
    } else if (document.frmpatapp.dob.value == "") {
        alert("Date Of Birth should not be empty..");
        document.frmpatapp.dob.focus();
        return false;
    } else if (document.frmpatapp.appointmentdate.value == "") {
        alert("Appointment date should not be empty..");
        document.frmpatapp.appointmentdate.focus();
        return false;
    } else if (document.frmpatapp.appointmenttime.value == "") {
        alert("Appointment time should not be empty..");
        document.frmpatapp.appointmenttime.focus();
        return false;
    } else {
        return true;
    }
}

</script>

</body>
</html>

<?php
include("footer.php");
?>
