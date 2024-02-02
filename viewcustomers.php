<?php
include("admin.php");
include("connect.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM customers WHERE customerid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('customer record deleted successfully..');</script>";
	}
}
?>
<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center-2">View Customer Records</h2>

  </div>

<div class="card">

  <section class="container">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">

      <thead>
        <tr>
          <th width="15%" height="36"><div align="center">Name</div></th>
          <th width="20%"><div align="center">Admission</div></th>
          <th width="28%"><div align="center">Address, Contact</div></th>    
          <th width="20%"><div align="center">Customer Profile</div></th>
          <th width="17%"><div align="center">Action</div></th>
        </tr>
      </thead>
      <tbody>
       <?php
       $sql ="SELECT * FROM customers";
       $qsql = mysqli_query($con,$sql);
       while($rs = mysqli_fetch_array($qsql))
       {
        echo "<tr>
        <td>$rs[customername]<br>
        <strong>Login ID :</strong> $rs[loginid] </td>
        <td>
        <strong>Date</strong>: &nbsp;$rs[appdate]<br>
        <strong>Time</strong>: &nbsp;$rs[apptime]</td>
        <td>$rs[address]<br>$rs[lga] -  &nbsp;$rs[state]<br>
        Cont. No. - $rs[contactnumber]</td>
        <td><strong>Gender</strong> - &nbsp;$rs[gender]<br>
        <strong>DOB</strong> - &nbsp;$rs[dob]</td>
        <td align='center'>Status - $rs[status] <br>";
        if(isset($_SESSION['id']))
        {
          echo "<a href='customer.php?editid=$rs[customerid]' class='button'>Edit</a><a href='viewcustomers.php?delid=$rs[customerid]' class='button'>Delete</a> <hr>
          <a href='customerreport.php?customerid=$rs[customerid]' class='button'>View Report</a>";
        }
        echo "</td></tr>";
      }
      ?>
    </tbody>
  </table>
</section>

</div>
</div>