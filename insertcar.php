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
$insert_completed = "";
$q = "SELECT Branch.BRANCH_NAME as branch , Branch.BRANCH_ID as branch_id from Branch , Admin WHERE Admin.BRANCH_ID=Branch.BRANCH_ID AND Admin.USERNAME = '".$_SESSION['admin']."' ";
$b = $mysqli->query($q);
$branch = $b->fetch_array();
$_SESSION['branch'] = $branch['branch'];
$_SESSION['branch_id'] = $branch['branch_id'];
?>	
<div >
<header>
<?php  include('staffnav.php');?>
</header>

<p class="branch"><?php echo "Branch : ".$_SESSION['branch']; ?></p>


<table boarder="1" class="table2" align="center">
<tr class="tr" >
<th style="width:25%">MODEL</th>
<th style="width:25%">BRAND</th>
<th style="width:25%">TYPE</th>
<th style="width:10%">INSERT</th>


</tr>

</table>
<div class="content2" >

<?php $Qmodel =" SELECT * FROM Model " ;
  $model_query = $mysqli->query($Qmodel);

  $Qbrand = "SELECT * FROM Brand";
  $brand_query = $mysqli->query($Qbrand);

  $QType = "SELECT * FROM  CarType";
  $type_query = $mysqli->query($QType);


?>	

<?php 
   if(isset($_POST['addcar'])){
     $q = "INSERT INTO `Car` (`CAR_ID`, `BRANCH_ID`, `MODEL_ID`, `CAR_BRAND_ID`, `CAR_TYPE_ID`, `AVAILABLE`, `MAINTENANCE_STATUS`) VALUES (NULL, '".$_SESSION['branch_id']."', '".$_POST['model']."', '".$_POST['brand']."', '".$_POST['type']."', '1', '0');";
     if($mysqli->query($q)){
          $Qcarname =  "SELECT MODEL_NAME as name from  Model WHERE MODEL_ID='".$_POST['model']."'";
          $query_carname = $mysqli -> query($Qcarname);
          $carname = $query_carname->fetch_array();
          $_SESSION['model'] = $_POST['model'];
          $_SESSION['type']= $_POST['type'];
          $_SESSION['brand'] = $_POST['brand'];

      
         $insert_completed= "Insert car: ".$carname['name']." to  branch: " .$_SESSION['branch']." completed.";
     }else{
            
            $insert_completed="Insert not complete.";

     }
    


   }

?>
<?php 
  
	echo  "<table class='table1'>";

            echo "<form action='insertcar.php' method = 'post'>";

           echo  "<td style='width:25%'><select name = 'model'>";
           while ($model_row = $model_query->fetch_array()) {
            if($_SESSION['model']==$model_row['MODEL_ID']){
              $select1='selected';
            }else{
              $select1='';
            }
             echo "<option value='".$model_row['MODEL_ID']. "' ".$select1.">".$model_row['MODEL_NAME']. "</option>";
           
           }
           echo  "</select></td>" ; 
           
           echo  "<td style='width:25%'><select name = 'brand'>";
           while ($brand_row = $brand_query->fetch_array()) {
            if($_SESSION['brand']==$brand_row['CAR_BRAND_ID']){
              $select2='selected';
            }else{
              $select2='';
            }
             echo "<option value='".$brand_row['CAR_BRAND_ID']. "' ".$select2.">".$brand_row['BRAND']. "</option>";
           }
           echo  "</select></td>" ; 



           echo  "<td style='width:25%'><select name = 'type'>";
           while ($type_row = $type_query->fetch_array()) {
            if($_SESSION['type']==$type_row['CAR_TYPE_ID']){
              $select3='selected';
            }else{
              $select3='';
            }
             echo "<option value='".$type_row['CAR_TYPE_ID']. "' ".$select3.">".$type_row['TYPENAME']. "</option>";
           }
           echo  "</select></td>" ; 


           echo  "<td style='width:10%'>";
            echo " <input type = 'submit' name ='addcar' value='Add'>";
           echo  "</td>" ; 
           


    
       echo "</table>";

       echo "</form>";

    if($insert_completed!=""){
         echo "<br>";
         echo "<br>";
         echo '<p style="text-align:center;font-size: 15px;color:gray;">'.$insert_completed.'</p>';
    }

?>

   


</div>


</body>
</html>

