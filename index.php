<?php
    session_start();
    $_SESSION['destination']="index.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Home | Tufts Dining</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="Tufts University, Tufts Dining Hall, Tufts Dining">
    <link type="text/css" rel="stylesheet" href="styles.css">
    <style>
        .testimonial{
            
            
            padding: 35px;
            background-color: #2e6aaa;
            color: #fff;
        }
        @media screen and (max-width: 649px){
            .testimonial{ 
                margin: 10%;
                width: 65%;}
            .testimonial p{
                font-size: 12px;
            }
            .testimonial h2{
                font-size: 16px;
            }
            .gallery{
                display: block;
                justify-content: center;
             }
        }
        @media screen and (min-width: 649px){
            .testimonial{ 
                margin: 2%;
                width: 30%;}
            
            .gallery{
                display: flex;
                justify-content: center;
             }
        }
        .testimonial img{
            width: 30%;
            position: relative;
            left: 5%;
        }

        .testimonial h2, p{
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

</nav>
</header>
<body>
    
    <!--Slideshow container-->
    <div class = "slideshow-container">
    <div class = "slide fade">
        <img src = "slide1.jpg">
        <div class="caption left" ><h2>All New. <br>Still Fresh</h2><p>Check out all of our brand new dining options on campus. We've opened a coal-fire pizzeria and a cafe with exclusive smoothie bowls. With all these delectible choices you'll never go hungry!</p>
        
        <button><a href="cafes.php">Learn More</a></button>
        </div>
    </div> 

    <div class = "slide fade">
        <img src = "tuftoniaHome.jpg">
        <div class="caption right"> <h2>Tuftonia Hall</h2><p>After Carm and Dewick burned down in a tragic circus fire last year, we've built a brand new dining experience inside Tuftonia Hall. With shorter lines, an open modern atmosphere and dozens more options, Tuftonia hall is a dining experience you won't want to miss! </p>

            <button><a href="tuftonia-hall.php">Learn More</a></button></div>
    </div> 

    <div class = "slide fade">
        <img src = "veggies.jpg">
        <div class="caption left"> <h2>Options For Everyone</h2><p>Whether you're vegan, vegetarian, gluten-free, nut-free or dairy-free, we have numerous options for any diet. And now with our Jumbo meal plan, there's no limit on the number of times you can swipe in during a meal period. </p>
            <button><a href="meal-plans.php">Learn More</a></button></div>
    </div> 

    <!--Slideshow buttons-->
    <a class="prev" onClick = "changeSlides(-1)">&#10094;</a>
    <a class="next" onClick = "changeSlides(1)">&#10095;</a>
    </div>

<!--Slideshow dots-->
<div style="text-align:center; background-color:#3f8fe5">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
  </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
var slideIndex = 1;
timeOutID = 0;
showSlides(slideIndex);


// Next/previous controls
function nextSlide() {
  changeSlides(1);
}

function changeSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  clearTimeout(timeOutID)
  var i;
  var slides = document.getElementsByClassName("slide");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
      slides[i].className = "slide";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
//   slides[slideIndex-1].style.display = "block";
  slides[slideIndex-1].className += " ActiveSlide";
  $(".ActiveSlide").fadeIn(1000);
  dots[slideIndex-1].className += " active";
  timeOutID = setTimeout(nextSlide, 9000);
}
</script>
</br>
<h1 style = "color: #3f8fe5; font-size: 36pt; padding-bottom: none;">Welcome To Tufts Dining!</h1>
<div class = "gallery">
    <div class="testimonial">
        <img src="5stars.png">
        <h2>Violet Johnson, A'24</h2>
        <p>"The new tufts dining is incredible. I can't live without my morning coffee from the Coffee Cart. I don't think I will ever get tired of the food here at Tufts."</p>
    </div>
    <div class="testimonial">
        <img src="5stars.png">
        <h2>Jeff Lin, E'21</h2>
        <p>"I'm obsessed with the new Tufts Dining. The smoothie bowls at Uphill Eats are to die for! And the new pizza place is awesome. 10/10." </p>
    </div>
    <div class="testimonial">
        <img src="5stars.png">
        <h2>Tonya Morocco, A'23</h2>
        <p>"I love Taco Tuesdays at Tuftonia Dining Hall! The carne asada is sooooo good!! Make sure to ask for extra guac!"</p>
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