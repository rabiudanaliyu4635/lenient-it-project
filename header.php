<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lenient Computer Technology</title>
    <style>
        *{
           margin: 0;
           padding: 0;
           font-family: 'Poppins', sans-serif;
           
        }
body{background-color: rgb(241, 255, 255)}
        .header{
    min-height: 10vh;
    width: 100%;
    background-image: linear-gradient(rgba(4,9,30,0.7),rgba(4,9,30,0.7)), url(Images/computer8.jpg);
    background-position: center;
    background-size: cover;
    position: fixed;
}

nav{
    display: flex;
    padding: 2% 6%;
    justify-content: space-between;
    align-items: center;
}
nav img{
    width: 150px;
}
.nav-links{
    flex: 1;
    text-align: right;
}
.nav-links ul li{
    list-style: none;
    display: inline-block;
    padding: 8px 12px;
    position: relative;
    overflow: hidden;


}
.nav-links ul li a{
    color: #fff;
    text-decoration: none;
    font-size: 16px;
}
.nav-links ul li::after{
    content: '';
    width: 0%;
    height: 2px;
    background: #005bc4;
    display: block;
    margin: auto;
    transition: 0.5s;
}
.nav-links ul li:hover::after{
    width: 100%;
}
.sub-menu-1 ul li{
    display: none;
}
.nav-links li:hover > .sub-menu-1 ul li{
    display: block;
}
.nav-links li:hover > .sub-menu-1{
    perspective: 1000px;
}
.nav-links li:hover > .sub-menu-1 li{
    transform-origin: top center;
    opacity: 0;
}
.nav-links li:hover > .sub-menu-1 li:nth-child(1){
    animation: animate 300ms ease-in-out forwards;
    animation-delay: -150ms;
}
.nav-links li:hover > .sub-menu-1 li:nth-child(2){
    animation: animate 300ms ease-in-out forwards;
    animation-delay: 0ms;
}
@keyframes animate {
    0% {
        opacity: 0;
        transform: rotateX(-90deg);
    }
    50%{
        transform: rotateX(20deg);
    }
    100%{
        opacity: 1;
        transform: rotateX(0deg);
    }
}

        @media(max-width: 700px){
            .text-box h1{
                font-size: 20px;
            }
            .nav-links ul li{
                display: block;
            }
            .nav-links{
                position: absolute;
                background: #005bc4;
                height: 100vh;
                width: 200px;
                top: 0;
                right: -40px;
                text-align: left;
                z-index: 2;
                transition: 1s;
            }
            nav .fa{
                display: block;
                color: #fff;
                margin: 20px;
                font-size: 20px;
                cursor: pointer;
            }
            .nav-links ul{
                padding: 30px;
                
            }
        }
    </style>
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
    </section>
    <br><br><br><br><br><br><br><br><br>
</body>
</html>