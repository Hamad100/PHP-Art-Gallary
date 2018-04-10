<?php session_start(); ?>
<?php 
	if($_SESSION['username'] == null){
		header("Location: http://f6team2.gblearn.com/project/index.php");
		exit;
	}

?>
<?php include("controller/loaddetail.php"); ?>
<?php include("controller/addtocart.php"); ?>
<?php include("controller/comment.php"); ?>
<?php include("partial/header.php"); ?>
<?php include("partial/navigation.php"); ?>

     
<section class="artdetail-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 skills-col-1 home-col-1 text-uppercase">

                    <?php 
                if(isset($_GET['art_id'])){
                    echo $cateName; 
                }else{
                    echo "Category";
                }
                
                
                ?>

            </div>
            <div class="col-sm-12 home-col-2 text-uppercase">

                    Lorem Ipsum is simply dummy text of the printing and typesetting <br>industry, lorem Ipsum has been.

            </div>
        </div>
    </div>
</section>
     <div class="container artdetail">
          <?php echo $loadDetail; ?>
           <?php echo $zoomImage; ?>
         <div class="row com">
               <div class="col-sm-6">
<!--                    <button class="btn btn-default pull-right">Comment</button><br>-->
                   <h4>Post Comment</h4>
                   
                  <?php echo $commentContent; ?><br>


                   <div class="col-sm-12">
                       <!--  member image  -->
                       <img src="images/placeholder-user.png">
                       <b><a href="#" class="commenter text-capitalize"><?php echo $_SESSION['username']; ?></a></b>

                       <!--  comment form -->
                       <form name="form1" action="" method="POST">
                           <div class="input-group">

                               <textarea class="form-control" id="comment" name="comment" rows="1" placeholder="comment..." value=""></textarea>
                               <span class="input-group-btn">
                                    <button type="submit" name="commentform" class="btn btn-default">Post</button>
                            </span>
                           </div>
                       </form>


                   </div>

                   
                   
                </div>
         </div>
		 
		 <div class="col-sm-12 text-center"><a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a></div>

     </div>


<?php include("partial/footer.php"); ?>
