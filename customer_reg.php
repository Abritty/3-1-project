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
    <style>
    body {
   background-image: url(images/oback.jpg);
}
        .form{padding: 100px;} 
    </style>

</head>
<body>

 <div class="main_wrapper">
        <!--Sub Header-->
        
        
   

                <div class="form">
                <center><form method="post" action="customer_reg.php" enctype="multipart/form-data" >
                    <table  align="center" > 
                     <tr><td><h4>Create Account</h4></td></tr>
                        
                        <tr>
                            <td>Customer Name</td>
                        <td><input type="text" name="c_name" required></td>
                        </tr>
                        
                        <tr>
                            <td>E-mail ID</td>
                        <td><input type="text" name="c_email" required></td>
                        </tr>
                        
                        <tr>
                            <td>Password</td>
                        <td><input type="text" name="c_pass" required></td>
                        </tr>
                        
                        <tr>
                            <td>City</td>
                        <td>
                            <select name="c_city">
                                <option>Select a City</option>
                                <option>Dhaka</option>
                                <option>Rajshahi</option>
                                <option>Chittagong</option>
                            
                            
                            </select>
                            </td>
                        </tr>
                        
                         <tr>
                            <td>Area</td>
                        <td><input type="text" name="c_area" required></td>
                        </tr>
                        
                         <tr>
                            <td>Contact</td>
                        <td><input type="text" name="c_contact" required></td>
                        </tr>
                        
                         <tr>
                            <td>Address</td>
                        <td><input type="text" name="c_add" required></td>
                        </tr>
                        
                        <tr align="center">
                            
                        <td colspan="2"><input type="submit" name="register" value="Register"></td>
                        </tr>
                    
                    </table>
                    </form></center>
                
                </div>
     
     <?php
if(isset($_POST['register'])){
 $c_name=$_POST['c_name'];
 $c_email=$_POST['c_email'];
 $c_pass=$_POST['c_pass'];
 $c_city=$_POST['c_city'];
 $c_area=$_POST['c_area'];
 $c_contact=$_POST['c_contact'];
 $c_address=$_POST['c_add'];
 $insert_customer="insert into customers(customer_name,customer_mail,customer_pass,customer_city,customer_area,customer_contact,customer_add) values('$c_name','$c_email','$c_pass','$c_city','$c_area','$c_contact','$c_address')";
 
 $run_customer=mysqli_query($con,$insert_customer);
  echo"<script>window.open('payment_option.php','_self')</script>";
}
 ?>
 
                
   


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
