<?php session_start(); ?>
<?php 
	if($_SESSION['username'] == null){
		header("Location: http://f6team2.gblearn.com/project/index.php");
		exit;
	}

?>
<?php include("controller/load.php"); ?>
<?php include("controller/loaddetail.php"); ?>
<?php include("partial/header.php"); ?>
<?php include("partial/navigation.php"); ?>
     
<section class="category-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 skills-col-1 home-col-1 text-uppercase">

                
                <?php 
                    if(isset($cateName)){
                    echo $cateName; 
                    }else{
                        echo "category";
                    }
                ?>
                    

            </div>
            <div class="col-sm-12 home-col-2 text-uppercase">

                    Lorem Ipsum is simply dummy text of the printing and typesetting <br>industry, lorem Ipsum has been.

            </div>
        </div>
    </div>
</section>
     <div class="container category">

            
                <?php
                    echo $loadContent;
                 ?>
                
<div class="col-sm-12 text-center"><a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a></div>
     </div>
     
      
     
<?php include("partial/footer.php"); ?>
