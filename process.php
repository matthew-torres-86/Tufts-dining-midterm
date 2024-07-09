<?php
// Start the session
session_start();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Order | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tufts Dining Hall, Tufts Dining">
    <link type="text/css" rel="stylesheet" href="style.css">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style>
    
        #thankYou {
            padding-top:150px;   
            margin-left: : 400px;
            padding-bottom: 300px;
            font-family: Arial, Helvetica, sans-serif;
            
        }
        h2 {
            font-size: 45pt;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            text-align: center;
        }
        
        p, h3 {
            padding-left: 33%;
            color: #000033;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 18pt;
        }
        
        p {
            padding-left: 35%;
            font-weight: normal;

        }

    
    </style>
</head>
<header>
    <nav>
        <div class="fullnav">
        <a href = "http://tuftsdining.infinityfreeapp.com/index.php?"><img class = "logo" src = "Tufts Dining Logo.png"></a>
        <ul>    
        <li class = "dropdown">
            <div>
            <a href="http://tuftsdining.infinityfreeapp.com/about.php?">About</a>
            <div class="dropdown-content">
                <a href="http://tuftsdining.infinityfreeapp.com/tuftonia-hall.php?">Tuftonia Hall</a>
                <a href="http://tuftsdining.infinityfreeapp.com/cafes.php?">Cafes</a>
            </div>
        </li>
        <li><a href="http://tuftsdining.infinityfreeapp.com/meal-plans.php?">Meal Plans</a></li>
        <li><a href="http://tuftsdining.infinityfreeapp.com/nutrition.php?">Nutrition</a></li>
        <li><a href="http://tuftsdining.infinityfreeapp.com/contact.php?">Contact Us</a></li>
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
        <a href = "http://tuftsdining.infinityfreeapp.com/index.php?"><img class = "logo" src = "Tufts Dining Logo.png" style= "width: 30%"></a><br>
        <li class = "dropdown" style="list-style-type: none; width: 100%;">
            <div>
            <a> Menu <img src="hamburger-icon.png" width="14px" style="bottom: 0px"></a>
            <div class="dropdown-content" style="width: 98%; ">
                <a href="http://tuftsdining.infinityfreeapp.com/about.php?">About</a>
                <a href="http://tuftsdining.infinityfreeapp.com/tuftonia-hall.php?">Tuftonia Hall</a>
                <a href="http://tuftsdining.infinityfreeapp.com/cafes.php?">Cafes</a>
                <a href="http://tuftsdining.infinityfreeapp.com/meal-plans.php?">Meal Plans</a>
                <a href="http://tuftsdining.infinityfreeapp.com/nutrition.php?">Nutrition</a>
                <a href="http://tuftsdining.infinityfreeapp.com/contact.php?">Contact Us</a>
            </div>
        </li>

    </div>
</nav>
</header>

<?php 
//establish connection info
	$server = "sql208.epizy.com";
	$userid = "epiz_30185190";
	$pw = "gZ70WRnjiyTkc";
	$db= "epiz_30185190_tuftsusers";

	$conn = mysqli_connect($server, $userid, $pw,$db);
	// Check connection
	if (!$conn) {
   		die("Connection failed: " . mysqli_connect_error());
	}
	//select the database
	$conn->select_db($db);

	//run a query
    //INSERT INTO `orders` (`UTLN`, `datetime`, `description`) VALUES ('utln', '2018-12-05 12:39:16', 'items')
    extract ($_GET);
    $col1 = "utln";
    $col2 = "datetime";
    $col3 = "description";
    $utlnToInsert = "'".$_SESSION['utln']."'";
    $_SESSION["swipes"]--;
    $newSwipes = "'".$_SESSION['swipes']."'";
	$sql = "INSERT INTO orders ($col1, $col2, $col3) values ($utlnToInsert, $dateTime , $itemsOrdered)";
	$result = $conn->query($sql);

    $sql = "UPDATE users SET swipes = $newSwipes where UTLN = '$utlnToInsert'";
	$result = $conn->query($sql);
	
	$conn->close();	
?>
<body>
    <?php 
        
        extract ($_GET);
        echo "<div id = 'thankYou'><h2>Thank You!</h2>";
        echo "<h3>You ordered...</h3>";
        echo "<script language = 'javascript'>\n"; 
        echo "itemsOrdered = $itemsOrdered;\n";
        echo "items = itemsOrdered.split(',');\n";
        echo "document.writeln('<p>');\n";
        echo "for (i = 0; i < items.length; i++) {";
        echo "document.writeln(items[i] + '<br>');}\n";
        echo "document.writeln('</p>')";
        echo "</script>";
        echo "<h3>Your order will be ready at $deliveryTime at Tuftonia Hall</h3></div>";
        
    ?>
</body>
<footer>
    <div style="display: inline-block; width: 100%;">
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
    
</footer>
</html>
