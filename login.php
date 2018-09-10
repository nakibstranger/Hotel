<?php 
error_reporting(0);
session_start();
$_SESSION['email'] = $_REQUEST['email'];

include_once 'header-2.php';

?>

<?php 

	function dd($row){
		echo '<pre>';
		print_r($row);
		echo '</pre>';
		exit;}
	$flag = true;
	$message = '';
if(isset($_REQUEST['login'])){
	
	if(!isset($_REQUEST['email']) || $_REQUEST['email'] == ''){
		$message .= 'Please write your email address<br>';
		$flag = false;
	}
	if(!isset($_REQUEST['pass']) || $_REQUEST['pass'] == ''){
		$message .=  'Please Insert password<br>';
		$flag = false;
	}
	
	if($flag){//After giving all input
		$email = $_REQUEST['email'];
		$password = md5($_REQUEST['pass']);
		
		$sql = "SELECT * FROM usr WHERE email='$email' AND password='$password'";
		//echo $sql;exit;
		include_once 'db-db.php';
		$conn = connect();
		
		$result = $conn->query($sql);
		if($result->num_rows > 0){
			$_SESSION['isLoggedIn'] = TRUE;
			foreach($result as $row){
				//dd($row);
				$_SESSION['user_id']    = $row['id'];
				$_SESSION['user_name']  = $row['name'];
				$_SESSION['role']   	= $row['type'];
				$_SESSION['id']			= $row['id'];
			}			
			header('location:index.php'); exit;
			
		}else{
			echo $_SESSION['msg'] = $message.'Email or Password is wrong!<br>';
			$_SESSION['isLoggedIn'] = FALSE;
			header('location:login.php'); 
		}
		
	}else{
		$_SESSION['msg'] = $message;
		$_SESSION['isLoggedIn'] = FALSE;
		header('location:login.php'); 
	}
}

?>
	<section class="section-wrapper contact-and-map">
		<div class="container">
			<div class="row">
			<div class="col-sm-3">

				</div>
				<div class="col-sm-6">
					<h2 class="section-title">
						Please insert Email & Password
					</h2>
					<p>
						<?php 
					if(isset($_SESSION['msg'])){ 
						echo $_SESSION['msg']; 
						unset($_SESSION['msg']);
					}
						?>
					</p>
					<div class="form">
					<form action="login.php" method="POST">
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" name="email" type="email" placeholder="Email address">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-email"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" type="password" name="pass" placeholder="Password">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-ios-star"></i>
							</span>
						</div>
						<button type="submit" name="login" class="btn btn-default border-radius custom-button">Confirm</button>
						
					</form>
					</div>
				</div> <!-- /.col-sm-6 -->
				<div class="col-sm-3">

				</div> <!-- /.col-sm-6 -->
			</div>
		</div>
	</section>
<?php include_once 'footer.php';?>