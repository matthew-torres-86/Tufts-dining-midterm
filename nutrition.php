<?php
    session_start();
    $_SESSION['destination']="nutrition.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Nutrition | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tufts Dining Hall, Tufts Dining, Nutrition">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style type="text/css">
    
        .background{
            width: 100%;
            z-index: -1; 
            overflow-x: hidden;
        }
        
        .text{
            background-color: #FFF;
            /*padding-left: 100px;
            padding-right: 100px;*/
            display: block;
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
                <a href=cafes.php>Cafes</a>
            </div>
        </li>
        <li><a href=meal-plans.php>Meal Plans</a></li>
        <li><a href=nutrition.php class="active">Nutrition</a></li>
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
                <a href=cafes.php>Cafes</a>
                <a href=meal-plans.php>Meal Plans</a>
                <a href=nutrition.php class="active">Nutrition</a>
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
    <div class = "backgroundLayer" style = "background-image: url(nutrition.jpg);">
    	<div class = "pageTitle"><h1 style = "color: #FFF">Nutrition</h1></div>
    	
    	<div class = "aboutBlurb">	
    		  We pride ourselves in offering high-quality meals that support a healthy lifestyle. Take a look at the tips below to see how we've redesigned our food options with nutrition in mind.
    	</div>
    	</div>
        <div class="container">
        
        <div class = "text">
          <h2>1.   The Sour Truth About Sugar</h2>
    		<p>
    			Nutritionists have linked diets high in sugar to diabetes, heart disease, and chronic pain. People who drink more than two sodas a day even have shorter life expectancies than those who consume less sugary beverages. The bottom line? Sugar, in high doses, is bad for your health. That's why our dining halls offer a variety of delicious, low-sugar foods. Meals at Tuftonia Hall contain 50% less sugar than the meals at Carmichael and Dewick. At Kindlevan and Uphill Eats, we've changed our smoothie and smoothie bowl recipes. Now our signature blends are sweetened only with natural ingredients, like honey and pineapple juice. And for those with a sweet tooth, we're offering vegan, reduced-sugar treat bars with added fiber at the Coffee Carts around campus. With Tufts Dining looking out for your health, you'll never have to worry about your sugar-intake again!

    		</p>
    	  <h2>2.   Hydrate or Diedrate</h2>
    		<p>
    			Did you know that you should drink between 2.7 and 3.7 liters of water a day? Drinking water helps support all of your bodily functions. After all, people are 60% water. So how is Tufts Dining helping you get your daily H2O? Tuftonia Hall as well as our other eat-in dining options are equipped with new water bottle filling stations. No more spending JumboCash on plastic water bottles because a reusable water bottle is included in your meal plan. Drop by our office to pick yours up today! Additionally, next to these filling stations you'll find hot water taps. Tea and hot cocoa drinkers, you'll never have to swipe into a dining hall again to refill your cup.

    		</p>
    	  <h2>3.   Spice Up Your Diet</h2>
    		<p>
    			Eating a wide variety of foods is imperative. The quality and types of food you choose are important as well. After all, 75% of your plate should be made up of vegetables. Lean proteins, like chicken breasts, and foods high in omega-3 fatty acids, like avocados, are also good choices. Here at Tufts Dining, our mission is to provide you with delicious meals, but also with the power to make healthy choices when it comes to your food. That's why we serve a wide variety of fruits and vegetables in all of our cafes and restaurants. Try the spicy-garlic green beans in Tuftonia Hall or the cauliflower pizza at the pi-zzeria. Uphill Eats' green monster smoothie bowl is an excellent source of vitamins and nutrients, like vitamin-c and iron. And our selections are constantly evolving. If you'd like to see a new menu item feel free to contact us <a href="contact.html">here</a>.

    		</p>
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