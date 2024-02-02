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
	$sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appointment record Approved successfully..');</script>";
	}
}
?>
<div class="container-fluid">
<div class="block-header">
        <h2 class="text-center-2">View Appointments - Approved</h2>
    </div>

<div class="card">
	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">

			<thead>
				<tr>

					<td>Customer Detail</td>
					<td>Date & Time</td>
					<td>Category</td>
					<td>Staff</td>
					<td>Appointment Reason</td>
					<td>Status</td>
					<td><div align="center">Action</div></td>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql ="SELECT * FROM appointment WHERE (status='Approved' OR status='Active')";
				if(isset($_SESSION['patientid']))
				{
					$sql  = $sql . " AND customerid='$_SESSION[customerid]'";
				}
				if(isset($_SESSION['staffid']))
				{
					$sql  = $sql . " AND staffid='$_SESSION[staffid]'";			
				}
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					$sqlpat = "SELECT * FROM customers WHERE customerid='$rs[customerid]'";
					$qsqlpat = mysqli_query($con,$sqlpat);
					$rspat = mysqli_fetch_array($qsqlpat);


					$sqldept = "SELECT * FROM category WHERE categoryid='$rs[categoryid]'";
					$qsqldept = mysqli_query($con,$sqldept);
					$rsdept = mysqli_fetch_array($qsqldept);

					$sqldoc= "SELECT * FROM staff WHERE staffid='$rs[staffid]'";
					$qsqldoc = mysqli_query($con,$sqldoc);
					$rsdoc = mysqli_fetch_array($qsqldoc);
					echo "<tr>

					<td>&nbsp;$rspat[customername]<br>&nbsp;$rspat[contactnumber]</td>		 
					<td>&nbsp;$rs[appdate]&nbsp;$rs[apptime]</td> 
					<td>&nbsp;$rsdept[categoryname]</td>
					<td>&nbsp;$rsdoc[staffname]</td>
					<td>&nbsp;$rs[app_reason]</td>
					<td>&nbsp;$rs[status]</td>
					<td><div align='center'>";
					if($rs['status'] != "Approved")
					{
						if(!(isset($_SESSION['customerid'])))
						{
							echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]' class='button'>Approve</a><hr>";
						}
						echo "  <a href='viewappointment.php?delid=$rs[appointmentid]' class='button'>Delete</a>";
					}
					else
					{
						echo "<a href='customerreport.php?customerid=$rs[customerid]&appointmentid=$rs[appointmentid]' class='button'>View Report</a>";
					}
					echo "</center></td></tr>";
				}
				?>
			</tbody>
		</table>
	</section>

</div>
</div> 
