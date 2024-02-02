<?php

include("customeraccount.php");
session_start();
include("connect.php");
if(isset($_POST['submit']))
{
		if(isset($_GET['editid']))
		{
			$sql ="UPDATE appointment SET customerid='$_POST[select4]',categoryid='$_POST[select5]',appdate='$_POST[appdate]',apptime='$_POST[apptime]',staffid='$_POST[select6]',status='$_POST[select]' WHERE appointmentid='$_GET[editid]'";
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
			$sql ="INSERT INTO appointment(customerid,categoryid,appdate,apptime,staffid,status) values('$_POST[select4]','$_POST[select5]','$_POST[appdate]','$_POST[apptime]','$_POST[select6]','$_POST[select]')";
			if($qsql = mysqli_query($con,$sql))
			{
				echo "<script>alert('Appointment record inserted successfully...');</script>";
			}
			else
			{
				echo mysqli_error($con);
			}
		}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
}
?>

<div class="wrapper col2">
  <div id="breadcrumb">
   
      <h1></h1>
  </div>
</div>





<div class="container-fluid">
	<div class="block-header-2">
            <h2>Customer Report Panel</h2>
        </div>
  <div class="card">
    <p>
    
    <!-- jQuery Library -->
<script src="js/jquery.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) { 

	// Find the toggles and hide their content
	$('.toggle').each(function(){
		$(this).find('.toggle-content').hide();
	});

	// When a toggle is clicked (activated) show their content
	$('.toggle a.toggle-trigger').click(function(){
		var el = $(this), parent = el.closest('.toggle');

		if( el.hasClass('active') )
		{
			parent.find('.toggle-content').slideToggle();
			el.removeClass('active');
		}
		else
		{
			parent.find('.toggle-content').slideToggle();
			el.addClass('active');
		}
		return false;
	});

});  //End
</script>
<!-- Toggle CSS -->
<style type="text/css">

/* Main toggle */
.toggle { 
	font-size: 13px;
	line-height:20px;
	font-family: "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
	background: #ffffff; /* Main background */
	margin-bottom: 10px;
	border: 1px solid #e5e5e5;
	-webkit-border-radius: 5px;
	   -moz-border-radius: 5px;
	        border-radius: 5px;	
}

/* Toggle Link text */
.toggle a.toggle-trigger {
	display:block;
	padding: 10px 20px 15px 20px;
	position:relative;
	text-decoration: none;
	color: #666;
}

/* Toggle Link hover state */
.toggle a.toggle-trigger:hover {
	opacity: .8;
	text-decoration: none;
}

/* Toggle link when clicked */
.toggle a.active {
	text-decoration: none;
	border-bottom: 1px solid #e5e5e5;
	-webkit-box-shadow: 0 8px 6px -6px #ccc;
	   -moz-box-shadow: 0 8px 6px -6px #ccc;
	        box-shadow: 0 8px 6px -6px #ccc;
	color: #000;
}

/* Lets add a "-" before the toggle link */
.toggle a.toggle-trigger:before {
	content: "-";	/* You can add any symbol, font icon, or graphic icon */
	margin-right: 10px;
	font-size: 1.3em;	
}

/* When the toggle is active, change the "-" to a "+" */
.toggle a.active.toggle-trigger:before {
	content: "+";
}

/* The content of the toggle */
.toggle .toggle-content {
	padding: 10px 20px 15px 20px;
	color:#666;
}

</style>
<!-- Toggle #1 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Customer Profile</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("customerdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

<!-- Toggle #2 -->
<div class="toggle">
	<!-- Toggle Link -->
	<a href="#" title="Title of Toggle" class="toggle-trigger">Appointment record</a>
	<!-- Toggle Content to display -->
	<div class="toggle-content">
		<p><?php include("appointmentdetail.php"); ?></p>
	</div><!-- .toggle-content (end) -->
</div><!-- .toggle (end) -->

    </p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
