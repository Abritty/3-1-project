<?php

$con=mysqli_connect("localhost","root","","ecommerce");

//for ip address
function getRealIpAddr()

  {
    if ( !empty( $_SERVER['HTTP_CLIENT_IP'] ) )
//check ip share internet
    {
      $ip = $_SERVER['HTTP_CLIENT_IP'];

    }
elseif( !empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) )

    //to check ip passed from proxy

    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }

    else

    {
      $ip = $_SERVER['REMOTE_ADDR'];
    }

    return $ip;
}

//number of items in cart
function items()
    
{
     $ip=getRealIpAddr();
    global $con;
    
     if(isset($_GET['add_cart'])){
         
         $get_items="select * from cart where ip_add='$ip'";
         $run_items=mysqli_query($con,$get_items);
         $count_items=mysqli_num_rows($run_items);
         
     }
    else{
         $get_items="select * from cart where ip_add='$ip'";
         $run_items=mysqli_query($con,$get_items);
         $count_items=mysqli_num_rows($run_items);  
    }
    
    echo $count_items;

}

//getting the total price from the cart
function total_price(){
    $ip=getRealIpAddr();
    global $con;
    $total=0;
    
    $sel_price ="select * from cart where ip_add='$ip'";
    $run_price=mysqli_query($con,$sel_price);
    
    while($record=mysqli_fetch_array($run_price))
    {
       $pro_id=$record['p_id'];
        $pro_qty=$record['qty'];
       $pro_price="select * from product where id='$pro_id' ";
        $run_pro_price=mysqli_query($con,$pro_price);
        while($p_price=mysqli_fetch_array($run_pro_price)){
            
            $product_price=array($p_price['price']*$pro_qty);
            $values= array_sum($product_price);
            $total +=$values;
            
        }
        
    }
    
    echo $total."tk";
    
    
}



//displaying product
function getPro(){
    global $con; 
    if(!isset($_GET['cat'])) {
         if(!isset($_GET['br'])) {
    
                    $get_pro = "select * from product order by rand() LIMIT 0,8";
                    $run_pro=mysqli_query($con,$get_pro);
                    while ($row_pro=mysqli_fetch_array($run_pro)){

                        $pro_id= $row_pro["id"];
                        $pro_title=$row_pro["name"];
                        $pro_image=$row_pro["image"];
                        $pro_price=$row_pro["price"];
                        $pro_unit=$row_pro["unit"];

                        echo "
                        <div id='single_product'>
                                <h4>$pro_title</h4>
                                <h6> Price:$pro_price tk/$pro_unit</h6>
                        <img src='admin/product_image/V$pro_image' alt='$pro_image' width='200' height='200'><br>
                        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button style='float:right;background-color:lightgoldenrodyellow;'>Add to cart</button></a>

</div>
                        ";

                    }
                   
}
}
}

function getAllproduct()
{global $con; 
    if(!isset($_GET['cat'])) {
         if(!isset($_GET['br'])) {
    
                    $get_pro = "select * from product order by price ASC, name DESC";
                    $run_pro=mysqli_query($con,$get_pro);
                    while ($row_pro=mysqli_fetch_array($run_pro)){

                        $pro_id= $row_pro["id"];
                        $pro_title=$row_pro["name"];
                        $pro_image=$row_pro["image"];
                        $pro_price=$row_pro["price"];
                        $pro_unit=$row_pro["unit"];

                        echo "
                        <div id='single_product'>
                                <h4>$pro_title</h4>
                                <h6> Price:$pro_price tk/$pro_unit tk</h6>
                        <img src='admin/product_image/V$pro_image' alt='$pro_image' width='200' height='200'><br>
                        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button style='float:right;background-color:lightgoldenrodyellow;'>Add to cart</button></a>

</div>
                        ";

                    }
                   
}
}
    
    
    
}

//getting product by catagory name
function getCatPro()
{
   global $con; 
    if(isset($_GET['cat'])) {
       
        $cat_id=$_GET['cat'];
         echo"<h4>catagory id=$cat_id</h4>";
        $get_cat_pro ="select * from product where catagory='$cat_id' " ;
        $run_cat_pro=mysqli_query($con,$get_cat_pro);
        
                     $count = mysqli_num_rows($run_cat_pro);
        echo "<h3>Number of Products=$count</h3>";
        if($count==0){
            echo "<h2>No Product available for this catagory</h2>";
        }
                    while ($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

                        $pro_id= $row_cat_pro["id"];
                        $pro_title=$row_cat_pro["name"];
                        $pro_image=$row_cat_pro["image"];
                        $pro_price=$row_cat_pro["price"];
                         $pro_unit=$row_cat_pro["unit"];

                        echo "
                        <div id='single_product'>
                                <h4>$pro_title</h4>
                                <h6> Price:$pro_price tk/$pro_unit</h6>
                        <img src='admin/product_image/V$pro_image' alt='$pro_image' width='200' height='200'><br>
                        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button style='float:right;background-color:lightgoldenrodyellow;'>Add to cart</button></a>

</div>
                        ";

                    }
                   

} 
}

//getting product by Brand name
function getBrandPro()
{
   global $con; 
    if(isset($_GET['br'])) {
       
        $br_id=$_GET['br'];
        
        $get_br_pro ="select * from product where brand='$br_id' " ;
        $run_br_pro=mysqli_query($con,$get_br_pro);
        
                     $count2 = mysqli_num_rows($run_br_pro);
          echo "<h3>Number of Products=$count2</h3>";
        
        if($count2==0){
            echo "<h2>No Product available for this Brand</h2>";
        }
                    while ($row_br_pro=mysqli_fetch_array($run_br_pro)){

                        $pro_id= $row_br_pro["id"];
                        $pro_title=$row_br_pro["name"];
                        $pro_image=$row_br_pro["image"];
                        $pro_price=$row_br_pro["price"];
                         $pro_unit=$row_br_pro["unit"];

                        echo "
                        <div id='single_product'>
                                <h4>$pro_title</h4>
                                <h6> Price:$pro_price tk/$pro_unit</h6>
                        <img src='admin/product_image/V$pro_image' alt='$pro_image' width='200' height='200'><br>
                        <a href='details.php?pro_id=$pro_id' style='float:left;'>Details</a>
                        <a href='index.php?add_cart=$pro_id'><button style='float:right;background-color:lightgoldenrodyellow;'>Add to cart</button></a>

</div>
                        ";

                    }
                   

} 
}
 
//showing catagory name
function getCats(){
     global $con; 
    
     $get_cats = "select * from categories";
                    $run_cats=mysqli_query($con,$get_cats);
                    while ($row_cats=mysqli_fetch_array($run_cats)){

                        $cat_id= $row_cats['Cat_id'];
                        $cat_title=$row_cats['Cat_title'];
                       echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>" ;
                    }
    
}
//showing brand name
function getbrands(){
     global $con; 
    $get_brands = "select * from brands";
                    $run_brands=mysqli_query($con,$get_brands);
                    while ($row_brands=mysqli_fetch_array($run_brands)){

                        $brand_id= $row_brands['Br_id'];
                        $brand_title=$row_brands['Br_title'];
                       echo "<li><a href='index.php?br=$brand_id'>$brand_title</a></li>" ;
                    }
    
}


?>