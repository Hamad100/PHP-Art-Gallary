<?php include("controller/userlogin.php"); ?>
<?php include("controller/updaterepoform.php"); ?>
<?php 
	if($_SESSION['username'] == null || $_SESSION['type'] != 1){
		header("Location: http://f6team2.gblearn.com/project/index.php");
		exit;
	}

?>
<?php include("partial/header.php"); ?>



<div class="container-fluid manage">
    <div class="row relative">
        <div class="col-sm-12">
            
                
            <div class="col-sm-12 skills-col-1 home-col-1 text-uppercase">
                

                    Picasso Manage
                <h4 style="color: greenyellow">
                    
                    Update Archive
                
                
                </h4>

            </div>
            <div class="col-sm-12 manage2">
			    <a href="manage.php">Manage</a> 
                <a href="dbtable.php">Archive</a> 
                <a href="index.php?action=logout">Logout</a> 
            </div>
            
            
        
        </div>     
</div>
<div class="row form">
    <div class="col-sm-3">
    </div>
     <div class="col-sm-6">
            <?php echo $table; ?>
            </div>
           <div class="col-sm-3">
            </div>
			<div class="col-sm-12 text-center"><a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a></div>

</div>    

</div>
    

<script src="jquery/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>



</body>
</html>
