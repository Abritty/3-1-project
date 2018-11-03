<?php
session_start();
include("includes/db.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}
form {border: 1px solid chartreuse ;}
    
    body{
        background-color: chartreuse;
    }

input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color:green;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}



.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Admin Login Form</h2>

<form action="Admin_login.php" class="login-container" name="form1" method="post">
 
  
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Enter Your mail id" required="required" name="uname" size="50">
    <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" required="required" name="psw" size="50">
      <button type="submit" name="submit1">LOG IN</button>
  
</form>
     <h3 style="color:red; text-align:center ; padding:20px;"><?php echo @$_GET['Logout'];?> </h3>
    
    <?php
    if(isset($_POST['submit1']))
    {   
        $user_mail = $_POST['uname'];
        $user_pass = $_POST['psw'];
        
        $sel_admin="select * from admins where admin_mail='$user_mail' AND password='$user_pass'";
        $run_admin=mysqli_query($con,$sel_admin);
       $check_admin=mysqli_num_rows($run_admin);
        if($check_admin==1){
            $_SESSION['admin_mail']=$user_mail;
            echo "<script>window.open('Admin.php?logged_in=You have succeefully Logged In','_self')</script>";
        }else
        {
            echo "<script>alert('Email or password incorrect')</script>";
            
        }
        
    }
    ?>
   
    
    

</body>
</html>
