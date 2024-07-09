<?php
    session_start();
    $_SESSION['destination']="meal-plans.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Meal Plans | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tufts Dining Hall, Tufts Dining, Meal Plans, Prices">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style>
        .content{
            margin-left: 35px;
            margin-right: 35px;
            z-index: 10;
            background-color: #fff;
        }
        h2, h3, p, td, th {
            font-family: sans-serif; 
            text-align:left;
        }
        h2, h3 { 
            color: #3f8fe5;
            font-size: 40px;
        }
        h3 {
            font-size: 25px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td, table th {
             border: 1px solid black;
             padding: 8px;
        }

        table tr:hover {background-color: #ddd;}

        table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #3f8fe5;
            color: white;
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
        <li><a href=meal-plans.php class="active">Meal Plans</a></li>
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
                <a href=cafes.php>Cafes</a>
                <a href=meal-plans.php class="active">Meal Plans</a>
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
    <div style = "position:sticky; background-color: #fff; top:0; z-index: -1;" >
    <div class = "backgroundLayer" style = "background-image: url(meal-plans.jpg);">
	<div class = "pageTitle"><h1 style = "color: #FFF">Meal Plans </h1></div>
	<div class = "aboutBlurb">	
        Do you like to eat 3 meals a day in the dining hall? Or are you more of a cooking at home kind of person? It doesn't matter how often you swipe, we have the perfect plan for you! 
	</div>
    </div>
    </div>
<div class="container">
<div class="content">
<div>
    <div><h2>Meal Plans</h2></div>
    <p>
        All first-years are automatically enrolled in the Jumbo Plan. All other
        students must indicate their plan (or that they will not be 
        purchasing a meal plan) on SIS before the start of each semester.
    </p>
</div>


<div>
    <div>
    <table>
    <tr>
        <th>Plan Name</th>
        <th>Swipes Per Semester</th>
        <th>Cost</th>
    </tr>
    <tr>
        <td>Jumbo Plan</td>
        <td>Infinite</td>
        <td>$2500</td>
    </tr>
    <tr>
        <td>Joey Plan</td>
        <td>220</td>
        <td>$2000</td>
    </tr>
    <tr>
        <td>I-Have-A-Kitchen Plan</td>
        <td>110</td>
        <td>$1400</td>
    </tr>
    </table>
    </div>
    
</div>

<div>
    <h2>FAQ</h2>
    <div><h3>Where can I use my meal swipes?</h3></div>
    <div><p>You can use meal swipes at any dining location on campus. That's 
    right! Meal swipes can be used at Tuftonia Hall, Kindlevan, Danish Pastry House, Uphill Eats, the Coffee Cart, and at the pi-zzeria.</p></div>

    <div><h3>How many meal swipes can I use per day?</h3></div>
    <div><p>You can use up to eight meal swipes per day! Meal swipes are not limited to meal periods, meaning if you so desire, you could use all 8 meal swipes on breakfast!</p></div>

    <div><h3>How do meal swipes work at retail locations?</h3></div>
    <div><p>Meal swipes have a meal-equivalency value of $15 at each of the retail locations. This means, you can purchase $15 worth of food at any retail location at any time with each swipe</p></div>
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