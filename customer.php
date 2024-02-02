<?php
include("admin.php");
include("connect.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE customers SET customername='$_POST[customername]',appdate='$_POST[appdate]',apptime='$_POST[apptime]',address='$_POST[address]',contactnumber='$_POST[contactnumber]',lga='$_POST[lga]',state='$_POST[state]',loginid='$_POST[loginid]',password='$_POST[password]',gender='$_POST[select3]',dob='$_POST[dob]',status='$_POST[select]' WHERE customerid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('customer record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO customers(customername,appdate,apptime,address,contactnumber,lga,state,loginid,password,gender,dob,status) values('$_POST[name]','$dt','$tim','$_POST[address]','$_POST[contactnumber]','$_POST[lga]','$_POST[state]','$_POST[loginid]','$_POST[password]','$_POST[select3]','$_POST[dob]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('customer record inserted successfully...');</script>";
			$insid= mysqli_insert_id($con);
			if(isset($_SESSION['id']))
			{
				echo "<script>window.location='appointment.php?patid=$insid';</script>";	
			}
			else
			{
				echo "<script>window.location='customerlogin.php';</script>";	
			}		
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM customers WHERE customerid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>


<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center-2">Customer Registration Panel</h2>
    </div>

        <form method="post" action="" name="frmpatient" onSubmit="return validateform()" style="padding: 10px">
            <div class="user-details">
            <div class="user-input"><label>Customer Name</label>
                <div class="input-box">
                    <input class="form-control" type="text" name="customername" id="name"
                        value="<?php echo $rsedit['customername']; ?>" />
                </div>
            </div>

            <?php
			if(isset($_GET['editid']))
			{
				?>

            <div class="user-input"><label>Admission Date</label>
                <div class="input-box">
                    <input class="form-control" type="date" name="appdate"
                        value="<?php echo $rsedit['appdate']; ?>" readonly />
                </div>
            </div>


            <div class="user-input"><label>Admission Time</label>
                <div class="input-box">
                    <input class="form-control" type="time" name="apptime"
                        value="<?php echo $rsedit['apptime']; ?>" readonly />
                </div>
            </div>

            <?php
			}
			?>
            <div class="user-input">
                <label>Address</label>
                <div class="input-box">
                    <input class="form-control " name="address" id="tinymce" value="<?php echo $rsedit['address']; ?>">
                </div>
            </div>

            <div class="user-input"><label>Contact Number</label>
                <div class="input-box">
                    <input class="form-control" type="text" name="contacnumber" id="mobilenumber"
                        value="<?php echo $rsedit['contactnumber']; ?>" />
                </div>
            </div>


            <div class="user-input"><label>LGA</label>
                <div class="input-box">
                    <input class="form-control" type="text" name="lga" id="city"
                        value="<?php echo $rsedit['lga']; ?>" />
                </div>
            </div>

            <div class="user-input"><label>State</label>
                <div class="input-box">
                    <input class="form-control" type="text" name="state" id="city"
                        value="<?php echo $rsedit['state']; ?>" />
                </div>
            </div>

            <div class="user-input"><label>Login ID</label>
                <div class="input-box">
                    <input class="form-control" type="text" name="loginid" id="loginid"
                        value="<?php echo $rsedit['loginid']; ?>" />
                </div>
            </div>


            <div class="user-input"><label>Password</label>
                <div class="input-box">
                    <input class="form-control" type="password" name="password" id="password"
                        value="<?php echo $rsedit['password']; ?>" />
                </div>
            </div>

            <div class="user-input"><label>Confirm Password</label>
                <div class="input-box">
                    <input class="form-control" type="password" name="cpassword" id="confirmpassword"
                        value="<?php echo $rsedit['cpassword']; ?>" />
                </div>
            </div>


            <div class="user-input"><label>Gender</label>
                <div class="input-box"><select class="details" name="select3" id="select3">
                        <option value="">Select</option>
                        <?php
				$arr = array("MALE","FEMALE");
				foreach($arr as $val)
				{
					if($val == $rsedit['gender'])
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
            </div>

            <div class="user-input"><label>Date Of Birth</label>
                <div class="input-box">
                    <input class="form-control" type="date" name="dob" max="<?php echo date("Y-m-d"); ?>"
                        id="dateofbirth" value="<?php echo $rsedit['dob']; ?>" />
                </div>
            </div>

            <div class="button">
                <input type="submit" name="submit" value="Submit" />
            </div>
            </div>
            

        </form>
        <p>&nbsp;</p>
    </div>
<div class="clear"></div>


<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmpatient.patientname.value == "") {
        alert("Customer name should not be empty..");
        document.frmpatient.patientname.focus();
        return false;
    } else if (!document.frmpatient.patientname.value.match(alphaspaceExp)) {
        alert("Customer name not valid..");
        document.frmpatient.patientname.focus();
        return false;
    } else if (document.frmpatient.admissiondate.value == "") {
        alert("Admission date should not be empty..");
        document.frmpatient.admissiondate.focus();
        return false;
    } else if (document.frmpatient.admissiontme.value == "") {
        alert("Admission time should not be empty..");
        document.frmpatient.admissiontme.focus();
        return false;
    } else if (document.frmpatient.address.value == "") {
        alert("Address should not be empty..");
        document.frmpatient.address.focus();
        return false;
    } else if (document.frmpatient.mobilenumber.value == "") {
        alert("Contact number should not be empty..");
        document.frmpatient.mobilenumber.focus();
        return false;
    } else if (!document.frmpatient.mobilenumber.value.match(numericExpression)) {
        alert("Contact number not valid..");
        document.frmpatient.mobilenumber.focus();
        return false;
    } else if (document.frmpatient.city.value == "") {
        alert("LGA should not be empty..");
        document.frmpatient.city.focus();
        return false;
    } else if (!document.frmpatient.city.value.match(alphaspaceExp)) {
        alert("LGA not valid..");
        document.frmpatient.city.focus();
        return false;
    } else if (document.frmpatient.city.value == "") {
        alert("State should not be empty..");
        document.frmpatient.city.focus();
        return false;
    } else if (!document.frmpatient.city.value.match(alphaspaceExp)) {
        alert("State not valid..");
        document.frmpatient.city.focus();
        return false;
    } else if (document.frmpatient.loginid.value == "") {
        alert("Login ID should not be empty..");
        document.frmpatient.loginid.focus();
        return false;
    } else if (!document.frmpatient.loginid.value.match(alphanumericExp)) {
        alert("Login ID not valid..");
        document.frmpatient.loginid.focus();
        return false;
    } else if (document.frmpatient.password.value == "") {
        alert("Password should not be empty..");
        document.frmpatient.password.focus();
        return false;
    } else if (document.frmpatient.password.value.length < 8) {
        alert("Password length should be more than 8 characters...");
        document.frmpatient.password.focus();
        return false;
    } else if (document.frmpatient.password.value != document.frmpatient.confirmpassword.value) {
        alert("Password and confirm password should be equal..");
        document.frmpatient.confirmpassword.focus();
        return false;
    } else if (document.frmpatient.select3.value == "") {
        alert("Gender should not be empty..");
        document.frmpatient.select3.focus();
        return false;
    } else if (document.frmpatient.dateofbirth.value == "") {
        alert("Date Of Birth should not be empty..");
        document.frmpatient.dateofbirth.focus();
        return false;
    } else if (document.frmpatient.select.value == "") {
        alert("Kindly select the status..");
        document.frmpatient.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>