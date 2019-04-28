

<?php
    
    // phpinfo();
    
    include('connect.php');
    
    
     $pass_warn="";
     $same_user ="";
    
    if ($mysqli->connect_errno)
    {
        echo "Connection Fail!!!";
    }
    
   
    
    ?>
<!DOCTYPE html>
<html>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

/* Full-width input fields */
input[type=text], input[type=password] {
width: 100%;
padding: 15px;
margin: 5px 0 22px 0;
display: inline-block;
border: none;
background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
    background-color: #ddd;
outline: none;
}

hr {
border: 1px solid #f1f1f1;
    margin-bottom: 25px;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
color: white;
padding: 14px 20px;
margin: 8px 0;
border: none;
cursor: pointer;
width: 100%;
opacity: 0.9;
}

button:hover {
opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
padding: 14px 20px;
    background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
margin: 10px;
width: 20%;
    
}

/* Add padding to container elements */
.container {
    padding-top: 8%;
    padding-left: 15%;
    padding-right :15%;
    padding-bottom: 10%
}

/* Clear floats */
.clearfix::after {
content: "";
clear: both;
display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
    .cancelbtn, .signupbtn {
    width: 100%;
    }
}
</style>
<head><link href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/base/jquery-ui.css" rel="stylesheet" />
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
    <script>
    $(document).ready(function () {
        $('input[id$=tbDate]').datepicker({dateFormat: 'yy-mm-dd'});
        $('input[id$=tb2Date]').datepicker({dateFormat: 'yy-mm-dd'});
    });
</script></head>
<body>
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
    $username = rec_post('username',$mysqli);
    $psw = rec_post('psw',$mysqli);
    $sex = rec_post('sex',$mysqli);

    if ($fname && $lname && $adress && $phone && $Bdate && $email && $username &&$psw &&$sex)
    {
        
        
        $q = "INSERT INTO `Clients` ( `FIRST_NAME`, `LAST_NAME`, `SEX`, `ADDRESS`, `PHONE`, `DATE_OF_BIRTH`,  `CLIENT_STATUS`, `USERNAME`, `PASSWORD`) VALUES ( '".$fname."', '".$lname."', '".$sex."', '".$adress."', '".$phone."', '".$Bdate."',  '0', '".$username."', '".$psw."')";
        
        
        if (!$mysqli->query($q))
        {
            $same_user="  :  username already used";
        }
        else
        {
            header("Location: login.php");
        }
        
        
    }

}else{

    $pass_warn = "* passwords do not match.";


}
}
    
    ?>

<form action="register.php" method="POST" style="border:1px solid #ccc">
<div class="container">
<h1>Sign up</h1>

<hr>
<label for="psw"><b>Username</b></label><?php if($same_user!=""){
    echo "<font color='red'>".$same_user."</font>";
}?>
<input type="text" placeholder="Enter Username" name="username" required>
<label for="psw"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="psw" required>
<label for="psw"><b>Confirm Password <?php echo $pass_warn;?></b></label>
<input type="password" placeholder="Enter Password" name="cpsw" required>
<label><b>First Name</b></label>
<input type="text" placeholder="Enter Name" name="firstname" required>

<label><b>Last Name</b></label>
<input type="text" placeholder="Enter Name" name="lastname" required>
<label><b>Sex : </b></label>
<label class="radio-inline">
      <input type="radio" name="sex" value="M" checked>Male
    </label>
    <label class="radio-inline">
      <input type="radio" name="sex" value="F">Female
      </label>
      <br>
      <br>

<label><b>Address</b></label>
<input type="text"  placeholder="Enter Address" name="adress" required>

<label><b>Phone</b></label>
<input type="text"  placeholder="Enter Phone Number" name="phone" required>

<label><b>Birth Date : </b></label>
<input type="text" id='tbDate' placeholder="Enter Birth Date" name="birthdate" required>
<br>
<br>

<label for="email"><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email" required>












<label>
<input type="checkbox"  name="remember" style="   

margin-bottom:15px" required> By creating an account you agree to our <a href="policy.html" style="color:dodgerblue">Terms & Policy</a>.
</label>



<div class="clearfix">
<a href = "index.php"><button type="button" class="cancelbtn">Cancel</button></a>
<button type="submit" class="signupbtn" name="registsubmit">Sign Up</button>
</div>
</div>
</form>

</body>
</html>
