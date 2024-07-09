<?php
    session_start();
    $_SESSION['destination']="cafes.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cafes | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tufts Dining Hall, Tufts Dining, Tufts Cafes, Kindlevan, Uphill Eats, Pizzeria, Coffee Cart">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style>
        #cafe{
			width:50%;
		}
		.information{
            margin-left: 2.5%;
            margin-right: 2.5%;
            line-height: 1.7;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        h1{
            color: #2e6aaa;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        h2{
            color: #2e6aaa;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        }
        img:hover{
            opacity: 30%;
        }
		p {
			text-align: justify;
            font-size: 14pt;
            
		}
        div{
             display: block;
             position: relative;
             text-align: center;
        }   
        div img{
            z-index: 5;
        }
        div:hover p{
            visibility: visible;
        }
        div h2{
            position: absolute;
            padding: 10px;
            top: 10%;
            left: 50%;
            background-color: rgba(30, 30, 30, 0.5);
            transform: translate(-50%, -50%);
            
        }
        div p{
            position: absolute;
            visibility: hidden;
            top: 50%;
            left: 50%;
            padding: 10px;
            z-index: 1;
            background-color: rgba(51, 51, 51, 0.5);
            transform: translate(-50%, -50%);
            color: #2e6aaa;
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
                <a href=tuftonia-hall.php>Tuftonia Hall</a>
                <a href=cafes.php class="active">Cafes</a>
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
                <a href=tuftonia-hall.php>Tuftonia Hall</a>
                <a href=cafes.php class="active">Cafes</a>
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
	<div class = "backgroundLayer" style = "background-image: url(inside-cafe.jpg);">
	<div class = "pageTitle"><h1 style = "color: #FFF">Cafes + Restaurants</h1></div>
	
	<div class = "aboutBlurb">	
		 We've redefined what college campus dining looks like. With a coal-fire pizzeria, smoothie bowl cafe, local business takeovers and pop-up coffee shops, delicious options are right around the corner. Learn all about our brand-new a la carte and sit-down meal options below.
	</div>
	</div>
	<div class = "container" style="padding-left:0px; padding-right:0px; vertical-align: middle">
		<div class="cafe">
        <img src="danish_pastry.png" height="600px" >
        <p>Join us every Tuesday and Thursday as your favorite corner bakery takes over Kindlevan Cafe. In addition to our typical coffee and smoothie selection, we'll serve an assortment of homemade pastries and sandwiches. From poppy seed studded tebirkes and spinach croissants to adorable marzipan frogs and chocolate cupcakes sprinkled with gold, we'll have the perfect sweet or savory treat to fuel your study session. We'll also be offering several of The Danish Pastry House's specialty drinks like their Thin Mint Latte, Gingerbread Macchiato and Kiwi Limeade. So stop by the SEC between 8am and 8pm on Tuesdays or Thursdays to grab a delicious meal and support a local business. </p>
    </div>
    <div class="cafe">
    <img src="uphill_eats.jpg" height="600px" >  
        <p>Tired of walking all the way downhill for a decent cup of coffee? Now you don't have to! With the opening of Uphill Eats, you can enjoy your favorite drinks from Kindlevan and Hotung in addition to exciting new choices, like our blackberry refresher or caramel hazelnut mocha. We also have a customizable smoothie bowl bar. Choose from a base of acai, whipped coconut, blended greens, or creamy banana. Then, pick a few toppings. We have fresh berries, sliced nuts, granola, Nutella, and more. Located inside Lane Hall, we're open Wednesday through Sunday 7am to 2pm. </p>     
    </div>

    <div class="cafe">
    <img src="coffee-cart.png" height="600px" >
        <p>Need a quick snack on the way to class? Or maybe something sweet after a long study session. Swing by the Coffee Cart, a coffee stand offering a variety of hot and cold drinks, as well as soft pretzels and cinnamon sugar twists. With four locations around campus, grabbing a cup of joe has never been easier. You can find us on the Tisch Roof, beside Olin Hall, outside Granoff Music Center, and across from the Tisch Sports Center. Open 7am to 10pm.</p>
    </div>

    <div class="cafe">
    <img src="pizerria.png" height="600px" >
        <p>With the opening of the Joyce Cummings Center comes a brand new dining experience. Say hello to the pi-zzeria, your made-to order pizza destination. We have an in-house coal-fire oven, which gives our pizza its signature pillowy, yet crunchy crust. Our sauce is made fresh daily with tomatoes from local farms. Can't eat gluten or dairy? No problem. We offer a wonderful gluten-free crust as well as melt-in-your mouth vegan mozzarella. And to finish off your meal, we have a selection of refreshing sorbets. Open Monday through Sunday 12pm to 8pm.</p>
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