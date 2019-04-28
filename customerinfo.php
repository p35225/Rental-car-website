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
include('connect.php'); ?>
<header>
<?php  include('staffnav.php');
$q = "SELECT Branch.BRANCH_NAME as branch from Branch , Admin WHERE Admin.BRANCH_ID=Branch.BRANCH_ID AND Admin.USERNAME = '".$_SESSION['admin']."' ";
$b = $mysqli->query($q);
$branch = $b->fetch_array();
$_SESSION['branch'] = $branch['branch'];

?>
</header>
<div >




<p class="branch"><?php echo "Branch : ".$_SESSION['branch']; ?> </p>
<table border="1" class="table2" align="center">
<tr class="tr" >
<th style="width:15%;text-align:center;">Username</th>
<th style="width:15%;text-align:center;">Name</th>
<th style="width:5%;text-align:center;">Sex</th>
<th style="width:15%;text-align:center;">Address</th>
<th style="width:10%;text-align:center;">Phone</th>
<th style="width:15%;text-align:center;">Status</th>



</tr>

</table>
<?php




     $q = "SELECT * FROM Rent , Clients ,Branch WHERE Rent.USERNAME = Clients.USERNAME AND Branch.BRANCH_ID = Rent.BRANCH_ID AND Branch.BRANCH_NAME ='".$_SESSION['branch']."' AND Clients.CLIENT_STATUS=1 GROUP BY Clients.USERNAME  ";
     $client = $mysqli->query($q);
     

    ?>
    <div class="content2" >
         <?php 

         while($row=$client-> fetch_array()){
          $tdcolor = 'white';
         	if($row['CLIENT_STATUS']==1){
         		$q= "SELECT * FROM Rent , Clients ,Branch WHERE Rent.USERNAME = Clients.USERNAME AND Clients.USERNAME = '".$row['USERNAME']."' ORDER BY Rent.END_DATE_RENT DESC LIMIT 0 ,1";
         		$return_date =$mysqli->query($q);
         		$Edate = $return_date->fetch_array();
                  $rent = 'Have to return in : '.$Edate['END_DATE_RENT'];

               $now =time();
               $endDate = strtotime($Edate['END_DATE_RENT']);
               $checkcurrent = ceil(( $endDate- $now) /  86400);


               if($checkcurrent > 0){

                $tdcolor = '#b2ffb2';

               }else{
                
                $tdcolor ='#ff9999';

               }


         	}else{

         		$rent = 'NOT RENT';
         	}
        echo  "<table class='table1'>";
          

           echo  "<td style='width:15%'>".$row['USERNAME']. "</td>" ; 
           echo  "<td style='width:15%'>".$row['FIRST_NAME']."  ".$row['LAST_NAME']. "</td>" ; 
           echo  "<td style='width:5%' align='center'>".$row['SEX']. "</td>" ; 
           echo  "<td style='width:15%'>".$row['ADDRESS']. "</td>" ; 
           echo  "<td style='width:10%'>".$row['PHONE']. " </td>" ; 
           echo  "<td style='width:15%' bgcolor='".$tdcolor. "'>".$rent. " </td>" ; 


    
       echo "</table>";
 }?>
 

</div>
<div>
    <br>
</div>



</body>
</html>