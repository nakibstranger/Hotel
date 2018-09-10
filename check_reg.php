<?php
//register.php
session_start();

$flag = true;
$message = '';

if(!isset($_REQUEST['name']) || $_REQUEST['name'] == ''){
	$message .= 'Please write your name<br>';
	$flag = false;
}
if(!isset($_REQUEST['email']) || $_REQUEST['email'] == ''){
	$message .= 'Please write your email<br>';
	$flag = false;
}
if(!isset($_REQUEST['pass']) || $_REQUEST['pass'] == ''){
	$message .=  'Please write your password<br>';
	$flag = false;
}

if($flag){
	
	$name 			= $_REQUEST['name'];
	$email 			= $_REQUEST['email'];
	$password 		= md5($_REQUEST['pass']);
	$gender 		= $_REQUEST['gender'];
	$postal 		= $_REQUEST['postal'];
	
	include_once('db-db.php');
	$conn = connect();
	
	$sql = "SELECT * FROM usr WHERE email='$email'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0){
		$message .= "email already exist";
	}else{
		if(isset($_SESSION['role']) && $_SESSION['role'] == 0){
			$sql = "INSERT INTO usr (name,email,password,gender,postal,type) VALUES ('$name','$email','$password','$gender','$postal',0)";
		}else{
			$sql = "INSERT INTO usr (name,email,password,gender,postal) VALUES ('$name','$email','$password','$gender','$postal')";
		}
		
		if($conn->query($sql)){
			header('location:login.php');
			
			$message .='Successful';
		}else{
			$message .='Unsuccessful';
		}
	}
	//header('location:signup.php?msg='.$message); //sending message through get method
	$_SESSION['msg'] = $message;
	//header('location:reg.php'); 
}else{
	//header('location:signup.php?msg='.$message);
	$_SESSION['msg'] = $message;
	header('location:reg.php'); 
}