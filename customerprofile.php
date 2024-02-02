<?php
include("customeraccount.php");
include("connect.php");
session_start();
if(isset($_POST['submit']))
{
	if(isset($_SESSION['customerid'])){
		$sql ="UPDATE customers SET customername='$_POST[customername]',appdate='$_POST[appdate]',apptime='$_POST[apptime]',address='$_POST[address]',contactnumber='$_POST[contactnumber]',lga='$_POST[lga]',state='$_POST[state]',loginid='$_POST[loginid]',gender='$_POST[select3]',dob='$_POST[dob]' WHERE customerid='$_SESSION[customerid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('customer record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	} else{
		$sql ="INSERT INTO customers(customername,appdate,apptime,address,contactnumber,lga,state,loginid,gender,dob) values('$_POST[customername]','$_POST[appdate]','$_POST[apptime]','$_POST[address]','$_POST[contactnumber]','$_POST[lga]','$_POST[state]','$_POST[loginid]','$_POST[select3]','$_POST[dob]')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<div class='alert alert-success'>
			Customer record inserted successfully
			</div>";

		}
		else
		{
			echo mysqli_error($con);
		}
	}
	
}
if(isset($_SESSION['customerid']))
{
	$sql="SELECT * FROM customers WHERE customerid='$_SESSION[customerid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>



<div class="container-fluid">
        <div class="block-header">
            <h2 class="text-center-2">Customer Profile</h2>
        </div>
				<form method="post" action="" name="frmpatprfl" onSubmit="return validateform()">
					<div class="user-details">
                                <div class="user-input"><label for="">Customer name</label>
                                    <div class="input-box">
                                        <input class="form-control" type="text" name="customername" id="customername"  value="<?php echo $rsedit['customername']; ?>"/>
                                    </div>
                                </div>
                                <div class="user-input"><label for="">Admission date</label>
                                    <div class="input-box">
                                        <input class="form-control" type="date" name="appdate" id="admissiondate" value="<?php echo $rsedit['appdate']; ?>" />
                                    </div>
                                </div>
                                <div class="user-input"><label for="apptime">Admission time</label>
                                    <div class="input-box">                                 	
                                        <input class="form-control" type="time" name="appptime" id="apptme" value="<?php echo $rsedit['apptime']; ?>" />
                                    </div>
                                </div>
                                <div class="user-input"><label for="">Address</label>
                                	<div class="input-box">
                                        <input class="form-control" name="address" id="address" value="<?php echo $rsedit['address']; ?>" /> 
                                    </div>
                                </div>
                                <div class="user-input"><label for="">Contact number</label>
                                	<div class="input-box">
                                    <input class="form-control" type="text" name="contactnumber" id="contactnumber" value="<?php echo $rsedit['contactnumber']; ?>" />
                                    </div>
                                </div>
                                <div class="user-input"><label for="">LGA</label>
                                    <div class="input-box">
                                       <input class="form-control" type="text" name="city" id="city" value="<?php echo $rsedit['lga']; ?>" />
                                    </div>
                                </div>
                                <div class="user-input"><label for="">State</label>
                                    <div class="input-box">
                                        <input class="form-control" type="text" name="sttae" id="state" value="<?php echo $rsedit['state']; ?>" />
                                    </div>
                                </div>
                                <div class="user-input"><label for="">Login ID</label>
                                    <div class="input-box">
                                        <input class="form-control" type="text" name="loginid" id="loginid"  value="<?php echo $rsedit['loginid']; ?>"/>
                                    </div>
                            	</div>
                                <div class="user-input"><label for="">Gender</label>
                                    <div class="input-box">
                                    	<select name="select3" id="select3">
                                    		<option value="" selected="" hidden="">Select</option>
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
                                <div class="user-input"><label for="">Date of birth</label>
                                    <div class="input-box">
                                       <input class="form-control" type="date" name="dob" id="dob"  value="<?php echo $rsedit['dob']; ?>"/>
                                   </div>
                                </div>
							<div class="button">                                
                                <input type="submit" name="submit" id="submit" value="Submit" />
                            </div>
                            </div>
                                                        
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
	if(document.frmpatprfl.customername.value == "")
	{
		alert("customer name should not be empty..");
		document.frmpatprfl.customername.focus();
		return false;
	}
	else if(!document.frmpatprfl.customername.value.match(alphaspaceExp))
	{
		alert("customer name not valid..");
		document.frmpatprfl.customername.focus();
		return false;
	}
	else if(document.frmpatprfl.admissiondate.value == "")
	{
		alert("Admission date should not be empty..");
		document.frmpatprfl.admissiondate.focus();
		return false;
	}
	else if(document.frmpatprfl.admissiontme.value == "")
	{
		alert("Admission time should not be empty..");
		document.frmpatprfl.admissiontme.focus();
		return false;
	}
	else if(document.frmpatprfl.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmpatprfl.address.focus();
		return false;
	}
	else if(document.frmpatprfl.mobilenumber.value == "")
	{
		alert("Mobile number should not be empty..");
		document.frmpatprfl.mobilenumber.focus();
		return false;
	}
	else if(!document.frmpatprfl.mobilenumber.value.match(numericExpression))
	{
		alert("Mobile number not valid..");
		document.frmpatprfl.mobilenumber.focus();
		return false;
	}
	else if(document.frmpatprfl.city.value == "")
	{
		alert("City should not be empty..");
		document.frmpatprfl.city.focus();
		return false;
	}
	else if(!document.frmpatprfl.city.value.match(alphaspaceExp))
	{
		alert("City not valid..");
		document.frmpatprfl.city.focus();
		return false;
	}
	else if(document.frmpatprfl.pincode.value == "")
	{
		alert("Pincode should not be empty..");
		document.frmpatprfl.pincode.focus();
		return false;
	}
	else if(!document.frmpatprfl.pincode.value.match(numericExpression))
	{
		alert("Pincode not valid..");
		document.frmpatprfl.pincode.focus();
		return false;
	}
	else if(document.frmpatprfl.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmpatprfl.loginid.focus();
		return false;
	}
	else if(!document.frmpatprfl.loginid.value.match(emailExp))
	{
		alert("Login ID not valid..");
		document.frmpatprfl.loginid.focus();
		return false;
	}
	else if(document.frmpatprfl.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmpatprfl.password.focus();
		return false;
	}
	else if(document.frmpatprfl.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmpatprfl.password.focus();
		return false;
	}
	else if(document.frmpatprfl.password.value != document.frmpatprfl.confirmpassword.value )
	{
		alert("Password and confirm password should be equal..");
		document.frmpatprfl.confirmpassword.focus();
		return false;
	}
	else if(document.frmpatprfl.select2.value == "")
	{
		alert("Blood Group should not be empty..");
		document.frmpatprfl.select2.focus();
		return false;
	}
	else if(document.frmpatprfl.select3.value == "")
	{
		alert("Gender should not be empty..");
		document.frmpatprfl.select3.focus();
		return false;
	}
	else if(document.frmpatprfl.dateofbirth.value == "")
	{
		alert("Date Of Birth should not be empty..");
		document.frmpatprfl.dateofbirth.focus();
		return false;
	}
	else if(document.frmpatprfl.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmpatprfl.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>