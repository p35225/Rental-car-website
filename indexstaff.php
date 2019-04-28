<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<title>Rent Car</title>

<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/best.css">
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
    <?php
     include('staffnav.php');
     ?>
  </header>
  <div id="slider">
    <div class="slider-block">
      <div class="slider">
        <ul class="items">
          <li><img  src="images/slide-1.jpg"   style='max-width: 1200px;' alt="">
            <div class="banner">
              <div><span>Sport Car</span><strong>AMG GT 4 Doors</strong>
                <p>Nam liber tempor cum soluta nobis eleifenoption congue nigfif аil imperdiet doming id quod mazim placerat facer. Lorjem ipsum dolor sit amet, consecer adipiscing elit.</p>
                <a href="selectcar.html" class="button">Rent Now!</a></div>
            </div>
          </li>
          <li><img  src="images/slide-2.jpg"   alt="">
            <div class="banner">
              <div><span>Eco Car</span><strong>Mazda2</strong>
                <p>sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis.</p>
                <a href="selectcar.html" class="button">Rent Now!</a></div>
            </div>
          </li>
          <li><img  src="images/slide-3.jpg"  alt="">
            <div class="banner">
              <div><span>OFF ROADs</span><strong>Lamborghini Urus</strong>
                <p>At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit.</p>
                <a href="selectcar.html" class="button">Rent Now!</a></div>
            </div>
          </li>
        </ul>
      </div>

  </div>
        <a href="#" class="prev"></a> <a href="#" class="next"></a> </div>
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

      <div id= rcorners2> <img src="images/hamada.png" alt="">
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
