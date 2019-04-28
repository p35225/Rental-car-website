<?php
  if(isset($_POST['registsubmit'])){
  if($_POST['psw']==$_POST['cpsw']){
    
    function rec_post($a,$connect)
    {
        if (isset($_POST[$a]) && strlen($_POST[$a]) > 0)
            return $connect->real_escape_string($_POST[$a]);//refuse command inserted that may damage database(security)
        
        return False;
    }

        
        // phpinfo();
        
        
        
       


    
    $fname = rec_post('firstname',$mysqli);
    $lname = rec_post('lastname',$mysqli);
    $adress = rec_post('adress',$mysqli);
    $phone = rec_post('phone',$mysqli);
    $Bdate = rec_post('birthdate',$mysqli);
    $email = rec_post('email',$mysqli);
    $username = recc_post('username',$mysqli);
    $psw = rec_post('psw',$mysqli);
    $sex = rec_post('sex',$mysqli);

    if ($fname && $lname && $adress && $phone && $Bdate && $email && $username &&$psw &&$sex)
    {
        
        
        $q = "INSERT INTO `Clients` ( `FIRST_NAME`, `LAST_NAME`, `SEX`, `ADDRESS`, `PHONE`, `DATE_OF_BIRTH`,  `CLIENT_STATUS`, `USERNAME`, `PASSWORD`) VALUES ( '".$fname."', '".$lname."', '".$sex."', '".$adress."', '".$phone."', '".$Bdate."',  '0', '".$username."', '".$psw."')";
        
        
        if (!$mysqli->query($q))
        {
            echo "INSERT FAIL!!! --> " . $q;
        }
        else
        {
            header("Location: login.php");
        }
        
        
    }

}else{

    $pass_warn = "passwords do not match."


}
}
    
    ?>
