<?php

include("admin.php");
include("connect.php");
if(isset($_POST['submit']))
{
  if(isset($_GET['editid']))
  {
   $sql ="UPDATE appointment SET customerid='$_POST[select4]',categoryid='$_POST[select5]',appdate='$_POST[appdate]',apptime='$_POST[time]',staffid='$_POST[select6]',status='$_POST[select]' WHERE appointmentid='$_GET[editid]'";
   if($qsql = mysqli_query($con,$sql))
   {
    echo "<script>alert('appointment record updated successfully...');</script>";
}
else
{
    echo mysqli_error($con);
}	
}
else
{
   $sql ="UPDATE customer SET status='Active' WHERE customerid='$_POST[select4]'";
   $qsql=mysqli_query($con,$sql);

   $sql ="INSERT INTO appointment(customerid, categoryid, appdate, apptime, staffid, status, app_reason) values('$_POST[select4]','$_POST[select5]','$_POST[appdate]','$_POST[time]','$_POST[select6]','$_POST[select]','$_POST[appreason]')";
   if($qsql = mysqli_query($con,$sql))
   {

    include("insertbillingrecord.php");	
    echo "<script>alert('Appointment record inserted successfully...');</script>";
    echo "<script>window.location='customerreport.php?customerid=$_POST[select4]';</script>";
}
else
{
    echo mysqli_error($con);
}
}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM appointment WHERE appid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LCT - New Appointment</title>
</head>
<body>
<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center-2">Book Appointment</h2>
    </div>
    <div class="block-header">
        <small>Appointment Information </small>
    </div>
    <form method="post" action="" name="frmappnt" onSubmit="return validateform()">
        <input type="hidden" name="select2" value="Offline">
        <div class="user-details">
                <div class="input-box">
                        <?php
                            if(isset($_GET['patid']))
                            {
                                    $sqlcustomer= "SELECT * FROM customers WHERE customerid='$_GET[patid]'";
                                    $qsqlcustomer = mysqli_query($con,$sqlcustomer);
                                    $rscustomer=mysqli_fetch_array($qsqlcustomer);
                                          echo $rscustomer['name'] . " (Customer ID - $rscustomer[customerid])";
                                          echo "<input type='hidden' name='select4' value='$rscustomer[customerid]'>";
                            }
                            else
                            {
                        ?>
                        <select name="select4" id="select4" class="details">
                            <option value="">Select Customer</option>
                                <?php
                                    $sqlcustomer= "SELECT * FROM customers WHERE status='Active'";
                                    $qsqlcustomer = mysqli_query($con,$sqlcustomer);
                                        while($rscustomer=mysqli_fetch_array($qsqlcustomer))
                                        {
                                            if($rscustomer['customerid'] == $rsedit['customerid'])
                                                {
                                                 echo "<option value='$rscustomer[customerid]' selected>$rscustomer[customerid] - $rscustomer[name]</option>";
                                             }
                                             else
                                             {
                                                 echo "<option value='$rscustomer[customerid]'>$rscustomer[customerid] - $rscustomer[name]</option>";
                                             }

                                         }
                                ?>
                        </select>
                                <?php
                                 }
                                ?>
                </div>
                <div class="input-box">
                            <select name="select5" id="select5" class="details">
                                    <option value="">Select Category</option>
                                <?php
                                    $sqldepartment= "SELECT * FROM category WHERE status='Active'";
                                    $qsqldepartment = mysqli_query($con,$sqldepartment);
                                    while($rsdepartment=mysqli_fetch_array($qsqldepartment))
                                    {
                                       if($rsdepartment['categoryid'] == $rsedit['categoryid'])
                                       {
                                        echo "<option value='$rsdepartment[categoryid]' selected>$rsdepartment[categoryname]</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$rsdepartment[categoryid]'>$rsdepartment[categoryname]</option>";
                                    }

                                    }
                                ?>
                            </select>
                </div>

                <div class="user-input">
                    <div class="input-box">
                        <input class="form-control" type="date" name="appointmentdate"
                                id="appointmentdate" value="<?php echo $rsedit['appdate']; ?>">
                    </div>
                </div>

                <div class="user-input">
                    <div class="input-box">
                        <input class="form-control" type="time" name="time" id="time"
                                value="<?php echo $rsedit['apptime']; ?>" />
                    </div>
                </div>
                <div class="input-box">
                        <select name="select6" id="select6" class="details">
                            <option value="">Select Staff</option>
                            <?php
                                $sqlstaff= "SELECT * FROM staff INNER JOIN category ON category.categoryid=staff.categoryid WHERE staff.status='Active'";
                                $qsqlstaff = mysqli_query($con,$sqlstaff);
                                while($rsstaff = mysqli_fetch_array($qsqlstaff))
                                {
                                   if($rsstaff['staffid'] == $rsedit['staffid'])
                                   {
                                    echo "<option value='$rsstaff[staffid]' selected>$rsstaff[staffname] ( $rsstaff[categoryname] ) </option>";
                                }
                                else
                                {
                                    echo "<option value='$rsstaff[staffid]'>$rsstaff[staffname] ( $rsstaff[categoryname] )</option>";				
                                }
                                }
                            ?>
                        </select>
                </div>
                <div class="user-input">
                    <div class="input-box">
                        <textarea rows="4" class="form-control no-resize" name="appreason"
                            id="appreason" s><?php echo $rsedit['app_reason']; ?></textarea>
                    </div>
                </div>
                <div class="input-box">
                        <select name="select" id="select" class="details">
                            <option value="">Select Status</option>
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
                        </select>
                </div>
                <div class="button">
                    <input type="submit" name="submit" value="Submit" />
                </div>
    </form>
    </div>
</div>




<script type="application/javascript">
function validateform() {
    if (document.frmappnt.select4.value == "") {
        alert("Customer name should not be empty..");
        document.frmappnt.select4.focus();
        return false;
    } else if (document.frmappnt.select3.value == "") {
        alert("Room type should not be empty..");
        document.frmappnt.select3.focus();
        return false;
    } else if (document.frmappnt.select5.value == "") {
        alert("Category name should not be empty..");
        document.frmappnt.select5.focus();
        return false;
    } else if (document.frmappnt.appointmentdate.value == "") {
        alert("Appointment date should not be empty..");
        document.frmappnt.appointmentdate.focus();
        return false;
    } else if (document.frmappnt.time.value == "") {
        alert("Appointment time should not be empty..");
        document.frmappnt.time.focus();
        return false;
    } else if (document.frmappnt.select6.value == "") {
        alert("Staff name should not be empty..");
        document.frmappnt.select6.focus();
        return false;
    } else if (document.frmappnt.select.value == "") {
        alert("Kindly select the status..");
        document.frmappnt.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>
</body>
</html>


