<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<?php  session_start();?>  
<?php  require_once('connect.php');   ?>

<?php
    if(isset($_SESSION['user'])){  
   $q = "SELECT * FROM `Clients` WHERE USERNAME ='".$_SESSION['user']. "'";
   $profile = $mysqli->query($q);
   $profileF = $profile -> fetch_array();
 }
 ?>
 <?php

   if(isset($_POST['confirmedit'])){

     $edit = "UPDATE `Clients` SET `PERSONAL_ID` = '".$_POST['pid']."', `FIRST_NAME` = '".$_POST['fname']."', `LAST_NAME` = '".$_POST['lname']."', `SEX` = '".$_POST['sex']."', `ADDRESS` = '".$_POST['address']."', `PHONE` = '".$_POST['phone']."', `DATE_OF_BIRTH` = '".$_POST['DOB']."', `CREDITCARD` = '".$_POST['credit']."' WHERE `Clients`.`USERNAME` = '".$_SESSION['user']."'";
      if($mysqli->query($edit)){
      header("Location:editsuccess.php");
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
  <h2 class="Hfont">User Information</h2>
  
  <hr>
  <br>
  <br>
  <div class="container">
    <form  action="user.php" method="post">
   <label class="box" for="fname" ><b >First Name : </b></label>
   <br>
    <input type="text" name="fname" <?php if(isset($profileF['FIRST_NAME'])){echo "value ='".$profileF['FIRST_NAME']."'";} ?> required>
    <br>
    <label for="lname"><b>Last Name : </b></label>
    <br>
    <input type="text" name="lname" <?php if(isset($profileF['LAST_NAME'])){echo "value ='".$profileF['LAST_NAME']."'";} ?>  required>
    <br>
    <label  for="sex"><b>Sex :</b></label>
    <br>
    <input type="text" name="sex"<?php if(isset($profileF['SEX']) && $profileF['SEX'] == 'M'){echo "value ='Male' ";}else{
echo "value ='Female' ";

    } ?>  required>
    <br>
    <label for="address"><b>Address :</b></label>
    <br>
    <input type="text" name="address" <?php if(isset($profileF['ADDRESS'])){echo "value ='".$profileF['ADDRESS']."'";} ?>  required>
    <br>
    <label for="phone" ><b >Phone : </b></label>
    <br>
    <input type="text" name="phone" <?php if(isset($profileF['PHONE'])){echo "value ='".$profileF['PHONE']."'";} ?>  required>
    <br>
    <label for="DOB" ><b >Birth Date : </b></label>
    <br>
    <input type="text" name="DOB" id='tbDate' <?php if(isset($profileF['DATE_OF_BIRTH'])){echo "value ='".$profileF['DATE_OF_BIRTH']."'";} ?>  required>
    <br>
    <label for="credit" ><b >CREDIT : </b></label>
   <br>
    <input type="text" name="credit" <?php if(isset($profileF['CREDITCARD'])){echo "value ='".$profileF['CREDITCARD']."'";} ?>  >
    <br>

    <label for="pid" ><b >PERSONAL ID : </b></label>
   <br>
    <input type="text" name="pid" <?php if(isset($profileF['PERSONAL_ID'])){echo "value ='".$profileF['PERSONAL_ID']."'";} ?>  required> 
    <br>
    
    <br>
    <div><button type="submit"  name="confirmedit">Confirm Edit</button> </div>
    </form>
    <br>
    <br>
    <br>
    <h2 class="Hfont">Rent History</h2>
    <hr>
    <table style="width:80%" align="center">
  <tr>
    <th style='width:1%'>No</th>
    <th style='width:33%' align="center">Model</th>
    <th style='width:33%' align="center">Branch</th>
    <th style='width:33%' align="center">Price</th>
  </tr>

  <?php $q="SELECT * FROM Rent , Branch , Model , Car WHERE Rent.BRANCH_ID=Branch.BRANCH_ID AND Rent.CAR_ID = Car.CAR_ID AND Car.MODEL_ID=Model.MODEL_ID AND Rent.USERNAME ='".$_SESSION['user']."'"; 
  if($mysqli->query($q))
  {
     $history = $mysqli->query($q);
     $i =1;

    while ($row = $history->fetch_array()) {
      
  ?>
  

  <tr>
    <td style='width:1%'><?php echo $i; ?></td>
    <td style='width:33%' align="center"><?php echo $row['MODEL_NAME'] ;?></td>
    <td style='width:33%' align="center"><?php echo $row['BRANCH_NAME'] ;?></td>
    <td style='width:33%' align="center"><?php echo $row['TOTAL_PRICE']." baht" ;?></td>
  </tr>
  <?php $i++;} }else{ ?>

    <tr>
    <td style='width:1%'>-</td>
    <td style='width:33%' align="center">-</td>
    <td style='width:33%' align="center">-</td>
    <td style='width:33%' align="center">-</td>
  </tr>
  <?php

  }?>

  </table>
  <br>
  <br>
  </div>  
  
</div>
     
</body>
</html> 

