
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
<div >
<header>
<?php  include('staffnav.php');?>
</header>

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


<form action="/action_page.php" style="border:1px solid #ccc">
<div class="container">
<label><b>Name</b></label>
<input type="text" placeholder="Enter Name" name="name" required>



<label><b>Email</b></label>
<input type="text" placeholder="Enter Email" name="email" required>

<label><b>Address</b></label>
<input type="text"  placeholder="Enter Address" name="adress" required>
<label><b>Phone number/b></label>
<input type="text"  placeholder="Enter Phone" name="phone" required>

<label for="psw"><b>Password</b></label>
<input type="password" placeholder="Enter Password" name="psw" required>



<label>
<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> By creating an account you agree to our <a href="policy.html" style="color:dodgerblue">Terms & Policy</a>.
</label>



<div class="clearfix">
<a href = "index.html"><button type="button" class="cancelbtn">Cancel</button></a>
<button type="submit" class="signupbtn">Sign Up</button>
</div>
</div>
</form>

</body>
</html>
