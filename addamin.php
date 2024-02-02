<?php
include("admin.php");
include("connect.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE adminlogin SET aname='$_POST[name]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[select]' WHERE id='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			Admin Record updated successfully
			</div>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO adminlogin(name,loginid,password,status) values('$_POST[name]','$_POST[loginid]','$_POST[password]','$_POST[select]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			Admin Record Inserted successfully
			</div>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM adminlogin WHERE id='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  	<script src="../../ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="../../maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <title>LCT - Admin</title>
</head>
<body>
    
</body>
</html>
<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center-2"> Add New Admin </h2>
	</div>
		<form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">
			<div class="user-details">   
								<div class="user-input">
									<label> Admin Name</label>
									<div class="input-box">
										<input type="text" class="form-control"  name="adminname" id="adminname" value="<?php echo $rsedit['name']; ?>"/>
									</div>
								</div>                         
								<div class="user-input">
									<label>Admin Log in Id</label>
									<div class="input-box">
										<input type="text" class="form-control" name="loginid" id="loginid" value="<?php echo $rsedit['loginid']; ?>" />
									</div>
								</div>                                 
								<div class="user-input">
									<label> Admin Password</label>
									<div class="input-box">
										<input type="password" class="form-control"  name="password" id="password" value="<?php echo $rsedit['password']; ?>"/>
									</div>
								</div>                              
								<div class="user-input">
									<label>Confirm Admin Password</label>
									<div class="input-box">
										<input type="password" class="form-control"  name="cnfirmpassword" id="cnfirmpassword" value="<?php echo $rsedit['confirmpassword']; ?>"/>
									</div>
								</div>
								<div class="input-box">
									<label>Status</label>

									<select class="details" name="select">
										<option value="" selected>Select One</option>
										<?php
										$arr = array("Active","Inactive");
										foreach($arr as $val)
										{
											if($val == $rsedit[status])
											{
												echo "<option value='$val' selected>$val</option>";
											}
											else
											{
												echo "<option value='$val'>$val</option>";			  
											}
										}
										?>
									</select>
								</div>
						<div class="button">
							<input type="submit" name="submit" value="Submit" />

						</div>
					</div>
				</form>
	</div>

				<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmadmin.adminname.value == "")
	{
		alert("Admin name should not be empty..");
		document.frmadmin.adminname.focus();
		return false;
	}
	else if(!document.frmadmin.adminname.value.match(alphaspaceExp))
	{
		alert("Admin name not valid..");
		document.frmadmin.adminname.focus();
		return false;
	}
	else if(document.frmadmin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmadmin.loginid.focus();
		return false;
	}
	else if(!document.frmadmin.loginid.value.match(alphanumericExp))
	{
		alert("Login ID not valid..");
		document.frmadmin.loginid.focus();
		return false;
	}
	else if(document.frmadmin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.password.value != document.frmadmin.cnfirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmadmin.password.focus();
		return false;
	}
	else if(document.frmadmin.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmadmin.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>