<?php 
	
				session_start();

				include_once('db-db.php');
				$conn = connect();
				
				$user_name      = $_SESSION['user_name'];
				$user_id        = $_SESSION['id']; 
				$post_id 		= $_POST['postID'];
				$post_comment 	= $_REQUEST['comment'];

				$flag = true;
				$message = '';

				if(isset($_REQUEST['add'])){ 
					if ($flag){
						$sql="INSERT INTO `post_comment`(`postID`, `userID`, `user_name`, `cmnt`) VALUES ('$post_id','$user_id','$user_name','$post_comment')";

						if($conn->query($sql)){
							$message .='<p class="bg-success" style="padding: 10px;border-radius: 5px;text-align: center; margin-top: 20px;">Successfully Posted!!!</p>';

							$_SESSION['msg'] = $message;
							header('location:single-post.php');

						}else{
							$message .='<p class="bg-danger" style="padding: 10px;border-radius: 5px;text-align: center; margin-top: 20px;">Unsuccessful Post!!!</p>';

							$_SESSION['msg'] = $message;
							header('location:forum.php');
						}
					  }
					}
						
										
				
				?>
					