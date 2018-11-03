<?php
session_start();

session_destroy();
echo "<script>window.open('Admin_login.php?Logout=You are successfully logged out.','_self')</script>";

?>