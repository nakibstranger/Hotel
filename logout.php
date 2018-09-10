<?php 
//Logout Script
session_start();
unset($_SESSION['isLoggedIn']);
unset($_SESSION['role']);
unset($_SESSION['user_name']);
header('location:login.php'); 