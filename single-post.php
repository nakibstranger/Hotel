<?php include_once 'header.php'; ?>
<section class="blog" style="height:200px;">

                <?php 
                    error_reporting(0);

                    include_once('db-db.php');
                    $conn = connect();
					$id=$_GET['id'];
                    $sql = "SELECT * FROM forum where id='$id'";
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
	
					<form style="margin:100px;" method="post" action="commentAction.php">
						<label>Comments box</label>
						<input type="text" name="comment" placeholder="comments here"/>
						<input type="hidden" name="postID" value="<?= $postID=$_GET['id']; $postID;?>"/>
						<button name="add"><div class="btn btn-success" style="" >ADD</div></button>
					</form>	
					
					
					
			
<?php include_once 'footer.php';?>
</section>

