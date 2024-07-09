<?php
    session_start();
    $_SESSION['destination']="tuftonia-hall.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tuftonia Hall | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tuftonia Hall, Tuftonia Dining Hall, Tuftonia Dining Menu, Tuftonia Menu">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style type="text/css">
        .column{
            float:left;
            text-align: left;
            height: fit-content;
        }
        
        .center p, .center h2{
            padding-left: 30px;
            font-size: 24px;
        }
        
        @media screen and (max-width: 649px){
        .row {
            display: block;
        }
        .column{
            width: 98%;
        }
        .pic .info{
            padding-left: 10%;
            padding-right: 10%;
            text-align: left;
            height: fit-content;
        }

        }
        @media screen and (min-width: 650px){
        .row {
            display: table;
            clear: both;
        }
        .column{
            width: 40%;
        }
        .pic {
            padding-left: 10%;
            text-align: left;
            height: fit-content;
        }
        .info {
            padding-right: 10%;
            text-align: left;
            height: fit-content;
        }
        }


        img.food {
            width: 95%;
            padding: 2.5%;
        }
    </style>   
</head>
<header>
    <nav>
        <div class="fullnav">
        <a href = index.php><img class = "logo" src = "Tufts Dining Logo.png"></a>
        <ul>    
        <li class = "dropdown">
            <div>
            <a href=about.php>About</a>
            <div class="dropdown-content">
                <a href=tuftonia-hall.php class="active">Tuftonia Hall</a>
                <a href=cafes.php>Cafes</a>
            </div>
        </li>
        <li><a href=meal-plans.php>Meal Plans</a></li>
        <li><a href=nutrition.php>Nutrition</a></li>
        <li><a href=contact.php>Contact Us</a></li>
        <li class="dropdown" style="float: right" >
        <?php if($_SESSION["loggedin"]==="true")
        {
            echo "<div><a href=profile.php style='color: #071d64'>Hi ".$_SESSION["fname"]."!</a>
            <div class='dropdown-content'>
                <a href=profile.php>My Profile</a>
                <a href=order.php>Order Online</a>
                <a href=logout.php>Logout</a>
            </div></div>";
        }
        else{
            echo "<a href=login.php style='color: #071d64'>Login</a>";
            }
            ?>
        </li>
        
    </ul></div>

    <div class="mobilenav">
        <a href = index.php><img class = "logo" src = "Tufts Dining Logo.png" style= "width: 30%"></a><br>
        <li class = "dropdown" style="list-style-type: none; width: 100%;">
            <div>
            <a> Menu <img src="hamburger-icon.png" width="14px" style="bottom: 0px"></a>
            <div class="dropdown-content" style="width: 98%; ">
                <a href=about.php >About</a>
                <a href=tuftonia-hall.php class="active">Tuftonia Hall</a>
                <a href=cafes.php>Cafes</a>
                <a href=meal-plans.php>Meal Plans</a>
                <a href=nutrition.php>Nutrition</a>
                <a href=contact.php>Contact Us</a>
                <?php if($_SESSION["loggedin"]==="true")
            {
            echo "<a href=profile.php>My Profile</a>";
            echo "<a href=order.php>Order Online</a>";
            echo "<a href=logout.php>Logout</a>";
        }
        else{
            echo "<a href=login.php style='color: #071d64'>Login</a>";
            }
            ?>
            </div>
        </li>

    </div>

</nav>
</header>
<body>
    <div >
    <div class = "backgroundLayer" style = "background-image: url(tuftoniaSlideShow.jpg);">
	<div class = "pageTitle"><h1 style = "color: #FFF">Tuftonia Hall</h1></div>
	<div class = "aboutBlurb">	
        Welcome to Tuftonia Hall! The newest dining hall on campus. Let us 
        bathe you in our culinary delights, ranging from Caribbean, Mediterranean to authentically American. Tuftonia is a dining hall for all seasons and all tastes.</a>
	</div>
</div>
</br>
<div class="container">
    <div style="display: block;">
    <h2> About Tuftonia Hall </h2>
    <p> High ceilings, urban architecture, and comfortable seating. Come visit Tuftonia Hall, our newly constructed dining hall. Opened in October 2021, 
    this new dining hall offers more meal options than the old Carmichael and 
    Dewick halls combined. Some of our specialties include Mediterranean Monday, Taco Tuesday, Saturday Sushi Supper. Stop by 200 Packard Ave any day of the week between 8am and 9pm to experience what the most luxiourous eating option on campus has to offer! </p>
    <h2> Online ordering </h2>
    <p> You can now enjoy our delicious Tuftonia Hall menu items anywhere on campus with <a href=order.php>Tuftonia to-go online ordering.</a> We'll package up your selection of food items and you can come to our pickup window to recieve your food.</p>
    <h2> A Few Menu Highlights </h2>
    <div class="table">
        <div class="row">
            <div class="column pic">
                <img class="food" src="couscous2.jpg"/>            
            </div>
            
            <div class="column info">
                <div class="center">
                    <h2>Israeli Couscous Salad with Feta, Chickpeas, and Herbs</h2>
                    <p>This special Israeli couscous, otherwise known as pearl couscous, is a 
                    pasta shaped into grain-like balls with a chewy and delicate flavor that
                     is so easy to enjoy.</p>
                     
                </div>
            </div>
            
            
            
        </div>
        </div>
        <div class="row">

            <div class="column pic">
                <img class="food" src="nicoise2.jpg"/>            
            </div>
            <div class="column info">
                <div class="center">
                    <h2>Summery Salmon Nicoise Salad</h2>
                  <p>Our classic award winning recipe which replaces the typical tuna for 
                   warm and softly baked salmon fillets. Delight in this abundance of colors,
                   vegetables, and nutritious ingredients. This recipe will not disappoint!</p> 

                </div>
            </div>
            
            
        </div>
        <div class="row">
            <div class="column pic">
                <img class="food" src="hummus2.jpg"/>            
            </div>
            
            <div class="column info">
                <div class="center">
                    <h2>Mediterranean Hummus Bowl</h2>
                    <p>A wholesome, well-balanced dinner that supports a healthy body and mind. 
                    Our Hummus Bowl combines our homemade hummus and pita chips with an assortment
                    of vegetables and other delights. </p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<footer>
    <div class = "fullFooter">
    <ul>
        <li><a href = "https://www.tufts.edu/" target="_blank">Tufts University</a></li>
        <li><a href = "http://as.tufts.edu/" target="_blank">School of Arts and Sciences</a></li>
        <li><a href = "https://engineering.tufts.edu/" target="_blank">School of Engineering</a></li>
        <li><a href = "https://medicine.tufts.edu/" target="_blank">School of Medicine</a></li>
        <li><a href = "https://dental.tufts.edu/" target="_blank">School of Dental Medicine</a></li>
        <li><a href = "https://vet.tufts.edu/" target="_blank">School of Veterinary Medicine</a></li>
        <li><a href="https://www.tufts.edu/about/privacy">Privacy</a></li>
    </ul>
    <div class="copyright" style="font-size: 12px;">
        &copy; Error 404: D. Estra, K. Hysenbelli, M. Red, M. Torres.
    </div>
</div>
    <div class = "mobileFooter">
        <ul>
            <li><a href = "https://www.tufts.edu/" target="_blank">Tufts University</a></li>
            <li><a href = "http://as.tufts.edu/" target="_blank">School of Arts and Sciences</a></li>
            <li><a href = "https://engineering.tufts.edu/" target="_blank">School of Engineering</a></li>
        </ul>
        <br>
        <ul>
            <li><a href = "https://medicine.tufts.edu/" target="_blank">School of Medicine</a></li>
            <li><a href = "https://dental.tufts.edu/" target="_blank">School of Dental Medicine</a></li>
            <li><a href = "https://vet.tufts.edu/" target="_blank">School of Veterinary Medicine</a></li>
            <li><a href="https://www.tufts.edu/about/privacy">Privacy</a></li>
        </ul>
        <div class="copyright" style="font-size: 12px;">
            &copy; Error 404: D. Estra, K. Hysenbelli, M. Red, M. Torres.
        </div>
</div>
    
</footer>
</html>