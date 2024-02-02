<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        .section{
            width: 100%;
            min-height: 100vh;
            background-color: rgb(241, 255, 255)
        }
        .container{
            width: 80%;
            display: block;
            margin: auto;
            padding-top: 100px;
        }
        .content-section{
            float: left;
            width: 55%;
        }
        .image-section{
            float: right;
            width: 44%;
        }
        .image-section img{
            width: 100%;
            height: auto;
        }
        .content-section .title{
            text-transform: uppercase;
            font-size: 28px;
        }
        .content-section .content h3{
            margin-top: 20px;
            color: #5d5d5d;
            font-size: 21px;
        }
        .content-section .content p{
            margin-top: 10px;
            font-family: sans-serif;
            font-size: 18px;
            line-height: 1.5;
        }
        .content-section .content .button{
            margin-top: 20px;
        }
        .content-section .content .button a{
            display: inline-block;
            text-decoration: none;
            color: black;
            border: 1px solid black;
            padding: 12px 34px;
            font-size: 13px;
            background: transparent;
            position: relative;
            cursor: pointer;
        }
        .content-section .content .button a:hover{
            border: 1px solid #005bc4;
            background: #005bc4;
            transition: 1s;
        }
        .social {
            margin: 0 13px;
            cursor: pointer;
            padding: 18px 0;
            }

        .social img{
            width: 20px;
            height: 20px;
        }
    </style>
</head>
<body>
    <!---About Us--->
    <div class="section">
    <section class="container">
        <div class="content-section">
            <div class="title">
                <h1>About Us</h1>
            </div>
            <div class="content">
                <h3>Lenient Computer Technology was established in 2005.</h3>
                <p>Our company first mainly worked remotely, JAMB CBT Center, NIMC registration center, BVN Enrollement and Account Opening. Theses services provided by expert and skilled staff, to inspire enough about digital world that make things paperless, to improve the happiness of our customers by reducing congestion and providing efficient services at ease.</p>
                <div class="button">
                    <a href="">Read More</a>
                </div>
            </div>
            <div class="social">
                <img src="Images/Facebook_f_logo_(2021).svg.png">
                <img src="Images/twitter-removebg-preview.png">
                <img src="Images/instagram.png">
                <img src="Images/LinkedIn_icon_circle.svg.png">
            </div>
        </div>
        <div class="image-section">
                <img src="Images/computer-user-2.jpg">
        </div>
    </section>
    </div>
    
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