<?php
include("admin.php");
include("connect.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
			$sql ="UPDATE staff SET staffname='$_POST[staffname]',contactnumber='$_POST[contactnumber]',categoryid='$_POST[select3]',loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[select]',education='$_POST[education]',experience='$_POST[experience]' WHERE staffid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('staff record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO staff(staffname,contactnumber,categoryid,loginid,password,status,education,experience,) values('$_POST[staffname]','$_POST[contactnumber]','$_POST[select3]','$_POST[loginid]','$_POST[password]','Active','$_POST[education]','$_POST[experience]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Staff record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM staff WHERE staffid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center-2"> Add New Staff </h2>
	</div>
	<div class="user-details">
		<form method="post" action="" name="frmdoct" onSubmit="return validateform()" style="padding: 10px">
            <div class="user-input"><label>Staff Name</label> 
				<div class="input-box">
					<input class="form-control" type="text" name="staffname" id="staffname" value="<?php echo $rsedit['staffname']; ?>" />
				</div>
			</div>
            <div class="user-input"><label>Contact Number</label> 
				<div class="input-box">
					<input class="form-control" type="text" name="contactnumber" id="contactnumber" value="<?php echo $rsedit['contactnumber']; ?>"/>
			    </div>
			</div>
            <div class="input-box"><label>Category</label> 
				<select  name="categoryid" id="select3" class="details">
					<option value="">Select</option>
						<?php
						    $sqldepartment= "SELECT * FROM category WHERE status='Active'";
						    $qsqldepartment = mysqli_query($con,$sqldepartment);
						    while($rsdepartment=mysqli_fetch_array($qsqldepartment))
						    {
							if($rsdepartment['categoryid'] == $rsedit['categoryid'])
							{
								echo "<option value='$rsdepartment[categoryid]' selected>$rsdepartment[categoryname]</option>";
							}
							else
							{
								echo "<option value='$rsdepartment[categoryid]'>$rsdepartment[categoryname]</option>";
							}
                            }
						?>
				</select>
			</div>

			<div class="user-input"><label>Login ID</label> 
				<div class="input-box">
					<input class="form-control" type="text" name="loginid" id="loginid" value="<?php echo $rsedit['loginid']; ?>"/>
				</div>
			</div>
            <div class="user-input"><label>Password</label> 
				<div class="input-box">
					<input class="form-control" type="password" name="password" id="password" value="<?php echo $rsedit['password']; ?>"/>
				</div>
			</div>
            <div class="user-input"><label>Confirm Password</label> 
				<div class="input-box">
					<input class="form-control" type="password" name="cpassword" id="cmpassword" value="<?php echo $rsedit['password']; ?>"/>
				</div>
			</div>
            <div class="user-input"><label>Education</label> 
				<div class="input-box">
					<input class="form-control" type="text" name="education" id="education" value="<?php echo $rsedit['education']; ?>" />
				</div>
			</div>
			<div class="user-input"><label>Experience</label> 
				<div class="input-box">
					<input class="form-control" type="text" name="experience" id="experience" value="<?php echo $rsedit['experience']; ?>"/>
				</div>
			</div>

			<div class="input-box"><label>Status</label> 
			    <select class="details" name="status" id="select">
						<option value="" selected="" hidden>Select</option>
						<?php
						$arr= array("Active","Inactive");
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
                <input type="submit" name="submit" value="Submit" />
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
	if(document.frmdoct.doctorname.value == "")
	{
		alert("Staff name should not be empty..");
		document.frmdoct.doctorname.focus();
		return false;
	}
	else if(!document.frmdoct.doctorname.value.match(alphaspaceExp))
	{
		alert("Staff name not valid..");
		document.frmdoct.doctorname.focus();
		return false;
	}
	else if(document.frmdoct.mobilenumber.value == "")
	{
		alert("Contact number should not be empty..");
		document.frmdoct.mobilenumber.focus();
		return false;
	}
	else if(!document.frmdoct.mobilenumber.value.match(numericExpression))
	{
		alert("Contact number not valid..");
		document.frmdoct.mobilenumber.focus();
		return false;
	}
	else if(document.frmdoct.select3.value == "")
	{
		alert("Category ID should not be empty..");
		document.frmdoct.select3.focus();
		return false;
	}
	else if(document.frmdoct.loginid.value == "")
	{
		alert("loginid should not be empty..");
		document.frmdoct.loginid.focus();
		return false;
	}
	else if(!document.frmdoct.loginid.value.match(alphanumericExp))
	{
		alert("loginid not valid..");
		document.frmdoct.loginid.focus();
		return false;
	}
	else if(document.frmdoct.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.password.value != document.frmdoct.cnfirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmdoct.password.focus();
		return false;
	}
	else if(document.frmdoct.education.value == "")
	{
		alert("Education should not be empty..");
		document.frmdoct.education.focus();
		return false;
	}
	else if(!document.frmdoct.education.value.match(alphaExp))
	{
		alert("Education not valid..");
		document.frmdoct.education.focus();
		return false;
	}
	else if(document.frmdoct.experience.value == "")
	{
		alert("Experience should not be empty..");
		document.frmdoct.experience.focus();
		return false;
	}
	else if(!document.frmdoct.experience.value.match(numericExpression))
	{
		alert("Experience not valid..");
		document.frmdoct.experience.focus();
		return false;
	}
	else if(document.frmdoct.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmdoct.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>