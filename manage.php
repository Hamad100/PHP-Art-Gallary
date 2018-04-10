<?php include("controller/userlogin.php"); ?>
<?php 
	if($_SESSION['username'] == null || $_SESSION['type'] != 1){
		header("Location: http://localhost:800/projectbackup/project/index.php");
		exit;
	}

?>
<?php include("controller/function.php"); ?>
<?php include("partial/header.php"); ?>



<div class="container-fluid manage">
    <div class="row relative">
        <div class="col-sm-12">
            
                
            <div class="col-sm-12 skills-col-1 home-col-1 text-uppercase">
                

                    Picasso Manage
                <h4 style="color: greenyellow">
                    Upload data     
               
                </h4>

            </div>
            <div class="col-sm-12 manage2">
                <a href="dbtable.php">Archive</a> 
                <a href="index.php?action=logout">Logout</a> 
            </div>
            
            
        
        </div>     
</div>
<div class="row form">
    <div class="col-sm-3">
    </div>
     <div class="col-sm-6">
            <form action="" method="POST" enctype="multipart/form-data">
                  
                    
                        <div class="form-group">
                             <label for="category">Category</label><br><br>
                            <div class ="error"><?php //echo $categoryerror; ?></div>
                            <select class="form-control" class="selectpicker" name="category" id="category" title="Choose a Category">
							    <option disabled selected value>Select category</option>
                                <option value="Painting" <?= $_POST['category'] == Painting ? 'selected' : '' ?>>Painting</option>
                                <option value="Sculpture" <?= $_POST['category'] == Sculpture ? 'selected' : '' ?>>Sculpture</option>
                                <option value="Photography" <?= $_POST['category'] == Photography ? 'selected' : '' ?>>Photography</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="artist">Artist</label><br><br>
                            <div class ="error"><?php echo $artisterror; ?></div>
                            <input class="form-control" type="text" name="artist" id="artist" value="<?php echo $artist ?>" placeholder="artist...">
                        </div>
                        <div class="form-group">
                            <label for="size">Size</label><br><br><br><br>
                            <div class ="error"><?php echo $sizeerror; ?></div>
                            <input class="form-control" type="text" name="size" id="size" value="<?php echo $size ?>" placeholder="size...">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label><br><br><br><br>
                            <div class ="error"><?php echo $priceerror; ?></div>
                            <input class="form-control" type="text" name="price" id="price" value="<?php echo $price ?>" placeholder="price...">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label><br><br><br><br>
                            <div class ="error"><?php echo $descriptionerror; ?></div>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="description..."><?php echo $description ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label><br><br><br><br><br><br>
                            <div class ="error"><?php echo $imageerror; ?></div>
                            <input class="form-control" type="file" id="image" name="image" placeholder="image...">
                        </div> 
                        
                        <input type="submit" class="btn btn-warning" value="Submit" name="upload" style="margin-right: 10px">
                        <input type="reset" class="btn btn-warning" value="Reset">
                   

                </form>
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
