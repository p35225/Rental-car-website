<!DOCTYPE html>
<html>
<title>Policy</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style6.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">

<body>

    <!-- Header -->
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
    </div>
        <section class="section-features">
            <div class="head-text">
                    <h3 class="heading-secondary">
                        Our policy.
                    </h3>
            </div>
            
            <div class="row"> 
                <h2>Age restrictions.</h2>
                <p class="long-copy">
                    -All renters and drivers must present a valid driving license and a valid
                    passport upon collection of their Saki car rental in Thailand.
                </p>
            </div>
            
            <div class="row"> 
                <h2>Driver's license.</h2>
                <p class="long-copy">
                    -Drivers 23 years old and up can rent a car in Thailand with Saki.
                </p>
            </div>
            
            <div class="row"> 
                <h2>Credit card payments.</h2>
                <p class="long-copy">
                    -Paying with a major credit card is the preferred method of payment and
                Saki accepts all major credit cards.The payment method must be valid, issued in
                the
                name of the driver and be presented at the time of vehicle pick-up.We do not accept
                any prepaid cards or debit cards.
                When booking a prepaid rate, your credit card will be charged before the start of your
                rental.Any extra costs that occur during the car rental will also be charged to your
                credit card.
                </p>
            </div>
            
            <div class="row"> 
                <h2>Accidents.</h2>
                <p class="long-copy">
                    -In the event of an accident, you can reach the Thailand tourist police
                    24-hour national call center by dialing 1155. To call the police for a general
                    emergency, dial 191. For ambulance and rescue services, dial 1554.<br> If any damages
                    occur
                    to the rental vehicle fill out the accident report form enclosed with the vehicle
                    documents and immediately alert Sixt during the rental period.
                </p>
            </div>
            
            <div class="row"> 
                <h2>Accuracy of Information.</h2>
                <p class="long-copy">
                    -Although we strive to ensure the accuracy of the information on this
                    website,neither we nor our affiliates, suppliers or agents can be held responsible by
                    you for the accuracy of such information.It is solely your responsibility to
                    evaluate
                    the accuracy, completeness and usefulness of all information provided on this website.
                </p>
            </div>
            
            <div class="row"> 
                <h2>Confirming your booking and taking payment.</h2>
                <p class="long-copy">
                    -n most cases, we will confirm your booking immediately. But
                sometimes, we need to wait for the car hire company to confirm that a car is
                available.We will tell you straight away if this happens, and temporarily block
                the money on your payment card. As soon as they confirm your car, we will let you
                know, and take the money from your card.
                Until your car is confirmed, you can ‘void’ the payment at any time. Just hit
                ‘Manage booking’ at the top of our site, enter your email and reservation number,
                then hit ‘Cancel Booking’.We will unblock the money on your card.

                Very rarely, a company can’t confirm that a car is available. If this happens, we
                will tell you, and unblock the money on your card.

                When you book a car or other product on our site, we will email you to confirm its
                availability within 48 hours of booking (or, if earlier, at least 24 hours before
                your pick-up time).We will then send you a booking confirmation.

                You will not have a contract until we have confirmed your booking and taken the
                payment. Even if someone else is paying,the contract will be with the person who
                made the booking, and we will send all correspondence to the address they provide.
                For the avoidance of doubt,nothing in these terms shall entitle any third party to
                any benefit or rights pursuant to the Contracts (Rights of Third Parties) Act 1999.
                </p>
            </div>
            
            <div class="row"> 
                <h2>Driving Areas.</h2>
                <p class="long-copy">
                    -Restrictions may be applicable when taking the hire car to a different
                    country/state/island; our Contact Centre must therefore be advised at the time of
                    booking whether you, the renter, intend to do this.Additional documentation may be
                    required and local charges may apply for travel to certain countries. Restrictions may
                    also apply in remote areas such as the Australian outback; please check with our
                    Contact Centre.
                </p>
            </div>
        </section>
</body>

</html>