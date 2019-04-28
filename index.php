<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Rent Car</title>

<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.7.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/tms-0.4.1.js"></script>
<script>
$(document).ready(function () {
                  $('.slider')._TMS({
                                    show: 0,
                                    pauseOnHover: true,
                                    prevBu: '.prev',
                                    nextBu: '.next',
                                    playBu: false,
                                    duration: 500,
                                    preset: 'fade',
                                    pagination: true, //'.pagination',true,'<ul></ul>'
                                    pagNums: false,
                                    slideshow: 8000,
                                    numStatus: false,
                                    banners: 'fromBottom', // fromLeft, fromRight, fromTop, fromBottom
                                    waitBannerAnimation: false,
                                    progressBar: false
                                    })
                  })
$(function () {
  if ($(window).width() <= 1066) {
  $("#slider .prev").css("left", "55px")
  $("#slider .next").css("right", "55px")
  }
  })
</script>
<!--[if lt IE 9]>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<div >
<header>
<div class="main wrap">

  

<h1 class="rentcar">Saki Rent Car</h1>
<?php
    
    
    if(isset($_SESSION["user"]) && $_SESSION["status"]=="1"){?>
<div>    
<h3 class="custom-button">
<?php echo "Hello ". $_SESSION["user"];?>
</h3>
</div>
<a class="custom-button" href="user.php">Profile</a>

<a class="custom-button" href="deletesession.php">Logout</a>
<?php }
    else{?>

<a class="custom-button" href="register.php">Register</a>

<a class="custom-button" href="login.php">Login</a>
<?php }?>
</div>
<nav>
<ul class="menu">
<li><a href="index.php">Home </a></li>
<li><a href="selectcar.php">Select your car </a></li>
<li><a href="promotion.php">Promotion</a></li>
<li><a href="service.php">Our service</a></li>
<li><a href="policy.php">Policy</a></li>
<li><a href="location.php">Locations</a></li>
<?php if(isset($_SESSION["user"]) && $_SESSION["status"]=="1"){
 echo "<li><a href='cart.php'>Cart</a></li>";
 if(!isset($_SESSION['model'])){
 $_SESSION['branch'] = "";
  $_SESSION['price'] = "";
  $_SESSION['model'] = "";
}
}
 ?>
</ul>
<div class="clear"></div>
</nav>
</header>
<div id="slider">
<div class="slider-block">
<div class="slider">
<ul class="items">
<li><img  src="images/slide-1.jpg"   style='max-width: 1200px;' alt="">
<div class="banner">
<div><span>Sport Car</span><strong>AMG GT 4 Doors</strong>
<p>Driving dynamics at motorsport level, explosive sprints, maximum comfort. The Mercedes-AMG GT 63 S 4MATIC+ 4-Door Coupé marks the top spot of the four-door model range. Its dynamic AMG engine mounts guarantee the best-possible connection of the 470 kW (639 hp) strong engine to the body in any handling situation.</p>
<a href="selectcar.php" class="button">Rent Now!</a></div>
</div>
</li>
<li><img  src="images/slide-2.jpg"   alt="">
<div class="banner">
<div><span>Eco Car</span><strong>Mazda2</strong>
<p>one glance at Mazda2 and it’s clear that this is no ordinary car. Eye-catching style and stunning looks are inspired by our award-winning KODO: Soul of Motion design.The flowing lines of its lean, muscular body suggests an inner strength and pent-up energy just waiting to be released.</p>
<a href="selectcar.php" class="button">Rent Now!</a></div>
</div>
</li>
<li><img  src="images/slide-3.jpg"  alt="">
<div class="banner">
<div><span>OFF ROADs</span><strong>Lamborghini Urus</strong>
<p>A super sports car soul and the functionality typical for an SUV: this is Lamborghini Urus, the world’s first Super Sport Utility Vehicle. Identifiable as an authentic Lamborghini with its unmistakable DNA, Urus is at the same time a groundbreaking car: the extreme proportions, the pure Lamborghini design and the outstanding performance make it absolutely unique.</p>
<a href="selectcar.php" class="button">Rent Now!</a></div>
</div>
</li>
</ul>
</div>
<a href="#" class="prev"></a> <a href="#" class="next"></a> </div>
</div>
<section id="content">

<div class="block-1 box-1">
<p class="reviewtext">Customer Review </p>
<div id= rcorners2> <img src="images/hung.jpg" alt="">
<p class="text-1">Dr. Nguyen Duy Hung <strong>9.5/10</strong></p>

<table border="1" width= "100%" style="background-color:#fffeee;">
<tr>
<th> <p class="text-2">
Argumentation is a form of reasoning, that could be viewed as a dispute resolution;
</p>
</th>

</tr>

</table>


</div>

<div id= rcorners2> <img src="images/Hamada.png" alt="">
<p class="text-1">Dr. Yoshiki Hamada <strong>6.5/10</strong></p>

<table border="1" width= "100%" style="background-color:#fffeee;">
<tr>
<th> <p class="text-2">
The current research interest focuses on applications of tangible board game to encourage students who are .
</p></th>

</tr>

</table>


</div>
</div>
</section>
<footer></footer>
</div>
</body>
</html>
