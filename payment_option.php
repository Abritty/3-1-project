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
        <div >
                 <center><img src="images/Logo.png" alt="logo"></center>
             </div>
            <!--Search box -->
            
            
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

        
            <div class="left_right">

            
                
            <div class="left_content2">
               
  

           <h2 >Payment Options</h2>               

               <table align="left" padding="45px">
<div>
              <div class="list-group">
    <a href="#" class="list-group-item list-group-item-success" style="width:300px;"><h3><i class="fas fa-handshake"></i>Cash On Delivery</h3></a>
    <a href="#" class="list-group-item list-group-item-info" style="width:300px;"><h3><i class="fas fa-dove"></i>Via Bikash</h3></a>
    <a href="#" class="list-group-item list-group-item-warning" style="width:300px;"><h3><i class="fas fa-credit-card"></i>Credit Card</h3></a>
   
  </div>
</div>
                   </table>
                

            </div>
                
                 <div class="right_content2">
               
                <table style="border:1px solid black">
  <tr>
    <th><h4>Item no:</h4></th>
    <th><h4> <?php items();?></h4></th>
  </tr>
    <tr>
    <th><h4>Total Price:</h4></th>
    <th><h4> <?php total_price();?></h4></th>
  </tr>                

</table>

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
