<?php
include("customeraccount.php");

include("connect.php");
if(!isset($_SESSION['customerid']))
{
	echo "<script>window.location='customerdashboard.php';</script>";
}

$sqlcustomer = "SELECT * FROM customers WHERE customerid='$_SESSION[customerid]' ";
$qsqlcustomer = mysqli_query($con,$sqlcustomer);
$rscustomer = mysqli_fetch_array($qsqlcustomer);

$sqlcustomerappointment = "SELECT * FROM appointment WHERE customerid='$_SESSION[customerid]' ";
$qsqlcustomerappointment = mysqli_query($con,$sqlcustomerappointment);
$rscustomerappointment = mysqli_fetch_array($qsqlcustomerappointment);
?>
<div class=" container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
    </div>




    <div class="card">
        <div class="row clearfix">
            <div class="alert bg-teal">
                <h3>Welcome , <?php echo $rscustomer['customername']; ?>! </h3>
            </div>
        </div>
                <!-- Nav tabs -->
                <div class="nav nav-tabs">
                    <div class="nav-item"><b>Registration History</b>
                        <h3>You are with us from <?php echo $rscustomerappointment['appdate']; ?>
                            <?php echo $rscustomerappointment['apptime']; ?></h3>
                    </div>
                    <div class="nav-item"><b>Appointment</b>
                        <?php
                        if(mysqli_num_rows($qsqlcustomerappointment) == 0)
                        {
                            ?>
                        <h3>Appointment records not found.. </h3>
                        <?php
                        }
                        else
                        {
                            ?>
                        <h3>Last Appointment taken on - <?php echo $rscustomerappointment['appdate']; ?>
                            <?php echo $rscustomerappointment['apptime']; ?> </h3>
                        <?php
                        }
                        ?>
                    </div>
                </div>

    </div>
</div>
