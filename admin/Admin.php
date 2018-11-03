    <?php 
 session_start();
if(!isset($_SESSION['admin_mail'])){
    
    echo "<script>window.open('Admin_login.php?','_self')</script>";
}
    else{
    
   
    ?>
    <?php
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable:no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>::Adminstration</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <link href="/css/jquery.bxslider.css" rel="stylesheet" type="text/css">
  <link href="fa/svg-with-js/css/fa-svg-with-js.css">
  <link href="css/style.css" rel="stylesheet">
<link href="css/layout.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
  <style>

form {border:none;
    width:50%;
    align-content: center;
      }
      
      table { 
    border-collapse: separate;
    border-spacing: 5px;
    border-color: blue;
}
    
    </style>
</head>
<body>
    

   
    <div class="main_wrapper">
        <!--Sub Header-->
        <div class="subheader">
            <div class="container" ><p>Fastest Online grocery store.</p>
   <div class="dropdown_subheader" style="float:right";>                    
       <button class="dropbtn">Call Now</button>
  <div class="dropdown-content_subheader">
      <a href="#">Rajshahi manager :*121*1</a>
       <a href="#">Dhaka manager :*121*2</a>
      <a href="#">Khulna manager :*121*3</a>
  </div>
  </div></div></div>
        
    <!--Header Starts-->
        <div class="header_wrapper">
        <div class="logo">
                 <img src="images/Logo.PNG" alt="logo">
             </div>
            
          <div><h2>Admin Panel</h2></div>
       
        </div>
            <!--Header ends!-->


  
        <div class="content">
          
            <div class="left_right">
            <div>
                <div class="left_content"> 
                <ul>     
                    <li><a href="../index.php">Home</a></li> 
                    <li><a href="#">Delete Products</a></li> 
                    <li><a href="Admin_logout.php">Log Out</a></li> 
                    </ul>
                
                </div>
                 
            
            </div>
            <div class="right_content">
                <div> <h6 style="color:red; text-align:center ; padding:20px;"><?php echo @$_GET['logged_in'];?> </h6></div>
                <div>
                <center><form method="post" action="Admin.php" enctype="multipart/form-data" >
                    <table  align="center" > 
                     <tr><td><h4>Insert New Product</h4></td></tr>
                        
                        <tr>
                            <td>Product Name</td>
                        <td><input type="text" name="pr_title"></td>
                        </tr>
                        
                        <tr>
                            <td>Price</td>
                        <td><input type="text" name="pr_price"></td>
                        </tr>
                        
                        
                        
                    
                        <tr>
                            <td>Category</td>
                        <td><select name="pr_cat">
                            <option>Select Catagory</option>
                            <?php
                    $get_cats = "select * from categories";
                    $run_cats=mysqli_query($con,$get_cats);
                    while ($row_cats=mysqli_fetch_array($run_cats)){
                        
                        $cat_id= $row_cats['Cat_id'];
                        $cat_title=$row_cats['Cat_title'];
                       echo "<option value='$cat_id'>$cat_title</option>" ;
                    }
                    ?>
                    
                            </select></td>
                        </tr>
                        
                        
                    
                        <tr>
                            <td>Brand</td>
                        <td><select name="pr_brand">
                            <option>Select Brand</option>
                            
                          <?php
                    $get_brands = "select * from brands";
                    $run_brands=mysqli_query($con,$get_brands);
                    while ($row_brands=mysqli_fetch_array($run_brands)){
                        
                        $brand_id= $row_brands['Br_id'];
                        $brand_title=$row_brands['Br_title'];
                       echo "<option value='$brand_id'>$brand_title</option>" ;
                    }
                    ?>
                    
                            </select></td>
                        </tr>
                    
                    
                        <tr>
                            <td>Quantity</td>
                        <td><input type="text" name="pr_quan"></td>
                        </tr>
                    
                        <tr>
                            <td>Image</td>
                        <td><input type="file" name="pr_img"></td>
                        </tr>
                        
                        <tr>
                            <td>Keywords</td>
                        <td><input type="text" name="pr_key"></td>
                        </tr>
                        
                        
                    <tr align="center">
                            
                        <td colspan="2"><input type="submit" name="submit" value="Insert"></td>
                        </tr>
                    
                    </table>
                    </form></center>
                
                </div>
                
            </div>
            </div>
            </div>
    
        <!--footer Area-->
            <div class="footer">
                <pre>
Admin Panel
</pre>
         </div>
             

    </div>
            



<script src="js/jquery.bxslider.min.js"></script> 
<script src="js/slider.js"></script>
<script src="js/fixed_nav.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
 <script src="fa/svg-with-js/js/fontawesome-all.js"></script>
            


</body>
</html>

<?php
        
   if(isset($_POST['submit'])){
   
        $product_title= $_POST['pr_title'];
        $product_price= $_POST['pr_price'];
        $product_catagory= $_POST['pr_cat'];
        $product_brand= $_POST['pr_brand'];
        $product_quan= $_POST['pr_quan'];
        $product_key= $_POST['pr_key'];
       $status='on';
       //img type
       
       $product_img= $_FILES['pr_img']['name'];
       
       //temp names
       $temp_img= $_FILES['pr_img']['tmp_name'];
       
       if($product_title=='' OR $product_price=='' OR $product_catagory=='' OR $product_brand=='' OR $product_quan=='' OR $product_key=='' OR $product_img=='' ){
           
           echo "<script>alert('Please fill all the fields')</script>";
           exit();
       }
       else {
           //uploading images
           
           move_uploaded_file($temp_img,"product_image/$product_img");
       $insert_product = "insert into product (name,price,quatity,image,catagory,brand,keywords,status) values (' $product_title',' $product_price','$product_quan',' $product_img','$product_catagory',' $product_brand',' $product_key',' $status') ";
           
           $run_product= mysqli_query($con, $insert_product);
           
           if($run_product){
           
           echo "<script>alert('Product inserted successfully')</script>";
           exit();
       }
       
       }
       
   }    

?>





<?php }?>