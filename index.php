<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenient Computer Technology</title>
    <link rel="stylesheet" href="teststyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,600;1,100;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    
</head>
<body>
    <!----Header---->
    <section class="header">
        <nav>
            <a href="index.php"><img src="Images/Logo2.png"></a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.php">ABOUT US</a></li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li><a href="contact.php">CONTACT</a></li>
                    <li><a href="customerappointment.php">REGISTER</a></li>
                    <li><a href="#">LOG IN</a>
                        <div class="sub-menu-1">
                            <ul>
                                <li><a href="adminlogin.php">Admin</a></li>
                                <li><a href="customerlogin.php">Customer</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="text-box">
                <h1><b>HOME OF ICT SOLUTIONS</b></h1>
                <p>Our Priority is to make things simpler and fast to solve your problem on ICT Solution, <br> Your Ease to see it solved.</p>
                <h2>Pre-Registration Portal</h2><br>
                <a href="about.php" class="here-btn">- Visit Us To Know More -</a>
        </div>
    </section>

    <!--services-->
    <section class="services">
        <h1>Our Services</h1>
        <p>We offer the following services: </p>
        <div class="row">
            <div class="services-col">
                <h3>JAMB CBT Registration Center</h3>
                <p>We are certified Computer Best Test (CBT) center for Matriculation
                    Examination and the placement of suitably qualified candidates
                    into the tertiary institution under Joint Admission and 
                    Matriculation Board (JAMB). </p>
            </div>
            <div class="services-col">
                <h3>NIMC Registration Center</h3>
                <p>We are certified National Identification Number (NIN) Registration 
                    Center for Nigerian Citizen under National Identification
                    Management Commission (NIMC). </p>
            </div>
            <div class="services-col">
                <h3>BVN Registration Center</h3>
                <p>We are agents with NIBSS for BVN Registration and account opening 
                    of any suitable bank of your choise. </p>
            </div>
            <div class="services-col">
                <h3>Type setting and Graphics Design</h3>
                <p>We specialized in type setting both Arabic and English Typing.
                    We also specialized in many Graphics Design such as: Logo creation,
                    Badge, Flyers, Banners, Bill Board, Award. </p>
            </div>

        </div>
    </section>

    <!----centers---->
    <section class="centers">
            <h1>Our Branches</h1>
            <p>JAMB Examination Center, NIMC Registration Center, BVN Registration.</p>

            <div class="row">
                <div class="centers-column">
                    <img src="images/JAMB-center.jpg">
                    <div class="layer">
                        <h3>JAMB Exam Center</h3>
                    </div>
                </div>
                <div class="centers-column">
                    <img src="images/nimc.jpg">
                    <div class="layer">
                        <h3>NIMC Registration Center</h3>
                    </div>
                </div>
                <div class="centers-column">
                    <img src="images/BVN-microfinance-banks.jpg">
                    <div class="layer">
                        <h3>BVN Registration Center</h3>
                    </div>
                </div>
            </div>
    </section>
    <!---Board Management--->
    <section class="management">
        <h1>Our Board Management</h1>
        <p>We have the specialized and competent management staff</p>
            <div class="row">
                <div class="management-col">
                    <img src="Images/Alhajijo-removebg-preview.png">
                    <h3>Managing Director/CEO</h3>
                    <p><b>Alhajijo Muhammad Ahmad (PhD)</b> <br>PhD in Operational Research, M.Sc Operational Research, B.Sc Operational Research
                        and Diploma in Computer Science.</p>
                </div>
                <div class="management-col">
                    <img src="Images/Abba-removebg-preview.png">
                    <h3>General Manager</h3>
                    <p><b>Abdulrazaq Abubakar Usman</b> <br>B.Sc Software Engineering and Diploma in English Language Education.</p>
                </div>
            </div>
            <div class="row">
                <div class="management-col">
                    <img src="Images/Rabiu-removebg-preview.png">
                    <h3>Project Manager</h3>
                    <p><b>Rabiu Aliyu</b>  <br>B.Sc Computer Science and Diploma in Islamic/English Education.</p>
                </div>
                <div class="management-col">
                    <img src="Images/BELLO (RED).jpg">
                    <h3>Secretary</h3>
                    <p><b>Muhammad Bakari Ma'aji</b> <br>B.Sc Cyber Security and Diploma in English Language Education.</p>
                </div>
            </div>
    </section>

    <!--Call to Action-->
    <section class="cta">
        <h1>Enroll for our e-Registration Portal <br>Anywhere from the Country</h1>
        <a href="contact.php" class="here-btn">CONTACT US</a>
    </section>

    <!--Footer-->

<?php include 'footer.php'; ?>


    <!--JavaScript for toggle menu-->
    <script>
        var navLinks = document.getElementById("navLinks");

        function showMenu(){
            navLinks.style.right = "0";
        }
        function hideMenu(){
            navLinks.style.right = "-200px";
        }

    </script>
</body>
</html>
