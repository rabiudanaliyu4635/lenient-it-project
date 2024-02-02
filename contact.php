<?php 
include("header.php"); 
error_reporting(E_ALL ^ E_NOTICE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenient Computer Technology</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<?php
    $name = $_POST['name'];
    $visitor_email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = 'http://localhost/Sample/Lenient/contact.php';

    $email_subject = "Feedback from Customer";

    $email_body = "User Name: $name.\n". 
                    "User Email: $visitor_email.\n". 
                    "User Message: $message.\n";
    
    $to = "csrabiualiyu001@gmail.com";
    $headers = "From: $email_from \r\n";
    $headers .= "Reply-To: $visitor_email \r\n";

    mail($to,$email_subject,$email_body,$headers);
    //header("Location: contact.php");
?>
<div class="section">
<div class="container">
    <div class="title">SAY HELLO!</div><br>
    <p align="center">WE ARE ALWAYS READY TO SERVE YOU!</p>
    <form action="" method="post" onSubmit="return validateform()">
        <div class="user-details">
            <div class="input-box">
                <span class="details">Full Name</span>
                <input type="text" name="name" placeholder="Enter your name" required>
            </div>
            <div class="input-box">
                <span class="details">Email Address</span>
                <input type="text" name="email" placeholder="Enter your email address" required>
            </div>
            <div class="input-box">
                    <span class="details">Message</span>
                    <textarea rows="4" cols="99" type="text" name="message" placeholder="Write your message" required></textarea>
            </div>
        </div> 
        <div class="button">
            <input type="submit" name="submit" value="SEND MESSAGE">
        </div>
    </form>
</div>
</div> 
</body>
</html>

<?php
include("footer.php");
?>