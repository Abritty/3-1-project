<?php

#session_start();
@session_start();
include("includes/db.php");
//include("functions/functions.php");


?>

<style>

.form {
  position: relative;
  z-index: 1;
  background: palegreen;
  max-width: 500px;
  margin: 0 auto 100px;
  padding: 45px;
  text-align: center;
  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
}
    
    .form input {
  font-family: "Roboto", sans-serif;
  outline: 0;
  background: #f2f2f2;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 14px;
}
.form button {
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}
.form button:hover,.form button:active,.form button:focus {
  background: #43A047;
}
.form .message {
  margin: 15px 0 0;
  color: #b3b3b3;
  font-size: 12px;
}
.form .message a {
  color: #4CAF50;
  text-decoration: none;
}
.form .register-form {
  display: none;
}
.container {
  position: relative;
  z-index: 1;
  max-width: 300px;
  margin: 0 auto;
}
.container:before, .container:after {
  content: "";
  display: block;
  clear: both;
}
.container .info {
  margin: 50px auto;
  text-align: center;
}
.container .info h1 {
  margin: 0 0 15px;
  padding: 0;
  font-size: 36px;
  font-weight: 300;
  color: #1a1a1a;
}
.container .info span {
  color: #4d4d4d;
  font-size: 12px;
}
.container .info span a {
  color: #000000;
  text-decoration: none;
}
.container .info span .fa {
  color: #EF3B3A;
}
body {
  background: #76b852; /* fallback for old browsers */
  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
  background: -moz-linear-gradient(right, #76b852, #8DC26F);
  background: -o-linear-gradient(right, #76b852, #8DC26F);
  background: linear-gradient(to left, #76b852, #8DC26F);
  font-family: "Roboto", sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;      
}


</style>



<div class="form">



<form action="checkout.php" method="post" align="center">


 
    <label for="c_mail"><b>Usermail</b></label>
    <input type="text" placeholder="Enter Your E-mail" name="c_mail" required><br>

    <label for="c_pass"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="c_pass" required><br>
        
    <input type="submit" name="c_login" value="Login"/>

 

</form>
    
   <a href="customer_reg.php"><button type="button" class="dropdown-item bg-danger"><i class="fas fa-sign-in-alt"></i>&nbsp;New?Register</button></a>


 
</div>
    


<?php
if(isset($_POST['c_login'])){
	
	$customer_email=$_POST['c_mail'];
	$customer_pass=$_POST['c_pass'];
	$sel_customer="select * from customers where customer_mail='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer=mysqli_query($con,$sel_customer);
    $check_customer=mysqli_num_rows($run_customer);
	$get_ip=getRealIpAddr();
	$sel_cart="select * from cart where ip_add='$get_ip'";
	$run_cart=mysqli_query($con,$sel_cart);
	$check_cart=mysqli_num_rows($run_cart);
	
	if(mysqli_num_rows($run_customer)>0){
        $_SESSION['customer_mail']=$customer_email;
        echo"<script>window.open('payment_option.php','_self')</script>";
        
    }
    else{
        echo"<script>alert('Email or Password is wrong!,Try again')</script>";
    }
		
}



?>