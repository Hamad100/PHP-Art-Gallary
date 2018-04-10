<?php session_start(); ?>
<?php 
	if($_SESSION['username'] == null){
		header("Location: http://f6team2.gblearn.com/project/index.php");
		exit;
	}

?>
<?php include("controller/load.php"); ?>
<?php include("partial/header.php"); ?>
<?php include("partial/navigation.php"); ?>




<!-- landing page banner   -->
<section class="home">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 home-col-1 text-uppercase">
                
                    Picasso Art gallery

            </div>
            <div class="col-sm-12 home-col-2 text-uppercase">

                    Lorem Ipsum is simply dummy text of the printing and typesetting <br>industry, lorem Ipsum has been.

            </div>
        </div>
    </div>
</section>


                
            
<!-- qoute    -->
<div class="container navFake">
    <div class="row">
        <div class="col-sm-12">
            <blockquote class="blockquote">
                <p>
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. <br>Lorem Ipsum has been the industry's standard dummy text 
                printing and  industry's standard dummy<br> text ever since.    
                and  industry's standard dummy text ever since.    
                </p>
                <footer>Shakespear in <cite title="Source Title">Source Title</cite></footer>
            </blockquote>    
        </div>
    </div>
</div>

<!--    category images-->
<section class="transit" <?php echo "id='category'"; ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-sm-12 test">
                <div class="col-xs-12 one t1">
                    <?php echo "<a href=\"category.php?cat=1\"><img src=\"images/painting2.jpg\"></a>"; ?>
                        <div class="col-sm-12 cap1 d1">
                            <h1>painting</h1>
                        </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-sm-12 test">
                <div class="col-xs-12 one t2">
                    <?php echo "<a href=\"category.php?cat=2\"><img src=\"images/sculp4.jpg\"></a>"; ?>
                    
                        <div class="col-sm-12 cap1 d2">
                            <h1>sculpture</h1>
                        </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-sm-12 test">
                <div class="col-xs-12 one t3">
                    <?php echo "<a href=\"category.php?cat=3\"><img src=\"images/photo1.jpg\"></a>"; ?>
                    
                        <div class="col-sm-12 cap1 d3">
                            <h1>Photography</h1>
                        </div>
                </div>
            </div>
        </div>
    </div>    
</section>

<!-- about section     -->
<section class="about" <?php echo "id='about'"; ?>>
    <div class="container-fluid">
        <div class="row relative">
            <div class="col-sm-6 col-one"></div>
            <div class="col-sm-6 col-two">
                <h2>About</h2><br>
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. 
                                            <br><br>
                        Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                    </p>
                    <p class="image">

                        <a href="http://www.facebook.com"><i class="fa fa-facebook-square" aria-hidden="true"></i></a>
                        <a href="http://www.twitter.com"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com"><i class="fa fa-instagram" aria-hidden="true"></i></a>

                    </p>
            </div>
        </div>  
    </div> 
<div class="col-sm-12 text-center"><a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a></div>	
</section>


                
<?php include("partial/footer.php"); ?>







