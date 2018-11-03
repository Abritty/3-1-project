<?php
session_start();
include("admin/includes/db.php");
include("functions/function.php");

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable:no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>::Bazar-Sodai</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link href="/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
  <link href="fa/svg-with-js/css/fa-svg-with-js.css">
  <link href="css/style.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
    <link rel="stylesheet" href="css/w3.css"> 
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <style>
    .login-page {
  width: 360px;
  padding: 8% 0 0;
  margin: auto;
        }

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
   

</head>
<body>


    <div class="main_wrapper">
        <!--Sub Header-->
     <!--<div class="subheader">
            <div class="container" ><p>Fastest Online grocery store.</p>
   <div class="dropdown_subheader" style="float:right";>
       <button class="dropbtn">Call Now</button>
  <div class="dropdown-content_subheader">
      <a href="#">Dial :*888#</a>
       <a href="#">Dial :*886#</a>
      <a href="#">Dial :*887#</a>
  </div>
  </div></div></div> -->

    <!--Header Starts
        <div class="header_wrapper">
        <div class="logo">
                 <img src="images/Logo.PNG" alt="logo">
             </div>
            <!--Search box -->
           <!--  <div class="search_area">
             <form action="result.php" method="get" enctype="multipart/form-data">
             <input type="text" name="user_query" class="search_box" placeholder="Search products...">
                <button class="search_btn btn btn-warning" name="search">Search</button>
             </form>
             </div>-->
            
            
          <!--  <div class="topnav">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-hoshpopup="true" aria-expaded="false"><i class="fas fa-user-alt"></i>Account<span class="caret"></span></a>
                 <!--dropdown-box-->
              <!--  <div class="dropdown-menu dropdown-menu-right bg-light" style="width:100px;" >
                    <a href="#"><button type="button" class="dropdown-item bg-light"><i class="fas fa-user-circle"></i>&nbsp;Login</button></a>
                    <a href="#"><button type="button" class="dropdown-item bg-danger"><i class="fas fa-sign-in-alt"></i>&nbsp;Register</button></a>
               </div>
            </div>
         <div class="topnav">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-hoshpopup="true" aria-expaded="false"><i class="fas fa-shipping-fast"></i>Cart<span class="caret"></span></a>>-->
              <?php
             
               $ip=getRealIpAddr();
             //creating cart
global $con; 
    if(isset($_GET['add_cart'])){
        
         
        
        $p_id=$_GET['add_cart'];
        
        $check_pro="select * from cart where ip_add='$ip' AND p_id='$p_id' ";
        $run_check=mysqli_query($con,$check_pro);
        
        if(mysqli_num_rows($run_check)>0){
            echo"";
        }
        else{
            $q="insert into cart (p_id,ip_add) values('$p_id','$ip')";
            $run_q=mysqli_query($con,$q);
            
            echo"<script>window.open('index.php','_self')</script>";
        }
    }
       ?>
              <div class="dropdown-menu dropdown-menu-right bg-light" style="width:100px;" >
                    <a href="cart.php"><button type="button" class="dropdown-item bg-light"><i class="fas fa-shopping-basket"></i>&nbsp;Items:<?php items();?></button></a>
                    <a href="cart.php"><button type="button" class="dropdown-item bg-light"><i class="fas fa-money-bill-alt"></i>&nbsp;Total:<?php  total_price();?></button></a>
                   <a href="cart.php"><button type="button" class="dropdown-item bg-light"><i class="fas fa-eye"></i>&nbsp;Investigate</button></a>
               </div>
             
            
             </div>
        </div>
            <!--Header ends!-->


<!--<div id="navbar">
  <a  href="index.php"> বাজার-সদাই </a>
   <a href="all_products.php">All Products</a>
  <a href="javascript:void(0)">Offers</a>
  <a href="javascript:void(0)">Review</a>
<a href="javascript:void(0)">About US</a>
</div>
  <!--Slider-->

        <div class="content">
       <!--    <div class="container_slider">
      <div class="slider-outer">
        <img src="images/arrow-left.png" class="prev" alt="Prev">
        <div class="slider-inner">
          <img src="images/Banner1.png" class="active">
          <img src="images/banner2.png">
          <img src="images/banner3.png">
        </div>
        <img src="images/arrow-right.png" class="next" alt="Next">
      </div>
    </div> -->
            <div class="left_right">

            
                
                
            <div class="login-page">
                
                <h3 align="center">Login Please</h3>
                <?php
                
               if(!isset($_SESSION['cutomer_mail'])) {
                   
                   
                   include("customer/customer_login.php");
                   
               }
                else{
                    
                    include("payment_option.php");
                }
                
                
                
                
                ?>
      

            </div>
            </div>
          




<!--Sticky navbar script-->
<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>

<script src="js/jquery.bxslider.min.js"></script>
<script src="js/slider.js"></script>
<script src="js/fixed_nav.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <script src="fa/svg-with-js/js/fontawesome-all.js"></script>


</body>
</html>
