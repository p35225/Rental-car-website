<!DOCTYPE html>
<html>
<head>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>jQuery UI Datepicker - Default functionality</title>
  <link rel="stylesheet" type="text/css" media="screen" href="css/user.css">
  <link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
    <script>
    $(document).ready(function () {
        $('input[id$=tbDate]').datepicker({dateFormat: 'yy-mm-dd'});
        $('input[id$=tb2Date]').datepicker({dateFormat: 'yy-mm-dd'});
    });
</script>
</head>
<body>

</head>
<body>
<?php require_once('connect.php'); ?>
 <?php
 session_start();
 $pcode_error="";
 $date_error = "";
 $price = 0;
 $model ="";
 $branch="";
 $Sdate="";
 $Edate = "";

 if(isset($_POST['Rent'])){
  $_SESSION['branch'] = $_POST['branch'];
  $_SESSION['price'] = $_POST['price'];
  $_SESSION['model'] = $_POST['model'];
    

    if($_SESSION['status']!='1'){

   header("Location: login.php");}

 }
 $price = $_SESSION['price'];
  $model = $_SESSION['model'];
  $branch = $_SESSION['branch'];

 ?> 
 <?php
   if(isset($_POST['submit'])){


        if($_SESSION['active']==1 && $_SESSION['user']!=""){  
          $message = "You still rent our car and not return yet. Please,return our car  to rent new one.";
    echo "<script type='text/javascript'>alert('".$message."');</script>";
          

        }else{
        if(isset($_POST['pay'])&&($_POST['pay']!="")){
          $_SESSION['Mpay']=$_POST['pay'];
        }
        if(isset($_POST['Sdate'])&&($_POST['Sdate']!= "")&&isset($_POST['Edate'])&&($_POST['Edate']!="")){
          $Sdate = $_POST['Sdate'];
         $Edate = $_POST['Edate'];
     
        $now =time();
        $start1 = strtotime($Sdate);
       $end1 = strtotime($Edate);
       $days = ceil(($end1 - $start1) / 86400)+1;
       $checkcurrent = ceil(($start1 - $now) / 86400);
       if($days>0&&$checkcurrent>=0){
         $_SESSION['Sdate'] = $Sdate;
         $_SESSION['Edate'] = $Edate;
        
          $cp="SELECT PROMOTION  as pcode FROM PROMOTION WHERE PROMOTION.ACTIVE=1";
          $checkcode = $mysqli->query($cp);
          $validatecode = $checkcode->fetch_array();
    $Pcode=$_POST['Pcode'];
    if($Pcode==""|| in_array($Pcode, $validatecode)){

      $_SESSION['Pcode'] = $Pcode;
      
      $_SESSION['pcode_error'] = "";
      header("Location:confirm.php");

        }else{
          

          $_SESSION['pcode_error'] = "Invalid code";
          
          header("Location: cart.php");

        }

      

        
       }

        }
           
        $date_error = "Input Date again!";

      }
   }


   if($_SESSION['model']==""){
    header("Location:selectcar.php");
   }
 ?>
<div class="sidenav">
  <?php if(isset($_SESSION["user"]) && $_SESSION["status"]=="1"){
     echo " <b> ".$_SESSION['user']."</b>";
  } 
  ?>
  <a href="index.php" >Home </a>
  <a href="selectcar.php">Select Car</a>
  <a href="promotion.php">Promotion</a>
  <a href="policy.php">Policy</a>
  <a href="user.php">Profile</a>
  <a href="cart.php">Cart</a>

</div>

<div class="main">
  <h2 class="Hfont">Payment</h2>
  <hr>
  <br>
  <p> You selected : <b><?php echo $model; ?></b></p>
  <p>Price / Day : <b><?php echo $price;?></b> </p>
  <p>Branch :<b><?php echo $branch; ?> </b> </p>
  <br>
  <br>


  
  <form action="cart.php"   method="post">
     <input type="hidden" name="price" value=<?php echo "'".$price."'"; ?>>
     <input type="hidden" name="model" value=<?php echo "'".$model."'"; ?>>
      <input type="hidden" name='branch' value=<?php echo $branch; ?>>
     
  Start date: <input class="datebox" type="text" id="tbDate" name="Sdate"
   <?php if(isset($_SESSION['Sdate'])){
    echo "value='".$_SESSION['Sdate']."'";
  } ?>

  >
 
    
    <br>
    <br>
    
  End date  : <input  class="datebox" type="text" id="tb2Date" name="Edate"
<?php if(isset($_SESSION['Edate'])){
    echo "value='".$_SESSION['Edate']."'";
  } ?>
  >
  <?php
  if($date_error != "")
  echo "<p class='warn'>". $date_error." </p>";
?> 
    
    <br>
    <br>
    <label for="Pcode"><b>Promotion code  :&nbsp; </b></label>
    <input type="text" name="Pcode" >
    <?php
  if(isset($_SESSION['pcode_error'])&&$_SESSION['pcode_error'] != "")
  echo "<p class = 'warn'>".$_SESSION['pcode_error'] ." </p>";
?> 
    <br>
    <p><b>Payment Method</b></p>
    <br>
      <label class="radio-inline" >
      <input type="radio" name="pay" value="1" checked>credit card 
    </label>
    <label class="radio-inline">
      <input type="radio" name="pay" value="2">bank tranfer
    </label>
    <label class="radio-inline">
      <input type="radio" name="pay" value="3">
      cash
    </label>
     <label class="radio-inline">
      <input type="radio" name="pay" value="4">
      e-wallet
    </label>
    <br>
    <br>
    <br>
    <button type="Submit" name="submit"  >Submit</button>
  </form>  

 
 


  <br>
  <br>
  <hr>
  <br>
   
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

