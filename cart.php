<?php session_start(); ?>
<?php 
	if($_SESSION['username'] == null){
		header("Location: http://f6team2.gblearn.com/project/index.php");
		exit;
	}

?>
<?php include('controller/addtocart.php'); ?>
<?php include("partial/header.php"); ?>
<?php include("partial/navigation.php"); ?>


<section class="cart-banner">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 skills-col-1 home-col-1 text-uppercase">

                    My Cart

            </div>
            <div class="col-sm-12 home-col-2 text-uppercase">

                    Lorem Ipsum is simply dummy text of the printing and typesetting <br>industry, lorem Ipsum has been.

            </div>
        </div>
    </div>
</section>

<div class="container mycart">

<!--  insert car items here -->
    
<?php

if(isset($_SESSION['cart']) && count($cart) > 0){
    echo $cartTable;
}else{
    echo "<div class='col-sm-12 text-center'><h3>There are no items in your cart.</h3></div>";
}
 
    //var_dump($cart);





?>
    
<div class="col-sm-12 text-center"><a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a></div>
</div>




<?php include("partial/footer.php"); ?>