<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href='css/style-location.css'>
        <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400" rel="stylesheet"> 
        <link rel='stylesheet' type="text/css" href='css/normalize.css'>
        <title>Rent Car</title>
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

        
        <section class="Location">
            <div class="head">
                <button class='btn-head'>LOCATIONS</button>
            </div>
            <div class="row">
                    <div class="box1">
                        <figure class='pic1'>
                            <img src='images/lo1.jpg' alt='vietnam'>
                        </figure>
                        <div class='headtextlo1'>
                            <h2>Saki Vietnam</h2>
                        </div>
                        <div class="lo1text">
                            <strong>Address:</strong>
                            <span> 5F Gami Group Building,Vietnam 11 Pham Hung St. Tu Liem Dist,Hanoi</span>                  
                        </div>
                        <div class="lo1text">
                          <strong>Phone:</strong>
                          <span>84 2437957786</span>
                        </div>
                        <div class="lo1text">
                          <strong>Hours of Operation:</strong>
                          <span>Sun - Sat 8:00 AM - 6:00 PM</span>
                        </div>
                        <div class="lo1text" ng-if="!mapFlag">
                          <a href="http://www.google.com/maps/dir//21.034527,105.780006/@21.034527,105.780006,12z" target="_blank">
                          <button class="btn">Get Directions</button>
                          </a>
                        </div>
                    </div>
            </div>
            <div class='row'>
                <div class='box2'>
                    <figure class='pic2'>
                        <img src='images/lo2.jpg' alt='Japan'>                       
                    </figure>
                    <div class='headtextlo2'>
                        <h2>Saki Japan</h2>
                    </div>
                    <div class="lo2text">
                      <strong>Address:</strong>
                      <span> 2-6-16, Hanmichibashi,Hakata-KU,Fukuoka City,812-0897,Japan</span>
                    </div>
                    <div class="lo2text">
                      <strong>Phone:</strong>
                      <span>092-415-1129</span>
                    </div>
                    <div class="lo2text">
                      <strong>Hours of Operation:</strong>
                      <span>Sun - Sat 8:00 AM - 8:00 PM</span>
                    </div>
                    <div class="lo2text" ng-if="!mapFlag">
                      <a href="http://www.google.com/maps/dir//33.584852,130.444369/@33.584852,130.444369,12z" target="_blank">
                      <button class="btn">Get Directions</button>
                      </a>
                    </div>
                </div>
            </div>
            <div class='row'>
                <div class='box3'>
                    <figure class='pic3'>
                        <img src='images/lo3.jpg' alt="China">
                    </figure>
                    <div class='headtextlo3'>
                        <h2>Saki China</h2>
                    </div>
                    <div class="lo3text">
                      <strong>Address:</strong>
                      <span> Beside Weast of Aomen Center,(Meet &amp; Greet),Beijing,China</span>
                    </div>
                    <div class="lo3text">
                      <strong>Phone:</strong>
                      <span>(86) 10 58140013</span>
                    </div>
                    <div class="lo3text">
                      <strong>Hours of Operation:</strong>
                      <span>Sun - Sat 8:30 AM - 5:00 PM</span>
                    </div>
                    <div class="lo3btn" ng-if="!mapFlag">
                       <a href="http://www.google.com/maps/dir//39.916248,116.411166/@39.916248,116.411166,12z" target="_blank">
                       <button class="btn">Get Directions</button>
                       </a>
                    </div>
                </div>
            </div>
           <div class='row'>
               <div class='box4'>
                   <figure class='pic4'>
                       <img src='images/lo4.jpg' alt="Dubai">
                   </figure>
                   <div class='headtextlo4'>
                        <h2>Saki Dubai</h2>
                   </div>
                   <div class="lo4text">
                      <strong>Address:</strong>
                      <span>Arrivals Terminal 1,Dubai,United Arab Emirates</span>               
                   </div>
                   <div class="lo4text">
                      <strong>Phone:</strong>
                      <span>(971) 4 2245219</span>
                   </div>
                   <div class="lo4text">
                      <strong>Hours of Operation:</strong>
                      <span itemprop="openingHours">Sun - Sat open 24 hrs</span>
                   </div>
                   <div class="lo4text" ng-if="!mapFlag">
                      <a href="http://www.google.com/maps/dir//25.249082,55.352758/@25.249082,55.352758,12z" target="_blank">
                      <button class="btn">Get Directions</button>
                      </a>
                   </div>   
		       </div>
           </div>
        </section>
    </body>
</html>