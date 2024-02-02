<?php

include("admin.php");
include("connect.php");
session_start();
if(isset($_POST['submit']))
{
	if(isset($_SESSION['id']))
	{
		$sql ="UPDATE adminlogin SET name='$_POST[name]',loginid='$_POST[loginid]',status='$_POST[select]' WHERE id='$_SESSION[adminid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			admin record updated successfully
			</div>";
			
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO adminlogin(name,loginid,status) values('$_POST[name]','$_POST[loginid]','$_POST[select]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			Administrator record inserted successfully
			</div>";

		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_SESSION['id']))
{
	$sql="SELECT * FROM adminlogin WHERE id='$_SESSION[id]' ";
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
    <link rel="stylesheet" href="admincss.css">
    <title>LCT - Admin</title>
</head>
<body>
<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center-2"> Change Admin Profile</h2>
    </div>
    <form method="post" action="" name="frmadminprofile" onSubmit="return validateform()">
        <div class="user-details">
            <div class="user-input">
                <div class="input-box">
                    <input type="text" class="form-control" name="name" id="name"
                            value="<?php echo $rsedit['name']; ?>" />
                </div>
            </div>
            <div class="user-input">
                <div class="input-box">
                        <input type="text" class="form-control" name="loginid" id="loginid"
                                value="<?php echo $rsedit['loginid']; ?>" />
                </div>
            </div>
            <div class="input-box">
                <select class="details">
                    <option value="" selected>-- Status --</option>
                        <?php
							$arr = array("Active","Inactive");
							foreach($arr as $val)
							{
								if($val == $rsedit['status'])
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
                 <input type="submit" name="submit" value="Submit">
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

function validateform() {
    if (document.frmadminprofile.adminname.value == "") {
        alert("Admin name should not be empty..");
        document.frmadminprofile.adminname.focus();
        return false;
    } else if (!document.frmadminprofile.adminname.value.match(alphaspaceExp)) {
        alert("Admin name not valid..");
        document.frmadminprofile.adminname.focus();
        return false;
    } else if (document.frmadminprofile.loginid.value == "") {
        alert("Login ID should not be empty..");
        document.frmadminprofile.loginid.focus();
        return false;
    } else if (!document.frmadminprofile.loginid.value.match(alphanumericExp)) {
        alert("Login ID not valid..");
        document.frmadminprofile.loginid.focus();
        return false;
    } else if (document.frmadminprofile.select.value == "") {
        alert("Kindly select the status..");
        document.frmadminprofile.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>
</body>
</html>

