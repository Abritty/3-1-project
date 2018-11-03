<?php
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

</head>
<body>


    <div class="main_wrapper">
        <!--Sub Header-->
        <div class="subheader">
            <div class="container" ><p>Fastest Online grocery store.</p>
   <div class="dropdown_subheader" style="float:right";>
       <button class="dropbtn">Call Now</button>
  <div class="dropdown-content_subheader">
      <a href="#">Dial :*888#</a>
       <a href="#">Dial :*886#</a>
      <a href="#">Dial :*887#</a>
  </div>
  </div></div></div>

    <!--Header Starts-->
        <div class="header_wrapper">
        <div class="logo">
                 <img src="images/Logo.PNG" alt="logo">
             </div>
            <!--Search box -->
             <div class="search_area">
             <form action="result.php" method="get" enctype="multipart/form-data">
             <input type="text" name="user_query" class="search_box" placeholder="Search products...">
                <button class="search_btn btn btn-warning" name="search">Search</button>
             </form>
             </div>
            
            
           <div class="topnav">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-hoshpopup="true" aria-expaded="false"><i class="fas fa-user-alt"></i>Account<span class="caret"></span></a>
                 <!--dropdown-box-->
                <div class="dropdown-menu dropdown-menu-right bg-light" style="width:100px;" >
                    <a href="#"><button type="button" class="dropdown-item bg-light"><i class="fas fa-user-circle"></i>&nbsp;Login</button></a>
                    <a href="#"><button type="button" class="dropdown-item bg-danger"><i class="fas fa-sign-in-alt"></i>&nbsp;Register</button></a>
               </div>
            </div>
         <div class="topnav">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-hoshpopup="true" aria-expaded="false"><i class="fas fa-shipping-fast"></i>Cart<span class="caret"></span></a>
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
            $q="insert into cart (p_id,ip_add,qty) values('$p_id','$ip','1')";
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


<div id="navbar">
  <a  class="active" href="javascript:void(0) index.php"> বাজার-সদাই </a>
   <a href="all_products.php">All Products</a>
  <a href="javascript:void(0)">Offers</a>
  <a href="javascript:void(0)">Review</a>
<a href="javascript:void(0)">About US</a>
</div>
  <!--Slider-->

        <div class="content">
           <div class="container_slider">
      <div class="slider-outer">
        <img src="images/arrow-left.png" class="prev" alt="Prev">
        <div class="slider-inner">
          <img src="images/Banner1.png" class="active">
          <img src="images/banner2.png">
          <img src="images/banner3.png">
        </div>
        <img src="images/arrow-right.png" class="next" alt="Next">
      </div>
    </div>
            <div class="left_right">

            <div class="left_content">

                <ul>
                    <li>Catagories</li>
                    <?php
                   getCats();
                    ?>

                    </ul>

                 <ul> <li>Brands</li>
                     <?php
                    getbrands();
                    ?>
                </ul>
                </div>
                
                
            <div class="right_content">
               
                <table style="border:1px solid black">
  <tr>
    <th>Item no:</th>
    <th> <?php items();?></th>
  </tr>
    <tr>
    <th>Total Price:</th>
    <th> <?php total_price();?></th>
  </tr>                

</table>

                 <?php 
                    
                        getPro();
                        getCatPro();
                        getBrandPro();
                ?>



            </div>
            </div>
            </div>

        <!--footer Area-->
            <div class="footer">
                <pre>
Buy Best oranges in your town
Call:*877#</pre>
                <img class="Gif" src="images/giphy.gif" alt="ads">
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
