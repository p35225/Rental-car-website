<div class="main wrap">

      <h1 class="rentcar">Saki Rent Car</h1>
    <?php 
    
    
    if(isset($_SESSION["admin"]) && $_SESSION["status"]=="2"){?>
<div>    
<h3 class="custom-button">
<?php echo "Admin : ". $_SESSION["admin"];?>
</h3>
</div>

<a class="custom-button" href="deletesession.php">Logout</a>
<?php }
    else{?>

<a class="custom-button" href="register.php">Register</a>

<a class="custom-button" href="login.php">Login</a>
<?php }?>
    </div>
    <nav>
      <ul class="menu">
         <li><a href="indexstaff.php">Home </a></li>
                    <li><a href="stock.php">Stock </a></li>
                    
                    <li><a href="orderlist.php">Order list </a></li>
                    
                    <li><a href="customerinfo.php">Car using info </a></li>
                    <li><a href="carreturn.php">Car return </a></li>
                    <li><a href="insertcar.php"> Insert Car</a></li>
                    <li><a href="insertcode.php"> Insert Promotion Code</a></li>
      </ul>
      
      <div class="clear"></div>
    </nav>