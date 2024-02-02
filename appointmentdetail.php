<?php
session_start();
include("connect.php");
if(isset($_POST['submitapp']))
{
	$sql ="INSERT INTO appointment(appointmenttype,categoryid,appdate,apptime,staffid) values('$_POST[select]','$_POST[select2]','$_POST[select3]','$_POST[appdate]','$_POST[apptime]','$_POST[select5]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('appointment record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}

if(isset($_GET['editid']))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}

	$sqlappointment1 = "SELECT max(appointmentid) FROM appointment where customerid='$_GET[customerid]' AND (status='Active' OR status='Approved')";
	$qsqlappointment1 = mysqli_query($con,$sqlappointment1);
	$rsappointment1=mysqli_fetch_array($qsqlappointment1);
	
	$sqlappointment = "SELECT * FROM appointment where appointmentid='$rsappointment1[0]'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	$rsappointment=mysqli_fetch_array($qsqlappointment);
	
if(mysqli_num_rows($qsqlappointment) == 0)
{
	echo "<center><h2>No Appointment records found..</h2></center>";
}
else
{
	$sqlappointment = "SELECT * FROM appointment where appointmentid='$rsappointment1[0]'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	$rsappointment=mysqli_fetch_array($qsqlappointment);
	
	$sqlcategory = "SELECT * FROM category where categoryid='$rsappointment[categoryid]'";
	$qsqlcategory = mysqli_query($con,$sqlcategory);
	$rscategory =mysqli_fetch_array($qsqlcategory);
	
	$sqlstaff = "SELECT * FROM staff where staffid='$rsappointment[staffid]'";
	$qsqlstaff = mysqli_query($con,$sqlstaff);
	$rsstaff =mysqli_fetch_array($qsqlstaff);
?>
<table class="table table-bordered table-striped">
  
  
  <tr>
    <td>Category</td>
    <td>&nbsp;<?php echo $rscategory['categoryname']; ?></td>
  </tr>
  <tr>
    <td>Staff</td>
    <td>&nbsp;<?php echo $rsstaff['staffname']; ?></td>
  </tr>
  <tr>
    <td>Appointment Date</td>
    <td>&nbsp;<?php echo date("d-M-Y",strtotime($rsappointment['appdate'])); ?></td>
  </tr>
  <tr>
    <td>Appointment Time</td>
    <td>&nbsp;<?php echo date("h:i A",strtotime($rsappointment['apptime'])); ?></td>
  </tr>
</table>
<?php
}
?>
<script type="application/javascript">
function validateform()
{
	
	if(document.frmappntdetail.select.value == "")
	{
		alert("Appointment type should not be empty..");
		document.frmappntdetail.select.focus();
		return false;
	}
	else if(document.frmappntdetail.select3.value == "")
	{
		alert("category name should not be empty..");
		document.frmappntdetail.select3.focus();
		return false;
	}
	else if(document.frmappntdetail.date.value == "")
	{
		alert("Appointment date should not be empty..");
		document.frmappntdetail.date.focus();
		return false;
	}
	else if(document.frmappntdetail.time.value == "")
	{
		alert("Appointment time should not be empty..");
		document.frmappntdetail.time.focus();
		return false;
	}
	else if(document.frmappntdetail.select5.value == "")
	{
		alert("staff name should not be empty..");
		document.frmappntdetail.select5.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>