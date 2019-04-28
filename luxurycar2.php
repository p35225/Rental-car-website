<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html >  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css' />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<title>Car Dealer | Home</title>
	
	
	<link rel="stylesheet" href="css/style3V.css" media="screen" />

</head>
<body>	
	<?php require_once('connect.php'); ?>
	<?php 
   if(isset($_POST["NotRent"])){
   	$message = "This Model of Car out of Stock. You can not rent this car.";
    echo "<script type='text/javascript'>alert('".$message."');</script>";

   }


   ?>

<?php
session_start();
if(isset($_SESSION['branch'])){

$branch = $_SESSION['branch'];


  $q1 ="SELECT COUNT(*) as COUNT from Car , Branch , CarType , Model WHERE Car.BRANCH_ID = Branch.BRANCH_ID AND  Car.MODEL_ID = Model.MODEL_ID AND Car.CAR_TYPE_ID=CarType.CAR_TYPE_ID AND Branch.COUNTRY='".$branch."'AND CarType.TYPENAME = 'LUXURY CAR' AND Car.AVAILABLE = 1 AND Model.MODEL_ID = 7 ";
 
 $q2 = "SELECT COUNT(*) as COUNT from Car , Branch , CarType , Model WHERE Car.BRANCH_ID = Branch.BRANCH_ID AND  Car.MODEL_ID = Model.MODEL_ID AND Car.CAR_TYPE_ID=CarType.CAR_TYPE_ID AND Branch.COUNTRY= '".$branch."' AND CarType.TYPENAME = 'LUXURY CAR' AND Car.AVAILABLE = 1 AND Model.MODEL_ID= 8 ";




 $q3 = "SELECT COUNT(*) as COUNT from Car , Branch , CarType , Model WHERE Car.BRANCH_ID = Branch.BRANCH_ID AND  Car.MODEL_ID = Model.MODEL_ID AND Car.CAR_TYPE_ID=CarType.CAR_TYPE_ID AND Branch.COUNTRY= '".$branch."' AND CarType.TYPENAME = 'LUXURY CAR' AND Car.AVAILABLE = 1 AND Model.MODEL_ID = 9 ";
 

  $car1 = $mysqli->query($q1);
  $car1AV = $car1->fetch_array();
  $car2 = $mysqli->query($q2);
   $car2AV = $car2->fetch_array();
  $car3 = $mysqli->query($q3);
   $car3AV = $car3->fetch_array();


}

?>	
 <?php 
   if(isset($_POST["NotRent"])){
   	$message = "This Model of Car out of Stock. You can not rent this car.";
    echo "<script type='text/javascript'>alert('".$message."');</script>";

   }


   ?>


<div>
<header>
    <div class="main wrap">      

  <?php
    
    
    if(isset($_SESSION["user"]) && $_SESSION["status"]=="1"){?>
<div>    
<h3 class="custom-button"><b>
<?php echo "Hello ". $_SESSION["user"];?></b>
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
                    <li><a href="promotion.html">Promotion</a></li>
                    <li><a href="service.html">Our service</a></li>
                    <li><a href="policy.html">Policy</a></li>
                    <li><a href="location.html">Locations</a></li>
      </ul>
      <div class="clear"></div>
    </nav>
  </header>

<!-- - - - - - - - - - - - - main part - - - - - - - - - - - - - - - - -->
	
			<section class="container" >
				
				<div class="list-cars">


					
					<h3 class="widget-title">Luxury Car</h3>

					<ul class = "box3" >

						<li>
							<div class="rcorners">

							<img src="images/benz.jpg" alt="" />
							

							<a href="#" >
								<h6 > C-Class </h6>
							</a>

							<div class="detailed">
								<span class="cost">2500  THB/D</span>
								<span><h4>Available : <?php echo $car1AV['COUNT']; ?></h4></span>
							</div><!--/ .detailed-->

							<?php if($car1AV['COUNT']!=0){

    ?>
								<form action="cart.php" method="post">
 
  <input type="hidden" name="price" value="2500">
  <input type="hidden" name="model" value="Benz C-CLASS">
  <input type="hidden" name="branch" value=<?php echo $branch;?>>

  
  <input class="button orange" type="submit" value="Rent" name="Rent">
</form>
 <?php }else{ ?>
     
     <form action="ecocar.php" method="post">
 
  

  
  <input class="button orange" type="submit" value="Rent" name="NotRent">
</form>
   

  
  






 <?php } ?>
						
						</div>

						</li>

						<li>
							<div class="rcorners">
							
							<img src="images/bmw.jpg" alt="" />


							<a href="cart.html" >
								<h6 class="title-list-item">BMW Series 3</h6>
							</a>

							<div class="detailed">
								<span class="cost">2500 THB/D</span>
								<span><h4>Available : <?php echo $car2AV['COUNT']; ?></h4></span> 
							</div><!--/ .detailed-->
    <?php if($car2AV['COUNT']!=0){

    ?>
								<form action="cart.php" method="post">
 
  <input type="hidden" name="price" value="2500">
  <input type="hidden" name="model" value="BMW series3">
  <input type="hidden" name="branch" value=<?php echo $branch;?>>

  
  <input class="button orange" type="submit" value="Rent" name="Rent">
</form>
 <?php }else{ ?>
     
     <form action="ecocar.php" method="post">
 
  

  
  <input class="button orange" type="submit" value="Rent" name="NotRent">
</form>
  

  
  






 

  
  



 


 
						</div>

						</li>

					

					</ul>

					

					
					
				</div><!--/ .recent-list-cars-->
				
			</section><!--/ #content-->

			<!-- - - - - - - - - - - - - - end Content - - - - - - - - - - - - - - - - -->	


			<!-- - - - - - - - - - - - - - - Sidebar - - - - - - - - - - - - - - - - -->	

			

			<!-- - - - - - - - - - - - - end Sidebar - - - - - - - - - - - - - - - - -->

		<!--/.container -->

		<!-- - - - - - - - - - - - - end Container - - - - - - - - - - - - - - - - -->			
		
	

	
	<!-- - - - - - - - - - - - - - - Footer - - - - - - - - - - - - - - - - -->	
	
	
	
	<!-- - - - - - - - - - - - - - - end Footer - - - - - - - - - - - - - - - - -->		
	



</div>

</body>
</html>
