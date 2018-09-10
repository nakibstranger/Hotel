<?php include_once 'header.php'; ?>

    <!-- breadcrumbs -->
    <section class="breadcrumbs" style="background-image: url(assets/images/breadcrumbs/IMG10.jpg)">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h1 class="h1">Post your Experiances.</h1>
          </div>          
        </div>
      </div>
    </section>
    <!-- /breadcrumbs -->
    <!-- Blog -->
    <section class="blog">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="blog-box __post">
              <div class="post-list">
                <div class="post-list_box">
                  <div class="row">
                    
                    <?php if(isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn']){ ?>
                                <div class="row" style="margin-bottom: 55px;">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                       
							<form action="post_person.php" method="POST" enctype="multipart/form-data">
							<div class="col-md-12" style="margin-bottom: 10px;">
							<h4 style="margin-left: 20px;font-size: 40px;"><?php if(isset($_SESSION['user_name'])){echo $_SESSION['user_name'];}?></h4>
							</div>
							<div class="col-md-12">
							<input type="text" name="post_title" class="col-md-12" placeholder="Enter Post Title Here...">
							<textarea class="col-md-12" placeholder="Enter Your Text Here..." type="text" name="post_field"></textarea>
							</div>
							<div class="col-md-12">
							<input type="hidden" name="user_id" value="<?php echo ($_SESSION['user_id'])?>">
							<input type="hidden" name="user_name" value="<?php echo ($_SESSION['user_name'])?>">
							<input type="file" name="post_thumb" class="col-md-9" style="height: 50px; border: 2px solid #a9a9a9;">
							<button type="submit" name="post" class="col-md-3 btn btn-warning" style=" font-weight: bold; font-size: 20px;background: #303030; border-color: #303030;border-radius: 0;height: 50px;">POST  <i class="fa fa-check" aria-hidden="true"></i></button>
							<input type="hidden" name="postID" value="<?= $postID=$_GET['id']; $postID;?>"/>
							</div>
                            </form>
                             <div class="col-md-12">
                         <?php 
                             if(isset($_SESSION['msg'])){ 
                                echo $_SESSION['msg']; 
                                  unset($_SESSION['msg']);
                                     }
                          ?>
                                        </div>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                <?php }else{ ?>
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <h3 style="text-align: center; margin-bottom: 25px; padding: 10px;color: #fff;" class="bg-success">Please <a href="<?=BASE_URL?>reg.php" style="color: yellow;">Login</a>/<a href="<?=BASE_URL?>reg.php" style="color: yellow;">Register</a> to Post your Status</h3>
                                    </div>
                                    <div class="col-md-2"></div>

                                </div>
                <?php } ?>


                  </div>
                <?php 
                    error_reporting(0);

                    include_once('db-db.php');
                    $conn = connect();

                    $sql = "SELECT * FROM forum order by id desc LIMIT 10";
                    $result = $conn->query($sql);
                    foreach($result as $posts){ 
                ?>
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-ms-12 col-xs-12">
                      <div class="post-list_img"><a href="#">
                          <img src="<?=BASE_URL;?>img/post/<?=$posts['post_img'];?>" style="width: 100%;">
                      </a>
                    </div><br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-ms-12 col-xs-12">
                      <div class="post-list_info">
                        <div class="post-list_n"><a href="blog-detail.html"><?=$posts['post_title'];?></a></div>
                        <div class="post-list_meta">
                          <ul class="meta_author">
                            <li><i class="fa fa-user-o"></i> <span>
							<?=$posts['user_name'];?>
							</span></li>
							
							<li><i class="fa fa-clock-o"></i> <span>
							<?php
							$dt = new DateTime();
							echo $dt->format('Y-m-d');
							?>
							</span></li>
                          </ul>
                        </div>
                        <div class="post-list_desc"><?=$posts['post_description'];?></div>
                        <div class="post-list_readmore"><a href="single-post.php?id=<?=$posts['id']?>">Read More</a></div>
                      </div>
                    </div>
                  </div>
              <?php }?>

                </div>
              </div>
            </div>
          </div>
          </div>
        </div>
    </section>
    <!-- /Blog -->
<?php include_once 'footer.php'; ?>