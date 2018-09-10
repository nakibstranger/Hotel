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
	<title>Woodland Away</title>

	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/ionicons.min.css">
	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/owl.carousel.css">
	<link rel="stylesheet" href="<?=BASE_URL;?>assets/css/owl.theme.css">
    <link rel="stylesheet" href="<?=BASE_URL;?>assets/css/main.css">
    <link rel="stylesheet" href="<?=BASE_URL;?>assets/css/section.css">
    <link rel="stylesheet" href="<?=BASE_URL;?>assets/css/contact.css">
	<link href='fullcalendar/fullcalendar.min.css' rel='stylesheet' />
	<link href='fullcalendar/fullcalendar.print.min.css' rel='stylesheet' media='print' />
	<script src='fullcalendar/lib/moment.min.js'></script>
	<script src='fullcalendar/lib/jquery.min.js'></script>
	<script src='fullcalendar/fullcalendar.min.js'></script>
	
			<?php 
	$packageName = 'Luxary Cabin';
	$packageName1 = 'Original Cabin';
	$startDate1 = '2017-10-07';
	$startDate = '2017-10-05';
	$endDate1 = '2017-10-20';
	$endDate = '2017-10-16';
?>

<script>


	$(document).ready(function() {

		$('#calendar').fullCalendar({
			defaultDate: '2017-09-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2017-09-01'
				},
				{
					title: '<?=$packageName1?>',
					start: '<?=$startDate1?>',
					end: '<?=$endDate1?>'
				},
				{
					title: '<?=$packageName?>',
					start: '<?=$startDate?>',
					end: '<?=$endDate?>'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-09-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2017-09-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2017-09-11',
					end: '2017-09-13'
				},
				{
					title: 'Meeting',
					start: '2017-09-12T10:30:00',
					end: '2017-09-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2017-09-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2017-09-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2017-09-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2017-09-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2017-09-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2017-09-28'
				}
			]
		});
		
	});

</script>
<style>

	body {
		
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
	
	
</head>
<body>

<!-- Home -->
	<section class="header">
		
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
					<a class="navbar-brand" href="index.html" title="HOME"><i class="ion-paper-airplane"></i> Woodland <span>Away</span></a>
				</div> <!-- /.navbar-header -->

		    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="<?=BASE_URL;?>index.php">Home</a></li>
						<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 1) { ?>
							<li><a href="<?=BASE_URL;?>myBook.php">My Booking</a></li>
						<?php } ?>
						<?php if(isset($_SESSION['role']) && $_SESSION['role'] == 0) { ?>
							<li><a href="<?=BASE_URL;?>packages.php">Add/Edit-Packages</a></li>
							<li><a href="<?=BASE_URL;?>e_book.php">Edit Bookings</a></li>
						<?php } ?>
						<li><a href="<?=BASE_URL;?>#o">Contact us</a></li>
						
						<?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){ ?>
							<li><a href="<?=BASE_URL;?>logout.php">Logout</a></li>
						<?php }else{ ?>
							<li><a href="<?=BASE_URL;?>login.php">Login</a></li>
							<li class="active"><a href="<?=BASE_URL;?>reg.php">Sign up</a></li>
						<?php } ?>
					</ul> <!-- /.nav -->
			    </div><!-- /.navbar-collapse -->
		  	</div><!-- /.container -->
		</nav>
	</section> <!-- /#header -->