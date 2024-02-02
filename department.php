<?php
include("admin.php");
include("connect.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
			$sql ="UPDATE category SET categoryname='$_POST[categoryname]',description='$_POST[textarea]',status='$_POST[select]' WHERE categoryid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('department record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO category(categoryname,description,status) values('$_POST[categoryname]','$_POST[textarea]','$_POST[select]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Department record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM category WHERE categoryid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>


<div class="container-fluid">
	<div class="block-header">
            <h2 class="text-center-2">Add New Department </h2>
            
        </div>
  <div class="card">

    <form method="post" action="" name="frmdept" onSubmit="return validateform()">
    <div class="user-details">
        <div class="user-input">
          <label>Department Name</label>
          <div class="input-box">
          <input placeholder=" Enter Here " class="form-control" type="text" name="categoryname" value="<?php echo $rsedit['categoryname']; ?>" />
          </div>
        </div>
        <div class="user-input">
          <label>Description</label>
          <div class="input-box"><textarea placeholder=" Enter Here " class="form-control no-resize" name="textarea" id="textarea" cols="45" rows="5"><?php echo $rsedit['description'] ; ?></textarea></div>
        </div>
        <div class="user-input">
          <label>Status</label>
          <div class="input-box"> <select name="select" id="select" class="details">
            <option value="">Select</option>
            <?php
		  $arr = array("Active","Inactive");
		  foreach($arr as $val)
		  {
			  if($val == $rsedit['status'])
			  {
			  echo "<option value='$val' selected>$val</option>";
			  }
			  else
			  {
				  echo "<option value='$val'>$val</option>";			  
			  }
		  }
		  ?>
            </select></div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Submit" />
        </div>
    </div>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>

<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmdept.departmentname.value == "")
	{
		alert("Department name should not be empty..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(!document.frmdept.departmentname.value.match(alphaspaceExp))
	{
		alert("Department name not valid..");
		document.frmdept.departmentname.focus();
		return false;
	}
	else if(document.frmdept.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmdept.select.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>