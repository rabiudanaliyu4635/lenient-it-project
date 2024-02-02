<?php
include("admin.php");
include("connect.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM staff WHERE staffid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('staff record deleted successfully..');</script>";
	}
}
?>
<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center-2">View Available Staff</h2>

	</div>

<div class="card">

	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>
				<tr>
					<td>Name</td>
					<td>Contact</td>
					<td>Department</td>
					<td>LoginID</td>
					<td>Education</td>
					<td>Experience</td>
					<td>Status</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				
				<?php
				$sql ="SELECT * FROM staff";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{

					$sqldept = "SELECT * FROM category WHERE categoryid='$rs[categoryid]'";
					$qsqldept = mysqli_query($con,$sqldept);
					$rsdept = mysqli_fetch_array($qsqldept);
					echo "<tr>
					<td>&nbsp;$rs[staffname]</td>
					<td>&nbsp;$rs[contactnumber]</td>
					<td>&nbsp;$rsdept[categoryname]</td>
					<td>&nbsp;$rs[loginid]</td>
					<td>&nbsp;$rs[education]</td>
					<td>&nbsp;$rs[experience] year</td>
					<td>$rs[status]</td>
					<td>&nbsp;
					<a href='staff.php?editid=$rs[staffid]' class='button'>Edit</a> <a href='viewstaff.php?delid=$rs[staffid]' class='button'>Delete</a> </td>
					</tr>";
				}
				?>      </tbody>
			</table>
		</section>
	</div>
</div>