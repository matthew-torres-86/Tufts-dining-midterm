<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>My Profile | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts Dining Hall, About Tufts Dining">
    <link type="text/css" rel="stylesheet" href="styles.css">
	<style>
        /* .container {
            padding-top: 0px;
            display: flex;
        } */
        .content{
            margin-left: 35px;
            margin-right: 35px;
            z-index: 10;
            background-color: #fff;
            /* height: 700px; */
        }
        h2, h3, p, td, th {
                font-family: sans-serif; 
                text-align:center;
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
        <li><a href=meal-plans.php>Meal Plans</a></li>
        <li><a href=nutrition.php>Nutrition</a></li>
        <li><a href=contact.php>Contact Us</a></li>
        <li class="dropdown" style="float: right" >
        <?php if($_SESSION["loggedin"]==="true")
        {
            echo "<div><a href=profile.php style='color: #071d64'>Hi ".$_SESSION["fname"]."!</a>
            <div class='dropdown-content'>
                <a href=profile.php class='active'>My Profile</a>
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
                    <a href=nutrition.php>Nutrition</a>
                    <a href=contact.php>Contact Us</a>
                    <?php if($_SESSION["loggedin"]==="true")
                {
                echo "<a href=profile.php class='active'>My Profile</a>";
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
    <!-- <div style = "position:sticky; background-color: #fff; top:0; z-index: -1;" > -->
        <div class = "backgroundLayer" style = "background-image: url(boston.jpg); position:sticky; background-color: #fff; top:0; z-index: -1;">
        <div class = "pageTitle"><h1 style = "color: #FFF">My Profile</h1></div>
        <div class = "aboutBlurb">	
            Review your previous purchases and keep track of your meal swipe balance. 
        </div>
        </div>
    <!-- </div> -->
    <div class="container">        
        <div class="content">
            <!-- <h2>Hello, <?php echo $_SESSION["fname"]; ?>. Here are your previous orders: </h2><br/>             -->
            <div class="orders">
                
                <?php 
                /* Establish Connection Info */
                $server = "sql208.epizy.com";
                $userid = "epiz_30185190";
                $pw = "gZ70WRnjiyTkc";
                $db = "epiz_30185190_tuftsusers";
                /* Create Connection Info */
                $conn = new mysqli($server, $userid, $pw);
                if($conn->connect_error){
                   die("Connection failed:". $conn->connect_error);
                }
                
                /* Select the database */
                $utln = $_SESSION["utln"].strval();
                $name = $_SESSION["fname"];
                $swipes = $_SESSION['swipes'];
                // $utln = 'mtorre07';
                $conn->select_db($db);
                
                /* Retrieve amount of swipes left. */
                echo "<h2>Hello $name, you have $swipes meal swipes left.</h2><br/>";


                echo "<h2 style='align: left'>Your Previous Orders:</h2><br/>";


                /* Print list of previous orders. */
                $sql = "SELECT * FROM `orders` WHERE `UTLN` = '".$utln."' ORDER BY `orders`.`datetime` DESC";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    
                   $table = "<table>
                            <tr>

                                <th>Date</th>
                                <th>Time</th>
                                <th>Items</th>
                            </tr>";
                    $breakfast .= $table;   
                    $brunch .= $table;  
                    $dinner .= $table;  
                              
                    $num_order_b = 1;
                    $num_order_br = 1;
                    $num_order_d = 1;

                    while ($row = $result->fetch_array()) {
                        // $utln = $row["UTLN"];
                        $order = $row["description"];
                        $orders = explode(",", $order);
                        $time = $row["datetime"];
                        $times = explode(" ", $time);
                        
                        /*Time components */
                        /* hour[0] shows the hour the purchase was made */
                        $hour = explode(":", $times[1]);
                        
                        /* Updating number of order. */
                        $table_row =  "<tr>";
                        $table_row .= "<td>$times[0]</td>
                                     <td>$times[1]</td>
                                     <td>";
                                     
                        /* Insert ordered items followed by ", " */                        
                        foreach ($orders as &$item) {
                            $table_row .= "$item";
                            if ($item == end($orders)) break;
                            $table_row .= ", ";
                        }                        
                        $table_row .= "</td></tr>";
                        
                        /* Insert row in appropriate table. */
                        if ($hour[0] < 11) {
                            $breakfast .= $table_row;
                        } else if ($hour[0] >= 11 && $hour[0] < 17) {
                            $brunch .= $table_row;
                        } else if ($hour[0] >= 17) {
                            $dinner .= $table_row;
                        }
                    }                    
                    $breakfast .= "</table><br/><br/><br/>";
                    $brunch .= "</table><br/><br/><br/>";
                    $dinner .= "</table><br/><br/><br/>";

                    echo "<h1>Breakfast</h1>$breakfast";
                    echo "<h1>Lunch</h1>$brunch";
                    echo "<h1>Dinner</h1>$dinner";                    
                } else {
                    echo "<h3>Nothing to show here</h3><br/>";
                }
                $conn->close();
                
                ?>
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