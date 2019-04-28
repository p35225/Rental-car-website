<!DOCTYPE html>
<html>

<head>
    <title>Ourservice</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/service1.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
     <link rel="stylesheet" type="text/css" media="screen" href="css/Service1.css">
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
    <div>
          <header>
<div class="main wrap">

  

<h1 class="rentcar">Saki Rent Car</h1>
<?php
    session_start();
    
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
        <br>
        <section id="content" style="background: #ffff99;">
            <div class="policyBox">
                <p class="servicetext">Service</p>
                   <br>
                   <br>
                   <br>
<center>
<h2>Welcome to Saki Service</h2>
</center>
          <section id="showcase">
            <div class="container">
                
            </div>
           </section>

           <section id="newsletter">
            <div class="container"></div>
         
            <form>
                <input type="Serial" placeholder="Serial No">
                <button type="Can I help you" class="button_1">Enter</button>
                <br>
                <a href="https://www.vehiclehistory.com/?gclid=Cj0KCQjw3ebdBRC1ARIsAD8U0V51zzLqg4Ii-mhRWb5g0jp6mGfzB4vHPKMEd5hTtcA16pllZeL1cNYaAqXcEALw_wcB" target="_blank" onclick="s_objectID=&quot;https://support.apple.com/th-th/HT204308_1&quot;;return this.s_oc?this.s_oc(e):true">how to check your serial number</a>
            </form>
             </div>
           </section>
      
      <section id="boxes">
        <div class="container">
            <div class="box">
                <img src="images/s1-warranty.jpg">
                <h3>Check Warranty</h3>
                <p><a href="https://www.carsdirect.com/car-buying/how-to-find-out-if-your-car-has-a-factory-warranty" target="_blank" onclick="s_objectID=&quot;https://support.apple.com/th-th/HT204308_1&quot;;return this.s_oc?this.s_oc(e):true">How to find out factory warranty</a>
                </p>
            </div>

                <div class="box">
                    <img src="images/s2-phone.jpg">
                <h3>Phone No.</h3>
                <p><a href="https://support.apple.com/th-th/HT204308" target="_blank" onclick="s_objectID=&quot;https://support.apple.com/th-th/HT204308_1&quot;;return this.s_oc?this.s_oc(e):true">1-234-5678 or 1-000-9876</a>
                </p>
            </div>
                    <div class="box">
                        <img src="images/s3-download.jpg">
                <h3>Download Information</h3>
                <p><a href="https://coalesautomotive.com/" target="_blank" onclick="s_objectID=&quot;https://support.apple.com/th-th/HT204308_1&quot;;return this.s_oc?this.s_oc(e):true">Service information</a>
                </p>
            </div>
        </div>
      </div>
  </section>                 


        </div>
        </section>



    </div>
</body>

</html>