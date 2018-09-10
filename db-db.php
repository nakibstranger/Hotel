<?php
// Database connection script
function connect(){
	$host = 'localhost';
	$username = 'root';
	$password = '';
	

	
		$con = new mysqli($host, $username, $password);
	
	
	return $con;
}


	
?>