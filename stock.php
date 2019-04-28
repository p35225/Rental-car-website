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
<?php 
session_start();
include('connect.php');

$q = "SELECT Branch.BRANCH_NAME as branch from Branch , Admin WHERE Admin.BRANCH_ID=Branch.BRANCH_ID AND Admin.USERNAME = '".$_SESSION['admin']."' ";
$b = $mysqli->query($q);
$branch = $b->fetch_array();
$_SESSION['branch'] = $branch['branch'];


?>    
<div >
<header>
<?php include('staffnav.php'); ?>
</header>

    <p class="branch"><?php echo "Branch : ".$_SESSION['branch']; ?> </p>


    <table border="1" class="table2" align="center">
        <tr class="tr" >
            <th style="width:2.5%;text-align:center;">Car ID</th>
            <th style="width:10%;text-align:center;">Model</th>
            <th style="width:10%;text-align:center;">Brand</th>
            <th style="width:10%;text-align:center;">Type</th>
            <th style="width:10%;text-align:center;">Price/Day</th>
            <th style="width:10%;text-align:center;">Status</th>
            <th style="width:2.5%;text-align:center;">Delete</th>
        </tr>
    </table>
    <?php

     $q = "SELECT * FROM Car ,Branch , Brand ,CarType , Model WHERE Car.BRANCH_ID = Branch.BRANCH_ID AND Car.CAR_BRAND_ID = Brand.CAR_BRAND_ID AND Car.CAR_TYPE_ID = CarType.CAR_TYPE_ID AND  Car.MODEL_ID = Model.MODEL_ID AND Branch.BRANCH_NAME = '".$_SESSION['branch']."'";
     $car = $mysqli->query($q);
     

    ?>
    <div class="content2" >
         <?php while($row=$car-> fetch_array()){
            if($row['AVAILABLE']==1){
                $status = 'Available';

            }else{
                 $status = 'Unavailable';

            }
        echo  "<table class='table1'>";
          

           echo  "<td style='width:2.5%'>".$row['CAR_ID']. "</td>" ; 
           echo  "<td style='width:10%'>".$row['MODEL_NAME']. "</td>" ; 
           echo  "<td style='width:10%'>".$row['BRAND']. "</td>" ; 
           echo  "<td style='width:10%'>".$row['TYPENAME']. "</td>" ; 
           echo  "<td style='width:10%'>".$row['Price']. " </td>" ; 
           echo  "<td style='width:10%'>".$status. " </td>" ; 
           if($status=="Available"){
           echo  "<td style='width:2.5%' text-align:center><button>delete</button> </td>" ; }
           else if($status=="Unavailable"){
            echo "<td style='width:2.5%' text-align:center><button>______</button></td>";

           }



    
       echo "</table>";
 }?>

</div>
<div>
    <br>
</div>



</body>
</html>
