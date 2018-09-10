<?php
define('BASE_URL','http://localhost/dw_00162357/');
session_start();
?>

<!DOCTYPE html>
<html class="noIE" lang="en-US">
<!--<![endif]-->
	<head>
		<!-- meta -->
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
			<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no"/>
	<title>Logged in to Woodland Away</title>

	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/ionicons.min.css">
	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/owl.theme.css">
	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/flexslider.css" type="text/css">
    <link rel="stylesheet" href="<?=BASE_URL;?>assets/css/main.css">
	
</head>
<body>


<!-- Home -->
		<div id="header">
		<nav class="navbar navbar-default">
			<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.php" title="HOME"><i class="ion-paper-airplane"></i> Woodland <span>Away</span></a>
				</div> <!-- /.navbar-header -->

		    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?=BASE_URL;?>index.php">Home</a></li>
						<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
							<li><a href="<?=BASE_URL;?>myBook.php">My Booking</a></li>
						<?php } ?>
						<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 0) { ?>
							<li><a href="<?=BASE_URL;?>packages.php">Add/Edit:Packages</a></li>
							<li><a href="<?=BASE_URL;?>e_book.php">Edit Bookings</a></li>
						<?php } ?>
						<li><a href="<?=BASE_URL;?>forum.php">Community-Forum</a></li>
						
						<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){ ?>
							<li><a href="<?=BASE_URL;?>logout.php">Log-out</a></li>
						<?php }else{ ?>
							<li><a href="<?=BASE_URL;?>login.php">Login</a></li>
							<li class="active"><a href="<?=BASE_URL;?>reg.php">Sign up</a></li>
						<?php } ?>
					</ul> <!-- /.nav -->
			    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container -->
		</nav>
		    <div class="flexslider">
			
		        <ul class="slides">
		            <li class="slider-item" style="background-image: url('<?=BASE_URL;?>assets/images/item-1.png')">
		                <div class="intro container">
		                    <div class="inner-intro">
		                        <h1 class="header-title">
		                            <span>traveling</span> always "good idea"
		                        </h1>
		                        <p class="header-sub-title">
		                         Welcome to Woodland Away. 
		                        </p>
		                        <!--  <button class="btn custom-btn">
		                            book now
		                        </button> -->
		                    </div>
		                </div>
		            </li> <!-- /.slider-item -->
		            <li class="slider-item" style="background-image: url('assets/images/item2.png')">
		                <div class="intro">
		                    <div class="inner-intro">
		                        <h1 class="header-title">
		                            to <span>travel</span> is to <span>live</span>
		                        </h1>
		                        <p class="header-sub-title">
		                           Sign up Now. If you are registered user then login for further activity.
		                        </p>
		                       <!--  <button class="btn custom-btn">
		                            book now
		                        </button> -->
		                    </div>
		                </div>
		            </li> <!-- /.slider-item -->
		        </ul> <!-- /.slides -->
		    </div> <!-- /.flexslider -->
		</div> <!-- /#header -->