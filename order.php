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
        #form {
            padding-left:25%;
            padding-top: 70px;   
            margin-left: : 400px;
            padding-bottom: 50px;
            display: none;
            
        }
        
        #notform h2{
            padding-bottom: 500px;
            text-align: center;
        }
        h2 {
            margin:0px;
            font-size: 40px;
        }
        
        input[type=submit] {
            border: none;
            display: block;
            background-color: #3f8fe5;
            margin-top: 30px;

            padding-left: 20px;
            padding-right: 20px;
            padding-top: 10px;
            padding-bottom: 10px;
            color:#fff;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14pt;
        }
        h6 {
            font-family: Arial, Helvetica, sans-serif;
            color: #3f8fe5;
            font-size: 20px;
            margin: 0px;
            padding-top: 10px;
        }
        .fiveItems {
            color: #000033;
            padding-bottom: 20px;
            font-weight: normal;
            font-size: 18px;
        }
        label {
            font-family: Arial, Helvetica, sans-serif;
            color: #000033;
            padding: 10px;
        }
        td {
            padding-right: 70px;
            vertical-align: top;
        }
        

    </style>
    <script type="text/javascript">
    <?php 
            $swipes = $_SESSION['swipes'];
            echo "var swipes = $swipes;"; 
    ?>
        //food = "";
        function getEndpointUrl()
        {
            date = new Date();
            day = date.getDate();
            month = date.getMonth() + 1;
            year = date.getFullYear();
            var endpointUrl = "https://tuftsdiningdata.herokuapp.com/menus/dewick/";
            endpointUrl += day + "/" + month + "/" + year;
            return endpointUrl;
        }
    	function loadMessages() {
    		var data = null;

			// Endpoint for getting latest menu
			//var endpointUrl = "https://tuftsdiningdata.herokuapp.com/menus/dewick/30/11/2021";
            var endpointUrl = getEndpointUrl();
			/* Step 1: Make instance of XHR object...
			...to make HTTP request after page is loaded*/
			var xhr = new XMLHttpRequest();
			xhr.withCredentials = false;
			console.log("1: created request");
 
			// Step 2: Open the JSON file at remote location
 
			xhr.open("GET", endpointUrl);


			console.log("2: open success");
 	
			// Step 3: set up callback for when HTTP response is returned (i.e., you get the JSON file back)

			xhr.onreadystatechange = function() {
				console.log("3:  event fired");
			
 
				if (xhr.readyState == 4 && xhr.status == 200) {

					// Step 5: when we get all the JSON data back, parse it and use it
					console.log("5:  data is ready");
					console.log(JSON.parse(this.response));
                    //document.getElementById("messages").innerHTML = this.response;
                    loadMenu(JSON.parse(this.response));
				}
				else if (xhr.readyState == 4 && xhr.status != 200) {

					//document.getElementById("messages").innerHTML = "Whoops, something went terribly wrong!";

				}

				else if (xhr.readyState == 3) {

					console.log("6:  ready state 3- request received,data being sent");
					//document.getElementById("messages").innerHTML = "Come back soon!";

				}

			}//end on readystate change
	
		// Step 4: fire off the HTTP request
			xhr.send(data);
			console.log("4 request sent");
		}
        
        function loadMenu(food) {
            s = "<form onsubmit = 'return validate()' method = 'get' action = 'process.php'>";
            d = new Date();
    		hour = d.getHours();
    		min = d.getMinutes();
            s+= "<table><tr><h2>Tuftonia Hall Online Order</h2><h6 class = 'fiveItems'>Select up to 5 items.</h6></tr>";
            isClosed = false;
            if (hour >= 8 && hour < 11) {
                s += makeSelect(food, "Breakfast");
            } else if (hour >= 11 && hour < 17) {
                s+= makeSelect(food, "Brunch");
            } else if (hour >= 17 && hour < 21) {
                s += makeSelect(food, "Dinner");
            }
            else {
                isClosed = true;
            }
            s += "<input type = 'submit' value = 'Order'>";
            s+= "<input type = 'hidden' id = 'itemsOrdered' name='itemsOrdered'>";
            s+= "<input type = 'hidden' id = 'deliveryTime' name='deliveryTime'>";
            s+= "<input type = 'hidden' id = 'dateTime' name='dateTime' >";
            s += "</form>";
            if (isClosed) {
                s = "<h2 style = 'padding: 17%; text-align: center'>Sorry, the dining hall is closed right now<h2>";
                document.getElementById("notForm").innerHTML = s;
            } else {
                document.getElementById("form").innerHTML = s;
                document.getElementById("notForm").style.display = "none";
                document.getElementById("form").style.display = "block";
            }
        }
        
        function makeSelect(food, meal) {
            toReturn = "<tr><td>";
            a = 0;
            numCategories = getNumMealCategories(food, meal);
            c = 1;
            for (const i in food["data"][meal]) {
                if (c == (Math.ceil(numCategories/2) + 1)) {
                    toReturn+= "</td><td>";
                }
                toReturn += "<h6>" + i.toUpperCase() + ":</h6>";
                category = food["data"][meal][i];
                numFoods = category.length;
                for (j = 0; j < numFoods; j++) {
                    console.log(category[j]);
                    toReturn += "<input type = 'checkbox' id= '" + a + "' name ='" + a + "' value='" + category[j] + "'>";
                    toReturn += "<label for= '" + category[j] + "'>";
                    toReturn +=  category[j] + "</label><br/>";
                    a++;
                }
                c++;
            }
            return toReturn + "</td></tr></table>";
        }
        
        function getNumMealCategories(food, meal) {
            keys = 0;
            for (const i in food["data"][meal]) {
                keys++;
            }
            return keys;
        }
        
        function validate() {
            selected = 0;
            items = "'";
            checkboxes = document.getElementsByTagName('input');
            for (i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked == true) {
                    selected++;
                    items += checkboxes[i].value + ",";            
                }
            }
            items = items.substring(0, items.length - 1);
            items += "'";
            if (selected == 0 ) {
                alert("You must order at least one item");
                return false;
            } else if (selected > 5) {
                alert("You can not order more than 5 items!");
                return false;
            }
            if(swipes < 1){
                alert("You do not have enough meal swipes remaining");
                return false;
            }

            document.getElementById("itemsOrdered").value = items;
            orderDate = new Date();
    		hour = d.getHours();
    		min = d.getMinutes();
            sec = d.getSeconds();
            day = d.getDate();
            month = d.getMonth() + 1;
            year = d.getFullYear();
            
            dateTime = getDateTime(year, month, day, hour, min, sec);
            document.getElementById("dateTime").value = dateTime;
            document.getElementById("deliveryTime").value = getTime(findTime(hour,min, 15)[0],findTime(hour,min, 15)[1]);
            return true;
        }


function getTime(h, m) {
	if (h > 12) {
		h = h - 12;
	}
	s = h + ":";
	if (m < 10) {
		s += "0" + m;
	} else {
		s += m;
	}
	return s;
}
	
function findTime(h, m, add) {
	m += add;
	if(m >= 60) {
		if (h == 12) {
			h = 1;
		} else {
			h++;
		}
		m -= 60;
	}
	a = [h,m];

	return a;
}
    function getDateTime(year, month, day, hour, min, sec) {
        toReturn = "'" + year + "-" + addZero(month) + "-" + addZero(day) + " ";
        toReturn += addZero(hour) + ":" + addZero(min) + ":" + addZero(sec) + "'";
        return toReturn;    
    }
    
    function addZero(input) {
        if (input < 10) {
            input = "0" + input;
        }
        return input;
    }
    </script>
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
<body onload="loadMessages()">
    <div id="form">
        
    </div>
    <div id="notForm">
        <h2 style = 'padding: 17%; text-align: center'>Loading...</h2>
    </div>
</div> 
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
