<?php 
   error_reporting(E_ALL ^ E_NOTICE); 
?>
<?php
// Create connection
$con= new mysqli('localhost','root','','lenient');

// Check connection
if (!$con) {
  die(mysqli_error($con));
}
  
?>