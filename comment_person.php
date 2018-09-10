<?php
//register.php
session_start();

include_once('db-db.php');
$conn = connect();

$post_id		= $_REQUEST['post_id'];
$user_id		= $_REQUEST['user_id'];
$user_name 	    = $_REQUEST['user_name'];
$comments    	= $_REQUEST['comments'];

$flag = true;
$message = '';

if(isset($_REQUEST['cmnt'])){ 

        if ($flag) {
            $sql = "INSERT INTO `post_comment` (`postID`, `userID`,`user_name`, `cmnt`) VALUES ('$post_id','$user_id','$user_name', '$comments')";

	        if($conn->query($sql)){
	            $message .='<p class="bg-success" style="padding: 10px;border-radius: 5px;text-align: center; margin-top: 20px;">Comment Posted!!!</p>';

	            $_SESSION['msg'] = $message;
				header('location:single-post.php?id='.$post_id);

	        }else{
	            $message .='<p class="bg-danger" style="padding: 10px;border-radius: 5px;text-align: center; margin-top: 20px;">Comment not Posted!!!</p>';

	            $_SESSION['msg'] = $message;
				header('location:single-post.php?id='.$post_id);
	        }
          }

          
}