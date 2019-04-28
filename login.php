<?php
    session_start();
   include('connect.php');
    
    
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
width: 200px;
opacity: 0.9;
}

button:hover {
opacity:1;
}



.signupbtn {
margin: 10px;
width: 200px;
    
}

.goback{ margin-left: 25px; color: #A9CCF2; }
    
    /* Add padding to container elements */
    .container {
        padding-top: 8%;
        padding-left: 25%;
        padding-right :25%;
        padding-bottom: 25%;
        
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
    <body>
    
    <form action="logincheck.php" method="POST" style="border:1px solid #ccc">
    <div class="container">
    <h1>Sign in</h1>
    
    <hr>
    
    <label for="email"><b>Username</b></label>
        <input type="text" placeholder="Your username" name="username" required>
        <br>
        
        <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>
            
            <br>
            
            <?php if(isset($_SESSION["fail"]) && $_SESSION["fail"]=="1"){?>
                <p style="color:red;">wrong password</p>
                <br>
                
            <?php }
                else if (isset($_SESSION["fail"]) && $_SESSION["fail"]=="2"){?>
                <p style="color:red;">wrong username</p>
                <br>
        
            <?php }
                else if(isset($_SESSION["fail"]) && $_SESSION["fail"]=="3"){?>
                <p style="color:red;">wrong username and password</p>
                <br>
        
            <?php } ?>
    
            <label>
            <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
            </label>
            
            <div class="clearfix">
            
            <button type="submit" class="loginbtn">Login</button>
            <a href='deletesession.php' class="goback"> Go Back</a>
            <p>Not a member yet! <a href='register.php' style="red">register</a> </p>
            </div>
            </div>
            </form>
            
            </body>
            </html>

