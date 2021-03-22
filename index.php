<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laman Utama</title>
    <link rel="icon" href="image/Layer 0.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
</head>
<body>
<!--Navigation Menu-->
<div class="nv">
    <div class="center-nav">

        <div class="login right">
            <div class="loginImg"><img src="image/guest.png" width="45px"></div>
            <div class="loginBlock"><button class="noborderbutton"><a href="login.php"><b>Log Masuk</b></a></button></div>
        </div>  
        
        <div class="right" style="display: inline-block;margin: 0 auto;">
            <a href="contactus.php"><button class="ddbtn right">Hubungi Kami</button></a>
            <a href="aboutus.php"><button class="ddbtn right">Tentang Kami</button></a>
            <div class="dropdown right">
                <button class="ddbtn" >Aktiviti</button>
                <div class="smallmenu">
                    <a href="viewActivity.php">Senarai Aktiviti</a>
                    <a href="viewPastAct.php">Senarai Aktiviti Lama</a>
                </div>
            </div>
            <a href="index.php"><button class="ddbtn right">Laman Utama</button></a>
        </div>
        <div  style="position: relative;display: inline-block;float: left;">
            <a href="index.php">
                <img class="tit" src="image/Layer 0.png" alt="Logo BJB" style="width:65px;padding: 5px 10px 0px;"></a>    
        </div>

        <div class="search-container">
            <div class="searchbox">
                <form name='searchActivity' method='POST' action='search.php'>
                    <input type="text" name="query" class="searchbox_input" placeholder="Cari..." required>
                    <button type="submit" name="search"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>  

<!--image
<div align="center" style="height: 50%;width: auto;">
    <img src="image/Act1.jpeg" width="100%" height="auto" style="background-position: center;background-repeat: no-repeat;background-size: cover;">
</div>-->
<div class="center index">
    <h1>Welcome to BJB~</h1>
</div>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="image/Act1.jpeg" width="100%" height="auto" style="background-position: center;background-repeat: no-repeat;background-size: cover;">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="image/Act2.jpeg" width="100%" height="auto" style="background-position: center;background-repeat: no-repeat;background-size: cover;">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="image/activity1.png" width="100%" height="auto" style="background-position: center;background-repeat: no-repeat;background-size: cover;">
    <div class="text">Caption Three</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>


<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html>