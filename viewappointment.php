<?php
include("customeraccount.php");
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
    <h2 class="text-center-2">View Appointment records</h2>

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
          <th>Reason</th>
          <th>Status</th>
          <th><div align="center">Action</div></th>
        </tr>
        </thead>
        <tbody>
          <?php
		$sql ="SELECT * FROM appointment WHERE (status !='')";
		if(isset($_SESSION['customerid']))
		{
			$sql  = $sql . " AND customerid='$_SESSION[customerid]'";
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
			 <td>&nbsp;" . date("d-M-Y",strtotime($rs['appdate'])) . " &nbsp; " . date("H:i A",strtotime($rs['apptime'])) . "</td> 
		    <td>&nbsp;$rsdept[categoryname]</td>
			   <td>&nbsp;$rsdoc[staffname]</td>
			    <td>&nbsp;$rs[app_reason]</td>
			    <td>&nbsp;$rs[status]</td>
          <td><div align='center'>";
		  if($rs['status'] != "Approved")
		  {
				  if(!(isset($_SESSION['customerid'])))
				  {
						  echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]'>Approve</a><hr>";
				  }
				 echo "  <a href='viewappointment.php?delid=$rs[appointmentid]'>Delete</a>";
		  }
		  else
		  {
				echo "<a href='customerreport.php?customerid=$rs[customerid]&appointmentid=$rs[appointmentid]'>View Report</a>";
		  }
		 echo "</center></td></tr>";
		}
		?>
      </tbody>
    </table>
</section>
</div>
</div>
