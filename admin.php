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
    <title>LCT - Admin</title>
    <link rel="stylesheet" href="admincss.css">
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
                <a href="admindashboard.php">
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
                    <li><a href="adminprofile.php">Admin Profile</a></li>
                    <li><a href="adminchangepassword.php">Change Password</a></li>
                    <li><a href="addamin.php">Add Admin</a></li>
                    <li><a href="viewadmin.php">View Admin</a></li>
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
                        <li><a href="appointment.php">New Appointment</a></li>
                        <li><a href="viewpendingappointment.php">View Pending Appointments</a></li>
                        <li><a href="viewapprovedappointment.php">View Approved Appointments</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bxs-user-plus'></i>
                        <span class="link_name">Staff</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Staff</a></li>
                        <li><a href="staff.php">Add Staff</a></li>
                        <li><a href="viewstaff.php">View Staff</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bx-user'></i>
                        <span class="link_name">Customers</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Customers</a></li>
                        <li><a href="customer.php">Add Customer</a></li>
                        <li><a href="viewcustomers.php">View Customer Records</a></li>
                </ul>
            </li>
            <li>
                <div class="icons-links">
                    <a href="">
                    <i class='bx bx-category'></i>
                        <span class="link_name">Services</span>
                    </a>
                    <i class='bx bx-chevron-down arrow'></i>
                </div>
                <ul class="sub-menu">
                        <li><a class="link_name" href="">Services</a></li>
                        <li><a href="department.php">Add Department</a></li>
                        <li><a href="viewdepartment.php">View Department</a></li>
                </ul>
            </li>
        <li>
        <div class="profile-details">
            <div class="profile-content">
                <img src="Images/Rabiu-removebg-preview.png">
            </div>
            <div class="name-job">
                <div class="profile-name"><?php $query="select name from adminlogin where name='".$_SESSION['name']."'";
                                                $qsql = mysqli_query($con,$query);
                                                echo mysqli_fetch_array($qsql);?>Rabiu Aliyu</div>
                <div class="job">Admin</div>
            </div>
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