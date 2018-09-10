<?php
//register.php
session_start();

include_once('db-db.php');
$conn = connect();
$postID         = $_GET['id'];
$user_name      = $_REQUEST['user_name'];
$user_id        = $_REQUEST['user_id'];
$user_img		= $_REQUEST['user_img'];
$post_title		= $_REQUEST['post_title'];
$post_field 	= $_REQUEST['post_field'];

$flag = true;
$message = '';

if(isset($_REQUEST['post'])){

      if($_FILES["post_thumb"]["user_name"] !='' ){
                $target_dir = "img/post/";
                $post_thumb = date('YmdHis_');
                $post_thumb .= basename($_FILES["post_thumb"]["user_name"]);
                $target_file = $target_dir . $post_thumb;
                $fileUp = 1;
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES["post_thumb"]["tmp_name"]);
                if($check !== false) {
                    // $message = "File is an image - " . $check["mime"] . ".<br>";
                    $fileUp = 1;
                } else {
                    $message = "File is not an image.<br>";
                    $fileUp = 0;
                }
                
                // Check if file already exists
                if (file_exists($target_file)) {
                    $message = "Sorry, file already exists.<br>";
                    $fileUp = 0;
                }
                // Check file size
                if ($_FILES["post_thumb"]["size"] > 500000000) {
                    $message = "Sorry, your file is too large.<br>";
                    $fileUp = 0;
                }
                // Allow certain file formats
                if($imageFileType != "JPG" && $imageFileType != "jpg"  && $imageFileType != "png" && $imageFileType != "PNG" && $imageFileType != "jpeg" && $imageFileType != "JPEG" && $imageFileType != "gif" ) {
                    $message = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
                    $fileUp = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($fileUp == 0) {
                    $message = "Sorry, your file was not uploaded.<br>";
                // if everything is ok, try to upload file
                } else {
                    move_uploaded_file($_FILES["post_thumb"]["tmp_name"], $target_file);
                }
                //File upload code end
                //========================================================
    }   

        if ($flag) {
            $sql = "INSERT INTO `forum` (`post_title`, `user_id`, `user_name`, `post_description`, `post_img`) VALUES ('$post_title', '$user_id', '$user_name', '$post_field', '$post_thumb')";

	        if($conn->query($sql)){
	            $message .='<p class="bg-success" style="padding: 10px;border-radius: 5px;text-align: center; margin-top: 20px;">Successfully Posted!!!</p>';

	            $_SESSION['msg'] = $message;
				header('location:forum.php');

	        }else{
	            $message .='<p class="bg-danger" style="padding: 10px;border-radius: 5px;text-align: center; margin-top: 20px;">Unsuccessful Post!!!</p>';

	            $_SESSION['msg'] = $message;
				header('location:forum.php');
	        }
          }

          
}