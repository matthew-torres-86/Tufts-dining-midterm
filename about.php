<?php
    session_start();
    $_SESSION['destination']="about.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>About | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts Dining Hall, About Tufts Dining">
    <link type="text/css" rel="stylesheet" href="styles.css">
	<style>
		p {
			padding-right: 30px;
			padding-bottom: 20px;
			text-align: left;
		}
        #headshots td {
            text-align: center;
        }
        #names td {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 16pt;
            color: #071d64;
            line-height: 1.7;
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
            <a href=about.php class="active">About</a>
            <div class="dropdown-content">
                <a href=tuftonia-hall.php>Tuftonia Hall</a>
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
                <a href=about.php class="active">About</a>
                <a href=tuftonia-hall.php>Tuftonia Hall</a>
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

	<div class = "backgroundLayer" style = "background-image: url(student.jpg);position: sticky; top:0;">
	<div class = "pageTitle"><h1 style = "color: #FFF">About Tufts Dining</h1></div>
	
	<div class = "aboutBlurb">	
		Welcome to a completely reimagined Tufts Dining! We decided to take the tragic Double Dining Hall Firework Fire of 2018 as an opportunity to expand and improve our meal options. Below you'll find more information about the renovation process and how Tuftonia Hall literally rose from the ashes of its predecessors. 
	</div>
	</div>
	<div class="container">
        <div class = "text" style="display:block;">
	<h2>The Double Dining Hall Firework Fire of 2018</h2>
	<p>
		During the Medford 4th of July celebration, a firework failed to detonate in the air, instead falling out of the sky, hitting a nearby utility pole and exploding over the roof of the Dewick-Macphie Dining Hall. The utility pole fell on top of the building. Snapped electrical lines and smoldering pieces of firework ignited a nearby pile of leaves and sticks, debris from a recent storm. As the fire grew, it englufed several other unlit fireworks recklessly left on the roof. Many of these fireworks exploded, but several launched into the air. They sailed through the night sky, some detonating, others smashing into Carmichael Hall. The force of the impact caused the building to collapse and light on fire, crushing the dining hall in its basement. By the time firetrucks arrived, both buildings had burnt to the ground. Miraculously, there were no injuries or casualities. The TUPD and Medford/Sommerville police are still investigating the incident.
	</p>
	<h2>Recent Renovations</h2>
	<p>
		After the rubble of Carmichael was cleared, we decided to build a new dining center. Gathering input from Tufts students, alumni and neighbors, we set about designing a spacious, luxiourous dining hall that catered to our community's needs. Now, after two years of construction, Tuftonia Hall opens its doors. Click <a href = "tuftonia-hall.html">here</a> to learn more. Because we only have one dining hall, we've drastically expanded our cafe and small eatery options. With a new pizzeria in the Joyce Cummings Center, Uphill Eats opening its doors in Lane Hall and four Coffee Carts springing up around campus, we have even more options than ever before. Check out our new options <a href = "cafes.html">here</a>.
	</p>
    <h2>Our Student Web Design Team</h2>
    <table>
        <tr id="headshots">
            <td><img src="dana.jpeg" width = "80%"/></td>
            <td><img src="klea.jpeg" width = "80%"/></td>
            <td><img src="madison.jpeg" width = "80%"/></td>
            <td><img src="mattTorres.jpeg" width = "80%"/></td>
        </tr>
        <tr id="names">
            <td>Dana Estra</td>
            <td>Klea Hysenbelli</td>
            <td>Madison Red</td>
            <td>Matthew Torres</td>    
        </tr>
    </table>
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