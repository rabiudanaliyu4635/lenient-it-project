<?php
include("customeraccount.php");


include("connect.php");
if(isset($_POST['submit']))
{
	$sql = "UPDATE customer SET password='$_POST[newpassword]' WHERE password='$_POST[oldpassword]' AND customerid='$_SESSION[customerid]'";
	$qsql= mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<div class='alert alert-success'>
                            Password has been updated successfully
                        </div>
                        <script>alert('..');</script>";
	}
	else
	{
		echo "<div class='alert alert-danger'>
                            Update Failed
                        </div>
                       ";		
	}
}
?>

<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center-2"> Customer's Password</h2>
    </div>
               <form method="post" action="" name="frmpatchange" onSubmit="return validateform()"
                    style="padding: 10px">
                    <div class="user-input"><label>Old Password</label>
                        <div class="input-box">
                            <input class="form-control" type="password" name="oldpassword" id="oldpassword" />
                        </div>
                    </div>
                    <div class="user-input"><label>New Password</label>
                        <div class="input-box">
                            <input class="form-control" type="password" name="newpassword" id="newpassword" />
                        </div>
                    </div>
                    <div class="user-input"><label>Confirm Password</label>
                        <div class="input-box">
                            <input class="form-control" type="password" name="password" id="password" />
                        </div>
                    </div>
                    <div class="button">
                    <input type="submit" name="submit" id="submit" value="Submit" />
                    </div>
                </form>
                <p>&nbsp;</p>
</div>
    <div class="clear"></div>


<?php
include("adfooter.php");
?>
<script type="application/javascript">
function validateform()
{
	if(document.frmpatchange.oldpassword.value == "")
	{
		alert("Old password should not be empty..");
		document.frmpatchange.oldpassword.focus();
		return false;
	}
	else if(document.frmpatchange.newpassword.value == "")
	{
		alert("New Password should not be empty..");
		document.frmpatchange.newpassword.focus();
		return false;
	}
	else if(document.frmpatchange.newpassword.value.length < 6)
	{
		alert("New Password length should be more than 6 characters...");
		document.frmpatchange.newpassword.focus();
		return false;
	}
	else if(document.frmpatchange.newpassword.value != document.frmpatchange.password.value )
	{
		alert(" New Password and confirm password should be equal..");
		document.frmpatchange.password.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>
