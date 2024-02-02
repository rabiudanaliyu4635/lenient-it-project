<?php
include("connect.php");
if(isset($_POST['submitpat']))
{
	$sql ="INSERT INTO customers(customername,appdate,apptime,address,contactnumber,gender,dob) values('$_POST[customername]','$_POST[appdate]','$_POST[apptime]','$_POST[address]','$_POST[contactnumber]','$_POST[select]','$_POST[dob]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('customers record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}

if(isset($_GET['editid']))
{
	$sql="SELECT * FROM customers WHERE customerid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>
<?php
if(!isset($_GET['customerid']))
{
?>
<div class="container-fluid">
        <div class="block-header">
            <h2>Book Appointment</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="customername" id="customername"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="customerid" id="customerid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="address" id="address" cols="45" rows="5"> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick">
                                        <option value="">-- Gender --</option>
                                        <option value="10">Male</option>
                                        <option value="20">Female</option>
                                    </select>
                                </div>
                            </div>
                         
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="contactnumber" id="contactnumber"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="dob" id="dob" />
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-raised" name="submitpat" id="submitpat" value="Submit" />
                                
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </div>
<form method="post" action="" name="frmpatdet" onSubmit="return validateform()">
      <table class="table table-bordered table-striped">
      <tbody>
     <tr>
                <td width="17%"><strong>Customer Name </strong></td>
                <td width="41%"><input type="text" name="customername" id="customername"/></td>
                <td width="16%"><strong>Customer ID</strong></td>
                <td width="26%"><input type="text" name="customerid" id="customerid" /></td>
        </tr>
              <tr>
                <td><strong>Address</strong></td>
                <td align="right"><textarea name="address" id="address" cols="45" rows="5"> </textarea></td>
                <td><strong>Gender</strong></td>
                <td><label for="select"></label>
                  <select name="select" id="select">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select></td>
              </tr>
              <tr>
                <td><strong>Contact Number</strong></td>
                <td><input type="text" name="contactnumber" id="contactnumber"/></td>
                <td><strong>Date Of Birth </strong></td>
                <td><input type="date" name="dateofbirth" id="dateofbirth" /></td>
              </tr>
              <tr>
                <td colspan="4" align="center"><input type="submit" name="submitpat" id="submitpat" value="Submit" /></td>
              </tr>
        </tbody>
  </table>       
    </form>
<?php
}
else
{
$sqlcustomer = "SELECT * FROM customers where customerid='$_GET[customerid]'";
$qsqlcustomer = mysqli_query($con,$sqlcustomer);
$rscustomer=mysqli_fetch_array($qsqlcustomer);
?>

    <table class="table table-bordered table-striped">
      <tbody>
        <tr>
          <td width="16%"><strong>Customer Name </strong></td>
          <td width="34%">&nbsp;<?php echo $rscustomer['customername']; ?></td>
          <td width="16%"><strong>Customer ID</strong></td>
          <td width="34%">&nbsp;<?php echo $rscustomer['customerid']; ?></td>
        </tr>
        <tr>
          <td><strong>Address</strong></td>
          <td>&nbsp;<?php echo $rscustomer['address']; ?></td>
          <td><strong>Gender</strong></td>
          <td> <?php echo $rscustomer['gender'];?></td>
        </tr>
        <tr>
          <td><strong>Contact Number</strong></td>
          <td>&nbsp;<?php echo $rscustomer['contactnumber']; ?></td>
          <td><strong>Date Of Birth </strong></td>
          <td>&nbsp;<?php echo $rscustomer['dob']; ?></td>
        </tr>
      </tbody>
    </table>
<?php
}

?>


<script type="application/javascript">
function validateform()
{
	if(document.frmpatdet.customername.value == "")
	{
		alert("customer name should not be empty..");
		document.frmpatdet.customername.focus();
		return false;
	}
	else if(document.frmpatdet.customerid.value == "")
	{
		alert("customer ID should not be empty..");
		document.frmpatdet.customerid.focus();
		return false;
	}
	else if(document.frmpatdet.admissiondate.value == "")
	{
		alert("Admission date should not be empty..");
		document.frmpatdet.admissiondate.focus();
		return false;
	}
	else if(document.frmpatdet.admissiontime.value == "")
	{
		alert("Admission time should not be empty..");
		document.frmpatdet.admissiontime.focus();
		return false;
	}
	else if(document.frmpatdet.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmpatdet.address.focus();
		return false;
	}
	else if(document.frmpatdet.select.value == "")
	{
		alert("Gender should not be empty..");
		document.frmpatdet.select.focus();
		return false;
	}
	else if(document.frmpatdet.mobilenumber.value == "")
	{
		alert("Contact number should not be empty..");
		document.frmpatdet.mobilenumber.focus();
		return false;
	}
	else if(document.frmpatdet.dateofbirth.value == "")
	{
		alert("Date Of Birth should not be empty..");
		document.frmpatdet.dateofbirth.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>