<?php
session_start();
error_reporting(0);
include_once 'db-db.php';
$conn = connect();
$flag = TRUE;
	$usr 		= $_POST['usr'];
	$p_name 	= $_POST['p_name'];
	$p_price 	= $_POST['p_price'];
	$p_location = $_POST['p_location'];
	$p_id 		= $_POST['p_id'];
	$str_dt		 = $_POST['str-dt'];
	$end_dt 	= $_POST['end-dt'];
	$child 		= $_POST['child'];
	$adult		 = $_POST['adult'];
if(isset($_POST['book'])){
	
	
	
	if ($flag) {
        $sql = "INSERT INTO `bookings` (`usr`, `p_name`, `p_price`, `p_location`, `p_id`, `str-dt`, `end-dt`, `child`, `adult`) VALUES ('$usr', '$p_name', '$p_price', '$p_location', '$p_id', '$str_dt', '$end_dt', '$child', '$adult')";
		$result = $conn->query($sql);
		require_once 'EmailSend.php';
			 $to = $_SESSION['email'];
			 $name = $_SESSION['user_name'];
			 $subject = "Your Booking confirmed";
			 $content = '<html><body>
						Dear '.$name.',<br/>
						Your booking of '.$p_name.'
						is successflly done.<br/>
						
						</body></html>';
			 sendMail($to,$name,$subject,$content);
		
		$msg = "Successfully Booked";
		$_SESSION['msg'] = $msg;
		//header("Location:index.php");
      }
	  
}
