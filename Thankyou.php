<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="css/user.css">

</head>
<body>

<div class="sidenav">
  <?php if(isset($_SESSION["user"]) && $_SESSION["status"]=="1"){
     echo " <b> ".$_SESSION['user']."</b>";
  } 
  ?>
  <a href="index.php" >Home</a>
  <a href="selectcar.php">Select Car</a>
  <a href="promotion.php">Promotion</a>
  <a href="policy.php">Policy</a>
  <a href="user.php">Profile</a>
  <a href="cart.php">Cart</a>

</div>
<?php require_once('connect.php'); ?>
<?php 
 session_start();

?>
<div class="main">
  <h2 class="Hfont">Payment successful </h2>
  <hr>
  
  <br>
  <p>Thankyou for choose our service.</p>
  <br>
  <form action="index.php">
    <button type="submit"> Go Home</button>
   </form>
 
  </div>  
  
</div>
     
</body>
</html> 

