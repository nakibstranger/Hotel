<?php include_once 'header-2.php';?>

<?php 

  //  error_reporting(0);
  include_once 'db-db.php';
		$conn = connect();
    $flag  = TRUE;
    $message  = ""; 

if(isset($_POST['save_pack']) || isset($_POST['up_pack'])){
	$pack_name  = $_POST['pack_name'];
    $location   = $_POST['location'];
    $price   	= $_POST['price'];
    $pack_img   = '';
    $cabin_des  = $_POST['cabin_des'];
    $park_des 	= $_POST['park_des'];
      
      if (empty($pack_name)) {
        if (is_numeric($pack_name)) {
          $message .= "please write alphabetic<br>";
          $flag     = FALSE;
        }
          $message .= "Enter Package Name<br>";
          $flag     = FALSE;
      }
       if (empty($location)) {
          $message .= "Please Enter Location<br>";
          $flag     = FALSE;
      }
       if (empty($price)) {
        if (!is_numeric($price)) {
          $message .= "Price Must Be in Number<br>";
          $flag     = FALSE;
        }
         $message  .= "Please Enter Package Price<br>";
         $flag      = FALSE;
      }


      if(isset($_FILES["pack_img"]["name"]) && $_FILES["pack_img"]["name"] !='' ){
        $target_dir    = "img/";
        $pack_img      = date('YmdHis_');
        $pack_img     .= basename($_FILES["pack_img"]["name"]);
        $target_file   = $target_dir . $pack_img;
        $fileUp        = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        $check         = getimagesize($_FILES["pack_img"]["tmp_name"]);
        if($check  !== false) {
          $fileUp      = 1;
        } else {
        $message      .= "File is not an image.";
        $fileUp        = 0;
        }
        
       
        if (file_exists($target_file)) {
        $message     .= "Sorry, file already exists.";
        $fileUp        = 0;
        }
        
        if ($_FILES["pack_img"]["size"] > 90000000) {
        $message .= "Sorry, your file is too large.";
        $fileUp = 0;
        }
        
        if($imageFileType != "JPG" && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $message .= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $fileUp = 0;
        }
        
        if ($fileUp == 0) {
        $message .= "Sorry, your file was not uploaded.";
       
        } else {
          if (move_uploaded_file($_FILES["pack_img"]["tmp_name"], $target_file)) {
             $flag = TRUE;
         
          } else {
            $message .= "Sorry, there was an error uploading your file.";
          }
        }
        
      }

      	
      
      if ($flag && isset($_POST['save_pack']) ) {
        $sql = "INSERT INTO `packages` (`pack_name`, `location`, `price`, `pack_img`, `cabin_des`, `park_des`) VALUES ('$pack_name', '$location', '$price', '$pack_img', '$cabin_des', '$park_des')";
		$result = $conn->query($sql);

      if($result){
        $message .='Successful<br>';
		
		
      }else{
        $message .='Unsuccessful<br>';
      }    
      } else if($flag && isset($_POST['up_pack'])){

        $id = $_POST['id'];
        $sql = "UPDATE `packages` SET `pack_name` = '$pack_name', `location` = '$location', `price` = '$price', `pack_img` = '$pack_img', `cabin_des` = '$cabin_des', `park_des` = '$park_des' WHERE `packages`.`id` = $id";
		
		$result = $conn->query($sql);

      if($result){
        $message .='Successful<br>';
      }else{
        $message .='Unsuccessful<br>';
      }    
      }

      
      
  }

$upDis   = 'disabled';
$saveDis = '';
 if(isset($_GET['id'])){
       $upDis = '';
       $saveDis = 'disabled';
      
       $id = $_GET['id'];
       $sql = "SELECT * FROM `packages` WHERE `id` = $id";
       $result = $conn->query($sql);

      foreach($result as $upPack){
          $id         = $upPack['id'];
          $pack_name  = $upPack['pack_name'];
          $location   = $upPack['location'];
          $price      = $upPack['price'];
          $pack_img   = $upPack['pack_img'];
          $cabin_des  = $upPack['cabin_des'];
          $park_des   = $upPack['park_des'];
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
						Add Package
					</h2>
					<p>
				<?php echo $message;?>
					</p>
					<div class="form">
					<form action="packages.php" method="POST" enctype="multipart/form-data">
						<input type="hidden" name="id" value="<?php echo (isset($id))? $id : 0;?>">
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" name="pack_name" type="text" placeholder="Package Name" value="<?php echo (isset($pack_name))? $pack_name : '';?>">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-email"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" type="text" name="location" placeholder="Location" value="<?php echo (isset($location))? $location : '';?>" >
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-ios-star"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" type="number" name="price" placeholder="Price" value="<?php echo (isset($price))? $price : '';?>">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-ios-star"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<input class="form-control border-radius border-right" type="file" name="pack_img" placeholder="Price" value="<?php echo (isset($pack_img))? $pack_img : '';?>">
						 	<span class="input-group-addon  border-radius custom-addon">
								<i class="ion-ios-star"></i>
							</span>
						</div>
						<div class="input-group">		
						 	<textarea class="form-control border-radius border-right" type="text" name="cabin_des" placeholder="Cabin Description" style="width: 555px;"><?php echo (isset($cabin_des))? $cabin_des : '';?></textarea>
						</div>
						<div class="input-group">		
						 	<textarea class="form-control border-radius border-right" type="text" name="park_des" placeholder="Park Facilities" style="width: 555px;"><?php echo (isset($park_des))? $park_des : '';?></textarea>
						</div>
						<input type="submit" name="save_pack" class="btn btn-default" value="SavePackage"<?=$saveDis;?>/>
						<input type="submit" name="up_pack" class="btn btn-default" value="UPDATE"<?=$upDis;?>/>
						
						</form>
					</div>
				</div> <!-- /.col-sm-6 -->
				<div class="col-sm-3">

				</div> <!-- /.col-sm-6 -->
			</div>
		</div>


		<div class="container" style="margin-top: 70px;">
			<h3 style="text-align: center;color: #000;">All Packages</h3>
      <div class="row">
          <table class="table table-bordered">
          <thead>
            <tr class="packTable">
              <th style="color: #000;">Package Name</th>
              <th style="color: #000;">Location</th>
			  <th style="color: #000;">Price</th>
			  <th style="color: #000;">Package Image</th>
              <th style="color: #000;">Cabin Description</th>
              <th style="color: #000;">Park Facilities</th>
              <th style="color: #000;">Action</th>
            </tr>
          </thead>
          <tbody>

        <?php 
  			include_once 'db-db.php';
			$conn = connect();
            $sql = "SELECT * FROM `packages`";
            $result = $conn->query($sql);
              foreach($result as $packages){
        ?>
            <tr class="packTable">
              <td style="color: #000;"><?=$packages['pack_name']?></td>
              
              <td style="color: #000;"><?=$packages['location']?></td>
              <td style="color: #000;"><?=$packages['price']?></td>
			  <td style="color: #000;"><img src="<?=BASE_URL;?>img/<?=$packages['pack_img']?>" style="width: 100px; height: 100px;"></td>
              <td style="color: #000;"><?=$packages['cabin_des']?></td>
              <td style="color: #000;"><?=$packages['park_des']?></td>
              <td style="color: #000; text-align: center;"><a href="<?=BASE_URL;?>packages.php?id=<?=$packages['id']?>" class="btn btn-primary btn-xs">Edit</a><br>  </td>
            </tr>
        <?php }?>
          </tbody>
        </table>
        </div>
    </div>
	</section>
<?php include_once 'footer.php';?>