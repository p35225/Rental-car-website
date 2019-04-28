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
$b = $mysqli->query($q);
$branch = $b->fetch_array();
$_SESSION['branch'] = $branch['branch'];
?>	
<div >
<header>
<?php  include('staffnav.php');?>
</header>

<p class="branch"><?php echo "Branch : ".$_SESSION['branch']; ?></p>


<table boarder='1' class='table2' align='center'>
<tr class='tr' >
<th style='width:8%'>Order ID</th>
<th style='width:8%'>USERNAME</th>
<th style='width:8%'>CAR_ID</th>
<th style='width:8%'>MODEL</th>
<th style='width:8%'>CAR TYPE</th>

<th style='width:8%'>Payment</th>
<th style='width:8%'>Car status</th>

<th style='width:8%'>Start date</th>

<th style='width:8%'>End date</th>
<th style='width:8%'>Total price</th>

</tr>

</table>
<div class='content2' >

<?php $q =" SELECT * FROM Rent , Model , Branch , Brand , Car ,CarType,Clients ,MethodOfPayment WHERE Rent.BRANCH_ID = Branch.BRANCH_ID AND Rent.CAR_ID=Car.CAR_ID AND Car.MODEL_ID = Model.MODEL_ID AND Car.CAR_TYPE_ID =  CarType.CAR_TYPE_ID AND Car.BRANCH_ID = Brand.CAR_BRAND_ID AND Rent.PAYTYPE_ID = MethodOfPayment.TYPE_ID AND Clients.USERNAME = Rent.USERNAME AND Branch.BRANCH_NAME =  '".$_SESSION['branch']."' ORDER BY Rent.RENTAL_ID" ;
  $rent = $mysqli->query($q);

?>	
<?php while ($row = $rent -> fetch_array()) {
	# code...
		$carstatus = "In use";

	if($row['CLIENT_STATUS']==1){
		$carstatus = "In use";
	}else {

		$carstatus = "Returned";

	}

	echo  "<table class='table1'>";

             

           echo  "<td style='width:8%'>".$row['RENTAL_ID']. "</td>" ; 
           echo  "<td style='width:8%'>".$row['USERNAME']. "</td>" ; 
           echo  "<td style='width:8%'>".$row['CAR_ID']. "</td>" ; 
           echo  "<td style='width:8%'>".$row['MODEL_NAME']. "</td>" ; 
           echo  "<td style='width:8%'>".$row['TYPENAME']. " </td>" ; 
           echo  "<td style='width:8%'>".$row['TYPE_NAME']. "</td>" ; 
           echo  "<td style='width:8%'>".$carstatus. "</td>" ; 
           echo  "<td style='width:8%'>".$row['START_DATE_RENT']. "</td>" ; 
           echo  "<td style='width:8%'>".$row['END_DATE_RENT']. "</td>" ; 
           echo  "<td style='width:8%'>".$row['TOTAL_PRICE']. " </td>" ; 


    
       echo "</table>";

       
}?>

</div>


</body>
</html>

