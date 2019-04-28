<!DOCTYPE html>
<!--[if lte IE 8]>              <html class="ie8 no-js" lang="en">     <![endif]-->
<!--[if IE 9]>					<html class="ie9 no-js" lang="en">     <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html >  <!--<![endif]-->
<head>
	<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz|Open+Sans:400,600,700|Oswald|Electrolize' rel='stylesheet' type='text/css' />
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<title>Car Dealer | Home</title>
	
	
	<link rel="stylesheet" href="css/style3.css" media="screen" />

</head>
<body>	
<?php require_once('connect.php'); ?>

<?php
session_start();
$b = 'Chiangmai';
$carArray = array(0,0,0,0,0,0);
if(isset($_GET['branchsubmit'])){
   $select = $_GET['branch'];
switch ($select) {
    case "Chiangmai":
        $b = 'Chiangmai';

        break;
    case "Phuket":
        $b = 'Phuket';

        break;
    case "Chonburi":
       $b ='Chonburi';

        break;
    case "KhonKaen":
         $b = 'KhonKaen';

        break;
    
}


}
$_SESSION['branch']=$b;
$i=0;
$q = "SELECT COUNT(*) as COUNT FROM Car right OUTER JOIN CarType ON Car.CAR_TYPE_ID = CarType.CAR_TYPE_ID , Branch WHERE Car.AVAILABLE=1  AND Branch.BRANCH_ID = Car.BRANCH_ID AND Branch.COUNTRY ='".$b."' GROUP BY CarType.CAR_TYPE_ID 
ORDER BY Car.CAR_TYPE_ID";
$result=$mysqli->query($q);
if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
				
					}
	 while($row=$result->fetch_array()){
        
        $carArray[$i] = $row['COUNT'];
        $i++;

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
                    <li><a href="promotion.php">Promotion</a></li>
                    <li><a href="service.php">Our service</a></li>
                    <li><a href="policy.php">Policy</a></li>
                    <li><a href="location.php">Locations</a></li>
                    <?php if(isset($_SESSION["user"]) && $_SESSION["status"]=="1"){
 echo "<li><a href='cart.php'>Cart</a></li>";
 
}
 ?>
      </ul>
      <div class="clear"></div>
    </nav>
  </header>

<!-- - - - - - - - - - - - - main part - - - - - - - - - - - - - - - - -->
	
			<section class="container" >
				
				<div class="list-cars">


 <br>					<div class="sidenav">
 <br>
 					

  
  <form action="selectcar.php" method="get">
  	<br>
     <b>Select Branch</b>
     <br>
     <br>
  <select name= 'branch'>
  <option value="Chiangmai">Saki Chiangmai</option>
  <option value="Phuket">Saki Phuket</option>
  <option value="Chonburi">Saki Chonburi</option>
  <option value="KhonKaen" >Saki KhonKaen</option>
</select>
<br>
<br>
<input type="submit" name="branchsubmit">

</form>
</div>
					
					<h3 class="widget-title">List of Cars :   <?php echo $b; ?></h3>

					<ul class = "box3" >

						<li>

							<img src="images/image1.jpg" alt="" />
							

						
								<h6 >Eco Car  &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $carArray[0]; ?>  </h6>
							

							<div class="detailed">
								<span class="cost">500 - 1000 THB/D</span>
								<span><h4>Save Fuel</h4></span>
							</div><!--/ .detailed-->

							<?php 
							echo "<a href='ecocar.php?branch=".$b."' class='button orange'>View</a>"?>
							<label class="compare"><input type="checkbox" />wishlist</label>

						</li>

						<li>
							
							<img src="images/image2.jpg" alt="" />


							<a href="businesscar.html" >
								<h6 >Business Car &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $carArray[1]; ?>  </h6>
							</a>

							<div class="detailed">
								<span class="cost">1500-2000 THB/D</span>
								<span><h4>Business Deal</h4></span> 
							</div><!--/ .detailed-->

							<?php 
							echo "<a href='businesscar.php?branch=".$b."' class='button orange'>View</a>"?>
							<label class="compare"><input type="checkbox" />Wishlist</label>

						</li>

						<li>
							<img src="images/image3.jpg" alt="" />

							

							<a href="#" >
								<h6 >Luxury Car &nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;<?php echo $carArray[2]; ?></h6>
							</a>

							<div class="detailed">
								<span class="cost">2000-3000 THB/D</span>
								<span><h4>Comfortable</h4></span> 
							</div><!--/ .detailed-->

							<?php 
							echo "<a href='luxurycar.php?branch=".$b."' class='button orange'>View</a>"?>
							<label class="compare"><input type="checkbox" />Wishlist</label>

						</li>

					

					</ul>

					<ul class="box3">

						<li>
							
							<img src="images/image4.jpg" alt="" />


							<a href="#" >
								<h6 class="title-list-item">Van</h6>
							</a>

							<div class="detailed">
								<span class="cost">3500-4000 THB/D</span>
								<span><h4>Family Time</h4></span> 
							</div><!--/ .detailed-->

							<a href="#" class="button orange">Coming soon</a>
							<label class="compare"><input type="checkbox" />New year 2019</label>

						</li>

						<li>
							
							<img src="images/image5.jpg" alt="" />


							<a href="#" >
								<h6 class="title-list-item">Hyper Car</h6>
							</a>

							<div class="detailed">
								<span class="cost">12000-20000 THB/D</span>
								<span><h4>Racing</h4></span> 
							</div><!--/ .detailed-->

							<a href="#" class="button orange">Coming soon</a>
							<label class="compare"><input type="checkbox" />New year 2019</label>

						</li>

						<li>
							<img src="images/image6.jpg" alt="" />

							
							<a href="#" >
								<h6 class="title-list-item">Off road</h6>
							</a>

							<div class="detailed">
								<span><h4>Natural Terrain</h4></span> 
								<span class="cost">7000-10000 THB/D</span>
								
							</div><!--/ .detailed-->

							<a href="#" class="button orange">Coming soon</a>
							<label class="compare"><input type="checkbox" />New year 2019</label>

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
