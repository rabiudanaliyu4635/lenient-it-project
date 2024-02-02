<?php

include("admin.php");
include("connect.php");
session_start();
if(isset($_POST['submit']))
{
	$sql = "UPDATE adminlogin SET password='$_POST[newpassword]' WHERE password='$_POST[oldpassword]' AND id='$_SESSION[id]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<div class='alert alert-success'>
		 Password updated successfully
	</div>";
	}
	else
	{
		echo "<div class='alert alert-warning'>
		 admin record update Failed
	</div>";		
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css">
    <title>LCT - Admin</title>
</head>
<body>
    
</body>
</html>
<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center-2"> Admin's Password</h2>
    </div>
<form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">
		<div class="user-details">  
					<div class="user-input">
						<div class="input-box">
							<input class="form-control" type="password" name="oldpassword" id="oldpassword" placeholder="Old Password" />
						</div>
					</div>                           
				 <div class="user-input">
						<div class="input-box">
							<input class="form-control" type="password" name="newpassword" id="newpassword" placeholder="New Password" />
						</div>
				</div>                                 
				 <div class="user-input">
						<div class="input-box">
							<input class="form-control" type="password" name="password" id="password" placeholder="Confirm Password" />
						</div>
				</div>                 
			<div class="button">
				<input type="submit" name="submit" value="Submit" />
				
			</div>
</form>
 <div class="clear"></div>
  </div>
</div>

<script type="application/javascript">
function validateform1()
{
	if(document.frmadminchange.oldpassword.value == "")
	{
		alert("Old password should not be empty..");
		document.frmadminchange.oldpassword.focus();
		return false;
	}
	else if(document.frmadminchange.newpassword.value == "")
	{
		alert("New Password should not be empty..");
		document.frmadminchange.newpassword.focus();
		return false;
	}
	else if(document.frmadminchange.newpassword.value.length < 8)
	{
		alert("New Password length should be more than 8 characters...");
		document.frmadminchange.newpassword.focus();
		return false;
	}
	else if(document.frmadminchange.newpassword.value != document.frmadminchange.password.value )
	{
		alert(" New Password and confirm password should be equal..");
		document.frmadminchange.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
