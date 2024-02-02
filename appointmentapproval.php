<?php
include("admin.php");
include("connect.php");
if(isset($_POST['submit']))
{
		if(isset($_GET['editid']))
		{
				$sql ="UPDATE customers SET status='Active' WHERE customerid='$_GET[customerid]'";
				$qsql=mysqli_query($con,$sql);
			$sql ="UPDATE appointment SET appointmenttype='$_POST[apptype]',categoryid='$_POST[select5]',staffid='$_POST[select6]',status='Approved',appdate='$_POST[appdate]',apptime='$_POST[apptime]' WHERE appointmentid='$_GET[editid]'";
			if($qsql = mysqli_query($con,$sql))
			{
			
				echo "<script>alert('appointment record updated successfully...');</script>";				
				echo "<script>window.location='customerreport.php?customerid=$_GET[customerid]&appointmentid=$_GET[editid]';</script>";
			}
			else
			{
				echo mysqli_error($con);
			}	
		}
		else
		{
			$sql ="UPDATE customers SET status='Active' WHERE customerid='$_POST[select4]'";
			$qsql=mysqli_query($con,$sql);
				
			$sql ="INSERT INTO appointment(appointmenttype,customerid,categoryid,appdate,apptime,staffid,status) values('$_POST[select2]','$_POST[select4]','$_POST[select3]','$_POST[select5]','$_POST[appdate]','$_POST[apptime]','$_POST[select6]','$_POST[select]')";
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
?>


<div class="container-fluid">
 
    <div class="block-header">
	<h2 class="text-center-2">Appointment Approval Process</h2>
	</div>
   <form method="post" action="" name="frmappnt" onSubmit="return validateform()">
  
    <table class="table table-striped">                
        <tr>
          <td >Customer</td>
          <td >
            <?php
			if(isset($_GET['customerid']))
			{
				$sqlcustomer= "SELECT * FROM customers WHERE customerid='$_GET[customerid]'";
				$qsqlcustomer = mysqli_query($con,$sqlcustomer);
				$rscustomer=mysqli_fetch_array($qsqlcustomer);
				echo $rscustomer['customername'] . " (customer ID - $rscustomer[customerid])";
			}
			else
			{
				$sqlcustomer= "SELECT * FROM customers WHERE status='Active'";
				$qsqlcustomer = mysqli_query($con,$sqlcustomer);
				while($rscustomer=mysqli_fetch_array($qsqlcustomer))
				{
					if($rscustomer['customerid'] == $rsedit['customerid'])
					{
					echo "<option value='$rscustomer[customerid]' selected> $rscustomer[customername](customer ID - $rscustomer[customerid])</option>";
					}
				}
			}
		  ?>
      </td>
        </tr>

        <tr>
          <td>Category</td>
          <td><select name="select5" id="select5" class="form-control show-tick">
           <option value="">Select</option>
            <?php
		  	$sqlcategory= "SELECT * FROM category WHERE status='Active'";
			$qsqlcategory = mysqli_query($con,$sqlcategory);
			while($rscategory=mysqli_fetch_array($qsqlcategory))
			{
				if($rscategory['categoryid'] == $rsedit['categoryid'])
				{
	echo "<option value='$rscategory[categoryid]' selected>$rscategory[categoryname]</option>";
				}
				else
				{
  echo "<option value='$rscategory[categoryid]'>$rscategory[categoryname]</option>";
				}
				
			}
		  ?>
          </select></td>
        </tr>
		
        <tr>
          <td>Staff</td>
          <td><select name="select6" id="select6" class="form-control show-tick">
            <option value="">Select</option>
            <?php
          	$sqlstaff= "SELECT * FROM staff INNER JOIN category ON category.categoryid=staff.categoryid WHERE staff.status='Active'";
			$qsqlstaff = mysqli_query($con,$sqlstaff);
			while($rsstaff = mysqli_fetch_array($qsqlstaff))
			{
				if($rsstaff[staffid] == $rsedit['staffid'])
				{
					echo "<option value='$rsstaff[staffid]' selected>$rsstaff[staffname] ( $rsstaff[categoryname] ) </option>";
				}
				else
				{
					echo "<option value='$rsstaff[staffid]'>$rsstaff[staffname] ( $rsstaff[categoryname] )</option>";				
				}
			}
		  ?>
          </select></td>
        </tr>
		
        <tr>
          <td>Appointment Date</td>
          <td><input class="form-control" type="date" name="appdate" id="appdate" value="<?php echo $rsedit['appdate']; ?>" /></td>
        </tr>
        <tr>
          <td>Appointment Time</td>
          <td><input class="form-control" type="time" name="apptime" id="apptime" value="<?php echo $rsedit['apptime']; ?>" /></td>
        </tr>
        <tr>
          <td>Appointment reason</td>
          <td><input class="form-control" name="appreason" id="appreason" value="<?php echo $rsedit['app_reason']; ?>"/></td>         
        </tr>
        <tr>
          <td colspan="2"><div class="button"><input type="submit" name="submit" value="Submit" /></div></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="application/javascript">
function validateform()
{
	if(document.frmappnt.select4.value == "")
	{
		alert("Customer name should not be empty..");
		document.frmappnt.select4.focus();
		return false;
	}
	else if(document.frmappnt.select5.value == "")
	{
		alert("Category name should not be empty..");
		document.frmappnt.select5.focus();
		return false;
	}
	else if(document.frmappnt.appdate.value == "")
	{
		alert("Appointment date should not be empty..");
		document.frmappnt.appdate.focus();
		return false;
	}
	else if(document.frmappnt.time.value == "")
	{
		alert("Appointment time should not be empty..");
		document.frmappnt.time.focus();
		return false;
	}
	else if(document.frmappnt.select6.value == "")
	{
		alert("staff name should not be empty..");
		document.frmappnt.select6.focus();
		return false;
	}
	else if(document.frmappnt.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmappnt.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}
$('.out_customer').hide();
$('#apptype').change(function()
{
	apptype=$('#apptype').val();
	if(apptype=='Incustomer')
	{
		$('.out_customer').show();
	}
	else
	{
		$('.out_customer').hide();
	}
});
</script>