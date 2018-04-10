<?php session_start(); ?>
<?php 
	if($_SESSION['username'] == null  || $_SESSION['type'] != 1){
		header("Location: http://f6team2.gblearn.com/project/index.php");
		exit;
	}

?>
<?php include("controller/function.php"); ?>
<?php include("partial/header.php"); ?>





<div class="container-fluid manage">
    <div class="row relative">
        <div class="col-sm-12">
            
                
            <div class="col-sm-12 skills-col-1 home-col-1 text-uppercase">
                

                    Picasso Archive

            </div>
            <div class="col-sm-12 manage2">
                <a href="manage.php">Manage</a> 
                <a href="index.php?action=logout">Logout</a> 
            </div>
    
        </div>     
</div>
    
<div class="row form">
    <div class="container">
            <div class="col-sm-12">
                
                <?php 
                if ($result->num_rows > 0) {
                    echo $dbtable; 
                }else{
                    echo "<h3>You don't have item in your archive</h3>";
                }
                ?>
                    
                
                
                
            </div>
    </div>
             
    
</div>   
<div class="col-sm-12 text-center"><a href="/folder_view/vs.php?s=<?php echo __FILE__?>" target="_blank">View Source</a></div>	 

</div>
    

<script src="jquery/jquery-2.2.3.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/script.js"></script>
<script>

function deleteRow(el) {
    $(el).closest('tr').remove();
} 

</script>


</body>
</html>
