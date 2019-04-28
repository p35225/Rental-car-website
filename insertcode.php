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
<?php 
  $update_completed = "";
  if(isset($_POST['Psubmit'])){
    if ($mysqli->query("CALL update_newcode('".$_POST['discount']."','".$_POST['pcode']."','".$_POST['description']."')")) {
     
       $update_completed = "Update new code completed.";

  }else{
        
      $update_completed = " Error update new code.";
  }
}

?>	
<div >
<header>
<?php  include('staffnav.php');?>

</header>

<p class="branch"><?php echo "Branch : ".$_SESSION['branch']; ?></p>


<table boarder="1" class="table2" align="center">
<tr class="tr" >
<th style="width:30%">Promation code</th>
<th style="width:30%">Discount</th>
<th style="width:30%">Description</th>
<th style="width:10%">Insert</th>


</tr>

</table>
<div class="content2" >



	<table class='table1'>

             
       <form action="insertcode.php" method="post">
            <th style='width:30%'> <input type="text" name="pcode" required>  </td> 
            <th style='width:30%'> <input type="text" name="discount" required>  </td>
            <th style='width:30%'> <input type="text" name="description" required>  </td> 
           <th style='width:10%'><input type="submit" name="Psubmit"> </td> 
        </form>   
           


    
  </table>
  <?php 
    if($update_completed != ""){
      echo '<p style="text-align:center;font-size: 15px;color:red;">*'.$update_completed.'</p>';
    }
  ?>


</div>


</body>
</html>

