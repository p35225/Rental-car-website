<!DOCTYPE html>
<html>
<head>
<title>Rent Car</title>



<link rel="stylesheet" type="text/css" media="screen" href="css/reset.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/slider.css">
<link rel="stylesheet" type="text/css" media="screen" href="css/best.css">
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300' rel='stylesheet' type='text/css'>

<!--[if lt IE 9]>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
<![endif]-->
</head>
<body>
<?php session_start();
    
include('connect.php');
  

$q = "SELECT Branch.BRANCH_NAME as branch from Branch , Admin WHERE Admin.BRANCH_ID=Branch.BRANCH_ID AND Admin.USERNAME = '".$_SESSION['admin']."' ";
$return = "";
$Cuser = "";
$Ccarid = "";
$b = $mysqli->query($q);
$branch = $b->fetch_array();
$_SESSION['branch'] = $branch['branch'];
?>	
<div >
<header>
<?php  include('staffnav.php');?>
<?php if(isset($_POST['returnconfirm'])){

         $update_car = "UPDATE `Car` SET `AVAILABLE` = '1' WHERE `Car`.`CAR_ID` =".$_POST['Ccarid'];
       $update_user = "UPDATE `Clients` SET `CLIENT_STATUS` = '0' WHERE `Clients`.`USERNAME` = '".$_POST['Cuser']."'";
       if(($mysqli->query($update_car))&&($mysqli->query($update_user))){ 
        $return = "User :".$_POST['Cuser']." already return  car id= ".$_POST['Ccarid']." to our store";

       }else{

        echo "error";
       }



}?>
<?php if(isset($_POST['submit'])&&$_POST['submit']=='confirm'){
     echo "returncar";

     $update_car = "UPDATE `Car` SET `AVAILABLE` = '1' WHERE `Car`.`CAR_ID` =".$_POST['carid'];
       $update_user = "UPDATE `Clients` SET `CLIENT_STATUS` = '0' WHERE `Clients`.`USERNAME` = '".$_POST['username']."'";

     if(($mysqli->query($update_car))&&($mysqli->query($update_user))){
          
          $return = "User : ".$_POST['username']." already returned ".$_POST['carid']." to stock in branch : ".$branch['branch'];
     }

 }?> 
</header>

<p class="branch"><?php echo "Branch : ".$_SESSION['branch']; ?></p>
<br>
<form name ="checkuser" action="carreturn.php" method="post">






<?php
    
    if(!isset($_POST['username'])  ){?>
<p style="font-weight:bold;text-align:center;font-size: 20px;"> Insert username  </p>
<input style="width:15%;margin-left:42.5%" type="text" name="username" >
<div class="best"><input style="cursor: pointer;margin-left: 42.5%;margin-top: 2%;border: none;outline: none;height: 30px;width:15%;background: #101e34;color: #fff;font-weight:bold;font-size: 15px;border-radius: 20px;"
type="submit" name="submituser " value="submit"/></div>
<?php }
    elseif(isset($_POST['username']) ){
        $q = "SELECT * FROM Clients WHERE USERNAME = '".$_POST['username']."'";
        
        $userinfo = $mysqli->query($q);
        $username = $userinfo -> fetch_array();
        if($username['USERNAME']==$_POST['username']&&$_POST['username']!=""&& $username['CLIENT_STATUS']==1){echo "";}
        else{?>
<p style="font-weight:bold;text-align:center;font-size: 20px;"> Insert username  </p>
<input style="width:15%;margin-left:42.5%" type="text" name="username" >
<input type="submit"  style="cursor: pointer;margin-left: 42.5%;margin-top: 2%;border: none;outline: none;height: 30px;width:15%;background: #101e34;color: #fff;font-weight:bold;font-size: 15px;border-radius: 20px;

" name="submituser " value="submit"/>
<?php }}
?>
  </form>

  
  <?php if($return != ""){
      echo "<br>";
      echo "<br>";
      
      echo '<p style="text-align:center;font-size: 15px;color:blue;">'.$return.'</p>';

  }?>







<?php
   if(isset($_POST['username'])){
    $q = "SELECT * FROM Clients WHERE USERNAME = '".$_POST['username']."'";
    
         $userinfo = $mysqli->query($q);
         $username = $userinfo -> fetch_array();
         if($username['USERNAME']==$_POST['username']&&$_POST['username']!=""){
            
        $userdetail=" SELECT * FROM Rent , Model , Branch , Brand , Car ,CarType,Clients ,MethodOfPayment WHERE Rent.BRANCH_ID = Branch.BRANCH_ID AND Rent.CAR_ID=Car.CAR_ID AND Car.MODEL_ID = Model.MODEL_ID AND Car.CAR_TYPE_ID =  CarType.CAR_TYPE_ID AND Car.BRANCH_ID = Brand.CAR_BRAND_ID AND Rent.PAYTYPE_ID = MethodOfPayment.TYPE_ID AND Clients.CLIENT_STATUS='1' AND Clients.USERNAME = Rent.USERNAME AND Branch.BRANCH_NAME =  '".$_SESSION['branch']."' AND Clients.USERNAME = '".$_POST['username']."' ORDER BY Rent.END_DATE_RENT DESC LIMIT 0,1";
        $check=$mysqli->query($userdetail);
        $count = $check->num_rows;
        if($count==1){

        $userinfo = $mysqli->query($userdetail);
          while ($row = $userinfo -> fetch_array()) {

   
    $Cuser = $row['USERNAME'];
    $Ccarid = $row['CAR_ID'];
    $carstatus = "In use";
              
    $q2 = "SELECT * FROM Model,Car where CAR_ID=".$row['CAR_ID']." and Model.CAR_TYPE_ID=Car.CAR_TYPE_ID";
    $res2 = $mysqli->query($q2);
              
              while($row2 = $res2->fetch_array())
              {
              
                  echo '<img style="border-radius: 8px;max-width: 27%;height: auto;display: block;margin-left: auto;margin-right: auto;" src='. $row['img'].'>';break;
                  
              }?><br><br><?php
   echo "<table boarder='1' class='table2' align='center'>";
echo "<tr class='tr' >";
echo "<th style='width:10%'>Order ID</th>";
echo "<th style='width:10%'>USERNAME</th>";
echo "<th style='width:10%'>CAR_ID</th>";
echo "<th style='width:10%'>MODEL</th>";
echo "<th style='width:10%'>CAR TYPE</th>";

echo "<th style='width:10%'>Payment</th>";
echo "<th style='width:10%'>Car status</th>";

echo "<th style='width:10%'>Start date</th>";

echo "<th style='width:10%'>End date</th>";
echo "<th style='width:10%'>Total price</th>";

echo "</tr>";

echo "</table>";

                      echo '<div style="margin-top:0px;margin-left:5%;width: 90%;overflow: auto;position:absolute;" >';
  echo  "<table class='table1'> ";

             

           echo  "<td style='width:10%'>".$row['RENTAL_ID']. "</td>" ;
           echo  "<td style='width:10%'>".$row['USERNAME']. "</td>" ;
           echo  "<td style='width:10%'>".$row['CAR_ID']. "</td>" ;
           echo  "<td style='width:10%'>".$row['MODEL_NAME']. "</td>" ;
           echo  "<td style='width:10%'>".$row['TYPENAME']. " </td>" ;
           echo  "<td style='width:10%'>".$row['TYPE_NAME']. "</td>" ;
           echo  "<td style='width:10%'>".$carstatus. "</td>" ;
           echo  "<td style='width:10%'>".$row['START_DATE_RENT']. "</td>" ;
           echo  "<td style='width:10%'>".$row['END_DATE_RENT']. "</td>" ;
           echo  "<td style='width:10%'>".$row['TOTAL_PRICE']. " </td>" ; 


    
       echo "</table>";
       echo "</div>";
}
 ?>
  <br><br>
  <div class="return">
 


<form action="carreturn.php" method="POST" >
  <input type="hidden" name="Cuser" value=<?php echo "'".$Cuser."'"; ?>>
      <input type="hidden" name="Ccarid" value=<?php echo "'".$Ccarid."'"; ?>>
<input  style="cursor:pointer;margin-left: 34.5%;margin-top: 0%;border: none;outline: none;height: 30px;width:15%;background: #101e34;color: #fff;font-weight:bold;font-size: 15px;border-radius: 20px;" type="submit" name="back" value="Back">


 <input style="cursor: pointer;margin-left: 1%;margin-top: 0%;border: none;outline: none;height: 30px;width:15%;background: #101e34;color: #fff;font-weight:bold;font-size: 15px;border-radius: 20px;"id="RC" type="submit" name="returnconfirm" value="Confirm Return">
</form>




 </div>

 <?php   

  }else {

    echo '<p style="text-align:center;font-size: 15px;color:red;">*User : '.$username['USERNAME'].' has  no  rent record  of branch : '.$_SESSION['branch'].' / already return car.';
    


  }




     



         
   
     }else{
      
         echo '<p style="text-align:center;font-size: 15px;color:red;" > *Not found Username: '.$_POST['username'].'</p>';
     }
         
   }
?>
<br>
<br>



</div>


</body>
</html>

