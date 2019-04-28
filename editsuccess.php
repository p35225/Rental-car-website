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
  <h2 class="Hfont">Edit Success</h2>
  <hr>
  <br>

  <form action="user.php">
    <button type="submit"> Go back</button>
   </form>
 
  </div>  
  
</div>
     
</body>
</html> 

