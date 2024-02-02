<?php
include("admin.php");
include("connect.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM category WHERE categoryid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>
    Swal.fire({
      title: 'Done!',
      text: 'department deleted successfully',
      type: 'success',
      
    })</script>";
  }
}
?>


<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center-2">View Department Record</h2>
    
  </div>
  <div class="card">
    
    <section class="container">
     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <tbody>
        <tr>
          <td><strong>Name</strong></td>
          <td><strong>Department Description</strong></td>          
          <td><strong>Status</strong></td>
          <?php
          if(isset($_SESSION['id']))
          {
            ?>
            <td><strong>Action</strong></td>
            <?php
          }
          ?>
        </tr>
        <?php
        $sql ="SELECT * FROM category";
        $qsql = mysqli_query($con,$sql);
        while($rs = mysqli_fetch_array($qsql))
        {
          echo "<tr>
          <td>$rs[categoryname]</td>
          <td> $rs[description]</td>
          
          <td>&nbsp;$rs[status]</td>";
          if(isset($_SESSION['id']))
          {
            echo "<td>&nbsp;
            <a href='department.php?editid=$rs[categoryid]' class='button'>Edit</a> | <a href='viewdepartment.php?delid=$rs[categoryid]' class='button'>Delete</a> </td>";
          }
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </section>
  
</div>
</div>
