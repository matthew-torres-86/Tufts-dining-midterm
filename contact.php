<?php
    session_start();
    $_SESSION['destination']="contact.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Contact | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tufts Dining Hall, Tufts Dining, Contact, Submit Feedback, Suggestion, Email, Call, Phone Number, Address">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style>
        h1, p, label {
            /*text-align: center;*/
            font-family: Arial, Helvetica, sans-serif;
            color: #071d64;
        }
        #form {
            text-align: left;
            padding: 35px;
        }
        label {
            font-size: 15pt;
        }

        .star {
            color: #FF0000;
        }
        
        

        .question {
            margin: 5px;
            padding: 2px;
            font-family: Arial, Helvetica, sans-serif;
            color: #071d64;
        }
        
        input[type = text], textarea {
            padding: 5px;
            font-family: Arial, Helvetica, sans-serif;
            color: #071d64;
        }
        
        input[type=submit] {
            border: none;
            display: block;
            background-color: #3f8fe5;
            color:#fff;
            padding: 12px;
            font-family: Arial, Helvetica, sans-serif;
            position: absolute;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function alertBlank(questionNum) {
            str = "Please fill in ";

            if (questionNum == 0) {
                str += "first name";
            }
            else if (questionNum == 1) {
                str += "last name";
            }
            else if (questionNum == 2) {
                str += "email address";
            }
            else if (questionNum == 3) {
                str += "dining hall/cafe";
            }
            else {
                str += "message";
            }

            alert(str);
            
        }
        function checkNoBlanks(answers) {
            for (i = 0; i < answers.length; i++) {
                if (answers[i] == null || answers[i].value == "") {
                    alertBlank(i);
                    if (i != 3) {
                        answers[i].focus(); 
                        $('#' + answers[i].id).css('border', '1px solid red');
                    }
                    return false;
                }
            }
            return true
        }

        function alertBadEmail(email) {
            alert("Please enter a correctly formatted email address");
            email.focus();
            email.select();
            $('#' + email.id).css('border', '1px solid red');
        }

        function checkEmail(email) {
            emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (emailPattern.test(email.value)) {
                return true;
            }
            else {
                alertBadEmail(email);
                return false;
            }
            
        }
        function validate() {
            answers = new Array(5);
            answers[0] = document.getElementById("firstName");
            answers[1] = document.getElementById("lastName");
            answers[2] = document.getElementById("email");
            answers[3] = null;
            answers[4] = document.getElementById("message");
            
            radioButtons = document.getElementsByName("diningHall");
            for (i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].checked) {
                    answers[3] = radioButtons[i];     
                }
            }

            if (!checkNoBlanks(answers)) {
                return false;
            }

            if (!checkEmail(answers[2])) {
                return false;
            }

            return true;
        }
    </script>
</head>
<header>
    <nav>
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
        <li><a href=contact.php class="active">Contact Us</a></li>
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
                <a href=nutrition.php>Nutrition</a>
                <a href=contact.php class="active">Contact Us</a>
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
    <div class = "backgroundLayer" style = "background-image: url(contact.jpg);">
	<div class = "pageTitle"><h1 style = "color: #FFF">Contact Us</h1></div>
	<div class = "aboutBlurb">	
        Have a suggestion for any of our dining centers? Feel free to reach out to us below, via telephone at 617-627-3566, or in-person at 89-91 Curtis St, Medford, MA 02155! 
	</div>
    </div>

<div class="container">
<div id="form">
<form action="#" method="post" onsubmit="return validate()">
    <div class="question"><input type="text" id="firstName" name="firstName" placeholder="First name"><span class="star">*</span> </div> <br/>
    
    <div class="question"><input type="text" id="lastName" name="lastName" placeholder="Last name"><span class="star">*</span></div> <br/>
    
    <div class="question"><input type="text" id="email" name="email" placeholder="Email address"><span class="star">*</span></div> <br/>
    
    <div class="question">
    <label for="diningHall">Dining Hall/Cafe:<span class="star">*</span></label> <br/>
    <input type="radio" id="Tuftonia" name="diningHall">Tuftonia<br/>
    <input type="radio" id="Kindlevan" name="diningHall">Kindlevan Cafe<br/>
    <input type="radio" id="Danish" name="diningHall">Danish Pastry House<br/>
    <input type="radio" id="Uphill" name="diningHall">Uphill Eats<br/>
    <input type="radio" id="Coffee" name="diningHall">The Coffee Cart<br/>
    <input type="radio" id="Pizzeria" name="diningHall">The Pi-zzeria<br/>
    </div> <br/>

    <div class="question"><textarea name="message" id="message" cols="40" rows="5" placeholder="Enter your message here"></textarea><span class="star">*</span></div> <br/>
    
    <input type="submit" value="Submit">
    </br>
</form>
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