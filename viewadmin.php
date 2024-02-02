<?php
include("admin.php");
include("connect.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM adminlogin WHERE id='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('admin record deleted successfully..');</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css">
    <title>LCT - Admin</title>
</head>
<body>
    
</body>
</html>

<div class="container-fluid">
    <div class="block-header">
		<h2 class="text-center-2"> View Admin </h2>
	</div>
    <div class="card">
  <section class="container">
   <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
    <thead>
      <tr>
        <td width="12%" height="40"><b>Admin Name</b></td>
        <td width="11%"><b>Login ID</b></td>
        <td width="12%"><b>Status</b></td>
        <td width="10%"><b>Action</b></td>
      </tr>
    </thead>
    <tbody>
     <?php
     $sql ="SELECT * FROM adminlogin";
     $qsql = mysqli_query($con,$sql);
     while($rs = mysqli_fetch_array($qsql))
     {
      echo "<tr>
      <td>$rs[name]</td>
      <td>$rs[loginid]</td>
      <td>$rs[status]</td>
      <td>
      <a href='adminprofile.php?editid=$rs[id]' class='button'>Edit</a> <a href='viewadmin.php?delid=$rs[id]' class='button'>Delete</a> </td>
      </tr>";
    }
    ?>
  </tbody>
</table>
</section>

</div>
</div>

