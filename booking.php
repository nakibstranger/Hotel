<?php include_once 'header-2.php';?>
<?php

if(isset($_GET['id'])){
	include_once 'db-db.php';
	$conn = connect();
	$sql = "SELECT * FROM `packages`";
	$result = $conn->query($sql);
	foreach($result as $book){
		$id			 = $book['id'];
		$pack_name   = $book['pack_name'];
		$location    = $book['location'];
		$price       = $book['price'];
		$cabin_des   = $book['cabin_des'];
		$img         = $book['pack_img'];
	}
}


?>
<section class="offer section-wrapper">
		<div class="container">
			<h2 class="section-title">
				Our Blazzing offers
			</h2>
			<p class="section-subtitle">
				Lorem Ipsum is simply dummy text of the industry.
			</p>
			<div class="row">
			<form action="book_pro.php" method="POST">
				<div class="col-md-12>
					<h2>o</h2>
					<p><?=$price;?></p>
				</div> <!-- /.col-md-3 -->
				<input type="hidden" name="usr" value="<?=$_SESSION['user_id'];?>">
				<input type="hidden" name="p_name" value="<?=$pack_name;?>">
				<input type="hidden" name="p_price" value="<?=$price;?>">
				<input type="hidden" name="p_location" value="<?=$location;?>">
				<input type="hidden" name="p_id" value="<?=$id;?>">
				
				<label>start Date</label>
				<input type="date" name="str-dt"><br><br>
				<label>end Date</label>
				<input type="date" name="end-dt"><br><br>
				<label>Child</label>
				<input type="number" name="child"><br><br>
				<label>Adult</label>
				<input type="number" name="adult"><br><br>
				
				<input type="submit" name="book">
			</div>
			</form><!-- /.row -->
		</div> <!-- /.container -->
	</section>
	
	
	
<?php include_once 'footer.php';?>