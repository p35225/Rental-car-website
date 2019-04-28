<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" media="screen" href="css/user.css">

</head>
<body>
<?php require_once('connect.php'); ?>
<?php
session_start();
$b_id = 0;
  $username = $_SESSION['user'];
  $price = $_SESSION['price'];
  $model = $_SESSION['model'];
  $branch = $_SESSION['branch'];
 $Sdate = $_SESSION['Sdate'];
 $Edate = $_SESSION['Edate'];
 $Pcode = $_SESSION['Pcode'];
 $payid = $_SESSION['Mpay'];
 $carid ="";
 

 
  $q = "SELECT Car.CAR_ID as carid FROM Car,Branch,Model WHERE Car.BRANCH_ID = Branch.BRANCH_ID AND Car.MODEL_ID=Model.MODEL_ID AND Branch.COUNTRY = '".$branch."' and Model.MODEL_NAME='".$model."' and Car.AVAILABLE=1 
LIMIT 0 ,1;";

   $fecthcar = $mysqli->query($q);
   $fecthid = $fecthcar->fetch_array();
   $carid = $fecthid['carid'];
   
  $_SESSION['carid'] = $carid;
 


?> 

<?php
   if(isset($_POST["confirm"])){
       $b = "SELECT BRANCH_ID FROM Branch WHERE BRANCH_NAME = 'SAKI ".$branch."'";
       $Qb_id =$mysqli->query($b);
       $Fb_id = $Qb_id->fetch_array();
       $b_id = $Fb_id['BRANCH_ID'];
        if($_SESSION['Pcode']== ""){
          $r= "INSERT INTO `Rent` ( `BRANCH_ID`, `USERNAME`, `CAR_ID`, `PAYTYPE_ID`, `START_DATE_RENT`, `END_DATE_RENT`,`TOTAL_PRICE`) VALUES ( '".$b_id."', '".$username."', '".$carid."', '".$payid."', '".$Sdate."', '".$Edate."','".$_SESSION['totalprice']."')";

        }else{
       $r= "INSERT INTO `Rent` ( `BRANCH_ID`, `USERNAME`, `CAR_ID`, `PAYTYPE_ID`, `START_DATE_RENT`, `END_DATE_RENT`, `PROMOTION`,`TOTAL_PRICE`) VALUES ( '".$b_id."', '".$username."', '".$carid."', '".$payid."', '".$Sdate."', '".$Edate."', '".$Pcode."','".$_SESSION['totalprice']."')";}
       
       $update_car = "UPDATE `Car` SET `AVAILABLE` = '0' WHERE `Car`.`CAR_ID` =".$carid;
       $update_user = "UPDATE `Clients` SET `CLIENT_STATUS` = '1' WHERE `Clients`.`USERNAME` = '".$username."'";


        
        
       if(($mysqli->query($r))&&($mysqli->query($update_car))&&($mysqli->query($update_user))){

        $q="select CLIENT_STATUS as active from Clients where USERNAME='".$username."'";
        $status =$mysqli->query($q);
        $Fstatus = $status->fetch_array();
        $_SESSION['active'] = $Fstatus['active'];

           header("Location: Thankyou.php");
       }else{

        echo "Error";
       }




    

   }
  ?>

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

<div class="main">
  <h2 class="Hfont">Confirmation</h2>
  <hr>
  <br>
  <p> You selected : <b><?php echo "    ".$model; ?></b></p>
  <p>Price / Day : <b><?php echo "    ".$price;?></b> </p>
  <p>Branch :<b><?php echo "    ".$branch; ?> </b> </p>
  <p>Start date:<b><?php echo "    ".$Sdate; ?> </b> </p>
  <p>End date:<b><?php echo "    ".$Edate; ?> </b> </p>
  <p>Car id:<b><?php echo "    ".$carid; ?> </b> </p>
  <?php

  $start = strtotime($Sdate);
  $end = strtotime($Edate);
  $days = ceil(abs($end - $start) / 86400)+1;
    $d='day';
   if($days>1){
    $d = 'days';
   }
   echo "<p>Period of time : <b>".$days." ".$d."</b></p>";
   $totalprice = $price*$days;
   
    
    if($Pcode==""){
    
    echo "<p>Discount :  <b>No discount</b> </p>";
    echo "<p>Total Price: <b>".$totalprice." Bath </b></p>";

    }else{

      $p="SELECT DISCOUNT  as discount FROM PROMOTION WHERE PROMOTION.ACTIVE=1 AND PROMOTION.PROMOTION='".$Pcode."'";
       $promotion = $mysqli->query($p);
       $fetchP = $promotion->fetch_array();
       $discount = $fetchP['discount'];
       $Dtotalprice = $totalprice*(100-$discount)/100;
       $D_amount = $totalprice*$discount/100;
       $totalprice = $Dtotalprice;

    
     echo "<p>Discount :  <b>".$discount."% </b></p>";
     echo "<p>Discount amount <b>:  ".$D_amount." Bath </b></p>";
     echo "<p>Total Price: <b>".$Dtotalprice." Bath</b></p>";

    }
    $_SESSION['totalprice']=$totalprice;

   ?>

  <br>
  <br>
  
  <br>
  <form action="confirm.php" method="POST">


    <button type="Submit" name="confirm"  >Confirm</button>
    
    <a href="cart.php" >back</a>
  </form>
  
   
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>

  </div>  
  
</div>
     
</body>
</html> 

