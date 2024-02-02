<?php
include("connect.php");

    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admincss.css">
    <title>LCT - Customer</title>
    <link rel="stylesheet" href="customer.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="sidebar">
        <div class="log-details">
            <a href="index.php"><img src="Images/Picture2.png"></a>
            <span class="log_name">LenientTech</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="">
                    <span class="link_name"> MAIN NAVIGATION</span>
                </a>
            </li>
            <li>
                <a href="customerdashboard.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="link_name">Dashboard</span>
                </a>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bx-calendar-check'></i>
                        <span class="link_name">Profile</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu blank">
                    <li><a class="link_name" href="">Profile</a></li>
                    <li><a href="customerprofile.php">View Profile</a></li>
                    <li><a href="customerchangepassword.php">Change Password</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bx-calendar-plus'></i>
                        <span class="link_name">Appointment</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Appointment</a></li>
                        <li><a href="customerappointment.php">Add Appointment</a></li>
                        <li><a href="viewappointment.php">View Appointments</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bxs-user-pin'></i>
                        <span class="link_name">Log Out</span>
                    </a>
                    <a href="index.php"><i class='bx bx-log-out'></i></a>
                </div>
            </li>
        </ul>
    </div>

    <script>
        let arrow = document.querySelectorAll(".arrow");
        for (var i = 0; i < arrow.length; i++) {
            arrow[i].addEventListener("click", (e)=>{
                let arrowParent = e.target.parentElement.parentElement;
                arrowParent.classList.toggle("showMenu");
            });
        }
        let sidebar = document.querySelector(".sidebar");
        console.log(sidebar);
    </script>
</body>
</html>