<?php include_once 'header-2.php';?>

	<section class="section-wrapper contact-and-map">
		<div class="container">
			<div class="row">
			<div class="col-sm-3">

				</div>
				<div class="col-sm-6">
					<h2 class="section-title">
						Sign Up
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
					<form action="check_reg.php" methode="POST" enctype="multipart/form-data">
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" type="text" placeholder="Name" name="name">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-person"></i>
							</span>
						</div>
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
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" type="text" name="postal" placeholder="Postal">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-ios-star"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<input type="radio" name="gender" value="male"><span style="color:#000;"> Male</span><br>
							<input type="radio" name="gender" value="female"><span style="color:#000;"> Female</span><br>
							</span>
						</div>
						<button type="submit" name="reg" class="btn btn-default border-radius custom-button">Confirm </button>
						</form>
					</div>
				</div> <!-- /.col-sm-6 -->
				<div class="col-sm-3">

				</div> <!-- /.col-sm-6 -->
			</div>
		</div>
	</section>
<?php include_once 'footer.php';?>