<?php

include("admin.php");
include("connect.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM appointment WHERE appointmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if(isset($_GET['approveid']))
{
	$sql ="UPDATE customers SET status='Active' WHERE customerid='$_GET[customerid]'";
	$qsql=mysqli_query($con,$sql);
	
	$sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[appointmentid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appointment record Approved successfully..');</script>";
		echo "<script>window.location='appointmentapproval.php';</script>";
	}	
}
?>
<div class="container-fluid">
<div class="block-header">
        <h2 class="text-center-2">View Pending Appointments</h2>
    </div>


<div class="card">
	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>

				<tr>
					<th>Customer Detail</th>
					<th>Date & Time</th>
					<th>Category</th>
					<th>Staff</th>
					<th>Appointment Reason</th>
					<th>Status</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql ="SELECT * FROM appointment WHERE (status='Pending' OR status='Inactive')";
				if(isset($_SESSION['customerid']))
				{
					$sql  = $sql . " AND customerid='$_SESSION[customerid]'";
				}
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					$sqlcus = "SELECT * FROM customers WHERE customerid='$rs[customerid]'";
					$qsqlcus = mysqli_query($con,$sqlcus);
					$rscus = mysqli_fetch_array($qsqlcus);


					$sqlcat = "SELECT * FROM category WHERE categoryid='$rs[categoryid]'";
					$qsqlcat = mysqli_query($con,$sqlcat);
					$rscat = mysqli_fetch_array($qsqlcat);

					$sqlstaff= "SELECT * FROM staff WHERE staffid='$rs[staffid]'";
					$qsqlstaff = mysqli_query($con,$sqlstaff);
					$rsstaff = mysqli_fetch_array($qsqlstaff);
					echo "<tr>

					<td>&nbsp;$rscus[customername]<br>&nbsp;$rscus[contactnumber]</td>		 
					<td>&nbsp;" . date("d-M-Y",strtotime($rs['appdate'])) . " &nbsp; " . date("H:i A",strtotime($rs['apptime'])) . "</td> 
					<td>&nbsp;$rscat[categoryname]</td>
					<td>&nbsp;$rsstaff[staffname]</td>
					<td>&nbsp;$rs[app_reason]</td>
					<td>&nbsp;$rs[status]</td>
					<td>";
					if($rs['status'] != "Approved")
					{
						if(!(isset($_SESSION['customerid'])))
						{
							echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]&customerid=$rs[customerid]' class='button'>Approve</a>";
						}
						echo "  <a href='viewappointment.php?delid=$rs[appointmentid]' class='button'>Delete</a>";
					}
					else
					{
						echo "<a href='customerreport.php?customerid=$rs[customerid]&appointmentid=$rs[appointmentid]' class='button'>View Report</a>";
					}
					echo "</td></tr>";
				}
				?>
			</tbody>
		</table>
	</section>

</div>
</div>
