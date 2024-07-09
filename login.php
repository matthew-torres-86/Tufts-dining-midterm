<!DOCTYPE html>
<?php
session_start();
?>

<html>
<head>
    <title>Login | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tufts Dining Hall, Tufts Dining">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style>
        #spacer {
            margin-left: 40%; 
            margin-right: 37%; 
            width: 320px;
            margin-bottom: 100px;
        }
        form {
            text-align: left;
            padding: 30px;
            border-radius: 25px; 
            background-color: #E5E4E2; 
        }
        #create-form {
            margin-bottom: 250px;
        }
        
        input[type=text], input[type=password]{
            padding: 5px;
            padding-bottom: 7px;
            margin: 5px;
            font-family: Arial, Helvetica, sans-serif;
            color: #071d64;
            font-size: 14pt;
        }
        
        input[type=button] {
            border: none;
            display: inline block;
            background-color: #3f8fe5;
            color:#fff;
            padding: 12px;
            margin: 5px;
            margin-top: 10px;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 14pt;
        }

        #failuremessage{
            font-family: Arial, Helvetica, sans-serif;
            color: #FF0000;
            font-size: 12pt;
            padding: 35px;
            display: hidden;
            height: 100px;
            vertical-align: text-bottom;
        }

        h2 {
            margin: 0px;
            padding-bottom: 10px;
            padding-left: 5px;
            font-size: 35pt;
        }
    </style>
    
    <script language="javascript">
        

        window.onload = function(){

        document.getElementById("create-form").style.display = "none";
        document.getElementById("failuremessage").style.display = "hidden";

        <?php
    if($_SESSION["loggedin"] === "false"){
    echo "document.getElementById('failuremessage').style.display = 'block';";
    echo "document.getElementById('failuremessage').innerHTML = 'Your Login information was incorrect. Please try again.';";
    }
    else if($_SESSION["loggedin"] === "created"){
        echo "document.getElementById('failuremessage').style.display = 'block';";
        echo "document.getElementById('failuremessage').innerHTML = 'Your account has been created successfully. Enter your login info to confirm.';";
    }
    else if($_SESSION["loggedin"] === "duplicateutln"){
     echo "document.getElementById('failuremessage').style.display = 'block';";
     echo "document.getElementById('failuremessage').innerHTML = 'Your UTLN is already in our system. Please login instead.';";
    }
    ?>
        }
    
    function validateLogin(){

        
        validated = true;
        feedback = "";
        if (document.getElementById("UTLN").value == ""){
			  feedback += "Please enter your UTLN.<br>";
			  document.getElementById("UTLN").focus();
			  validated = false;
		  }
          if (document.getElementById("pw").value == ""){
			  feedback += "Please enter your Password.<br>";
			  document.getElementById("pw").focus();
			  validated = false;
		  }
        
        if(validated){
        document.getElementById("login-form").submit();
        }
        else{
            document.getElementById("failuremessage").style.display = "block";
            document.getElementById("failuremessage").innerHTML = feedback;
        }
        return true;
    }

    function checkEmail(email) {
            emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            if (emailPattern.test(email.value)) {
                return true;
            }
            else {
                return false;
            }
            
        }

        function checkPwd(str) {
    if (str.length < 8) {
        return("too_short");
    } else if (str.length > 50) {
        return("too_long");
    } else if (str.search(/\d/) == -1) {
        return("no_num");
    } else if (str.search(/[a-zA-Z]/) == -1) {
        return("no_letter");
    } else if (str.search(/[^a-zA-Z0-9\!\@\#\$\%\^\&\*\(\)\_\+]/) != -1) {
        return("bad_char");
    }
    return("ok");
}

    function validateCreate(){
        validated = true;
        pwdstatus = checkPwd(document.getElementById("newpw").value);
        feedback = "";

        if (document.getElementById("newUTLN").value == ""){
			  feedback += "Please enter your UTLN.<br>";
			  document.getElementById("newUTLN").focus();
			  validated = false;
		  }
          if (document.getElementById("newpw").value == ""){
			  feedback += "Please enter your password.<br>";
			  document.getElementById("newpw").focus();
			  validated = false;
		  }
          else if(pwdstatus != "ok"){
              if(pwdstatus == "too_short")
              {
                  feedback += "Your password is too short.<br>";
              }
              if(pwdstatus == "too_long")
              {
                  feedback += "Your password is too long.<br>";
              }
              if(pwdstatus == "no_num")
              {
                  feedback += "Your password must have at least one number.<br>";
              }
              if(pwdstatus == "no_letter")
              {
                  feedback += "Your password must have at least one letter.<br>";
              }
              if(pwdstatus == "bad_character")
              {
                  feedback += "Your password contains an invalid character.<br>";
              }
              validated = false;
          }
        if (document.getElementById("cpw").value != document.getElementById("newpw").value){
			  feedback += "Passwords must match.<br>";
			  document.getElementById("cpw").focus();
			  validated = false;
		  }
          if (document.getElementById("fname").value == ""){
			  feedback += "Please enter your first name.<br>";
			  document.getElementById("fname").focus();
			  validated = false;
		  }
          if (document.getElementById("lname").value == ""){
			  feedback += "Please enter your last name.<br>";
			  document.getElementById("lname").focus();
			  validated = false;
		  }
          if (document.getElementById("email").value == ""){
			  feedback+="Please enter your email address.<br>";
			  document.getElementById("email").focus();
			  validated = false;
		  }
          else if(checkEmail(document.getElementById("email").value)){
              feedback += "Please enter a valid email address.<br>";
              document.getElementById("email").focus();
			  validated = false;
          }

        if(validated){
            document.getElementById("create-form").submit();
        }
        else{
            document.getElementById("failuremessage").style.display = "block";
            document.getElementById("failuremessage").innerHTML = feedback;
        }
        return true;
        
    }


    
    function callLogin(){
        if(window.getComputedStyle(document.getElementById("login-form")).display === "none"){
            document.getElementById("create-form").style.display = "none";
            document.getElementById("login-form").style.display = "block";

            document.getElementById("UTLN").value = document.getElementById("newUTLN").value;
            document.getElementById("pw").value = document.getElementById("newpw").value;
            return true;
        }
        else{
            validateLogin();
        }
    }

    function callCreate(){
        
        if(window.getComputedStyle(document.getElementById("create-form")).display === "none"){
            document.getElementById("login-form").style.display = "none";
            document.getElementById("create-form").style.display = "block";

            document.getElementById("newUTLN").value = document.getElementById("UTLN").value;
            document.getElementById("newpw").value = document.getElementById("pw").value;
            return true;
        }
        else{
            validateCreate();
        }
      }
      </script>
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
            </div>
        </li>

    </div>

</nav>
   
</header>
<body>
<div id = "spacer">
<div id = "failuremessage"></div>
  <form id="login-form" method="post" action = "/processlogin.php" >
    <h2>Login</h2>
      <input type="text" name="UTLN" id= "UTLN" placeholder="Tufts Username*" value="<?php echo $_SESSION['utln']?>"> <br>
      <input type="password" name="pw" id= "pw" placeholder="Password*" value="<?php echo $_SESSION['pw']?>"> <br>
      <input type="button" name="login" onclick="callLogin()" value="Login">
      <input type="button" name="create" onclick="callCreate()" value = "Create New Account">
  </form>

  <form id="create-form" method="post" action = "/processcreate.php" >
    <h2>Create New Account</h2>
      <input type="text" name="UTLN" id= "newUTLN" placeholder="Tufts Username*" value="<?php echo $utln?>"> <br>
      <input type="password" name="pw" id= "newpw" placeholder="Password*" value="<?php echo $pass?>"> <br>
      <input type="password" name="cpw" id= "cpw" placeholder="Confirm Password*" value="<?php echo $cpw?>"><br>
      <input type="text" name="fname" id= "fname" placeholder="First Name*" value="<?php echo $fname?>"><br>
      <input type="text" name="lname" id= "lname" placeholder="Last Name*" value="<?php echo $lname?>"><br>
      <input type="text" name="email" id= "email" placeholder="Email*" value="<?php echo $email?>"><br>
      <input type="button" name="login" onclick="callLogin()" value="Login">
      <input type="button" name="create" onclick="callCreate()" value = "Create New Account">
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