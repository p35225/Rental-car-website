<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Promotions</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style5.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
        crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!--[if lt IE 9]> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'> 
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'> 
<script type="text/javascript" src="js/html5.js"></script> 
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css"> 
<![endif]-->
</head>

<body>
    <?php require_once('connect.php'); ?>
    <?php $q = "SELECT * FROM `PROMOTION` WHERE PROMOTION.ACTIVE=1";
        $pcode =$mysqli->query($q);
        $Fpcode = $pcode->fetch_array();
        $discount_code = $Fpcode['PROMOTION'];
        $description = $Fpcode['Description'];
     ?>
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

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="images/promo1.jpg" alt="First slide" height="600">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/promo2.jpg" alt="Second slide" height="600">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="images/promo3.jpg" alt="Third slide" height="600">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <section>
            <div class="container" style="max-width: 100%">
                <div class="row promotion-item w3-dark-gray">
                    <div class="col-2 promotion-image">
                        <img src="images/img_372910.png" style="width:50%;max-width:100px">
                    </div>    
                    <div class="col-10 mt-5 mb-5">
                        <h3 class="myFont"><?php echo $description; ?></h3><br>
                        <p class="myFont1">
                           
                               Promotion Code : <?php echo $discount_code; ?>
                            
                        </p>
                    </div>
                </div>
                <div class="row promotion-item w3-orange">
                    <div class="col-10 mt-5 mb-5">
                        <p class="myFont2">
                            If you looking for rental cars to get your family to summer break this is a good time, <br>
                            good deals. Not only discount that you get but also another free add-ons.
                        </p>
                    </div>
                    <div class="col-2 promotion-image">
                        <img src="images/Discount-Background-PNG.png" style="width:50%;max-width:150px" class="w3-grayscale-max">
                    </div>
                </div>
                <div class="row promotion-item w3-white">
                    <div class="col-2 promotion-image">
                        <img src="images/member.png" style="width:50%;max-width:150px" class="w3-grayscale-max">
                    </div>
                    <div class="col-10 mt-5 mb-5">
                        <p class="myFont2">
                            Becoming our member will get 15% discount and many more special services <br>
                            e.g. special deals for hotels etc. 
                        </p>        
                    </div>
                </div>
            </div>
            <!-- <div class="w3-content" style="max-width:100%">
                <div class="w3-container w3-dark-gray">
                    <h3 class="myFont"><br>PAY NOW. SAVE NOW. Up to 25% Discount!</h3><br>
                    <div class="">
                        <img src="images/img_372910.png" style="width:50%;max-width:100px">
                    </div>
                    <p class="myFont2">prepay now you can get our special deals.Prices displayed already include the
                        discount. Extras, e.g. additional
                        insurance,
                        baby
                        seat, <br>GPS etc. are
                        excluded from the discount. This offer is subject to change without notice. <br>All rentals are
                        subject
                        to
                        the
                        Saki standard terms and conditions. </p><br>
                </div>

                <div class="w3-container w3-orange"><br>
                    <h3 class="myFont1">Special offer during summer time!!!</h3><br>

                    <p class="myFont2">If you looking for rental cars to get your family to summer break this is a
                        good
                        time,
                        <br>good deals. Not only discount that you get but also another free add-ons.</p><br>
                    <div class="">
                        <img src="images/Discount-Background-PNG.png" style="width:50%;max-width:150px" class="w3-grayscale-max">
                    </div>
                </div><br>
                <div class="w3-container w3-white ">
                    <h3 class="myFont11">Become Member of us you will get special deals</h3><br>
                    <div class="">
                        <img src="images/member.png" style="width:50%;max-width:150px" class="w3-grayscale-max">
                    </div>
                    <p class="myFont2">Becoming our member will get 25% discount and many more special services <br>e.g.
                        special
                        deals for hotels etc. </p>
                </div><br> -->

        </section>
    </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


</body>

</html>