<html>
<body>
<?php
    session_start();
    function rec_post($a,$connect)
    {
        if (isset($_POST[$a]) && strlen($_POST[$a]) > 0)
            return $connect->real_escape_string($_POST[$a]);//refuse command inserted that may damage database(security)
        
        return False;
    }
    
    
    // phpinfo();
    
 include('connect.php');
    $var1 = rec_post('username',$mysqli);
    $var2 = rec_post('psw',$mysqli);
   
    
    $q="select * from Clients where USERNAME='".$var1."' and PASSWORD='".$var2."' ";
    $q2="select * from Admin where USERNAME='".$var1."' and PASSWORD='".$var2."' ";
   $q3="select * from Clients where USERNAME='".$var1."'";
     $q31="select * from Admin where USERNAME='".$var1."'";
    $q4="select * from Clients where PASSWORD='".$var2."' ";
   $q41="select * from Admin where PASSWORD='".$var2."' ";
        
    
$result1=$mysqli->query($q);
$count1=$result1->num_rows;
$result2=$mysqli->query($q2);
$count2=$result2->num_rows;
$result3=$mysqli->query($q3);
$count3=$result3->num_rows;
    $result31=$mysqli->query($q31);
    $count31=$result31->num_rows;
$result4=$mysqli->query($q4);
$count4=$result4->num_rows;
    $result41=$mysqli->query($q41);
    $count41=$result41->num_rows;
    if($count1==1){
        
        
        
        
        $_SESSION["user"] = $var1;
        $_SESSION["status"]="1";
        $q="select CLIENT_STATUS as active from Clients where USERNAME='".$var1."'";
        $status =$mysqli->query($q);
        $Fstatus = $status->fetch_array();
        $_SESSION['active'] = $Fstatus['active'];
        header("Location: index.php");


    }
    else if($count2==1){
        
       
        header("Location: indexstaff.php");
         $_SESSION["admin"] = $var1;
        $_SESSION["status"]="2";

    }
    else{
        if(isset($_SESSION["fail"])){
            header("Location: deletesession2.php");
        }
       
        if($count3==1 || $count31==1){$_SESSION["fail"]="1";}
        elseif($count4==1 || $count41==1){$_SESSION["fail"]="2";}
        else{$_SESSION["fail"]="3";}
        
         header("Location: login.php");
    }
    
?>
</body>
</html>
