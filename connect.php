<?php

    $mysqli = new mysqli('localhost','root','','CarRentalV2');
   if($mysqli->connect_errno){
      echo $mysqli->connect_errno.": ".$mysqli->connect_error;
   }
 ?>
