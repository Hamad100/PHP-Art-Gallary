<?php include('connection.php'); ?>
<?php
$categoryerror = $artisterror = $sizeerror  = $priceerror = $descriptionerror = $imageerror = "";
$artist = $size = $price = $description = $category = $image  = $cat_id = $image_name = $file = "";
$valid = "";
if(isset($_POST['update'])){
    $valid = true;
    
    $category = $_POST['category'];
    $artist = $_POST['artist'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $description = $_POST['description'];
    
    

    switch($category){
        case 'Painting':
            $cat_id = 1;
            break;
        case 'Sculpture':
            $cat_id = 2;
            break;
        case 'Photography':
            $cat_id = 3;
            break;
    }
	

    //image validation
	
	if(isset($_POST['image'])){
        $file = $_FILES['image']['tmp_name'];
        
        // Check if image file is a actual image or fake image
    if(isset($file)) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
        } else {
            $imageerror .= "File is not an image.<br>";
            $valid = false;
        }
        }
    }
	
    $target_dir = "/home/f6team2/public_html/project/upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $image_name = addslashes($_FILES['image']['name']);
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	
	
	
	 if($image_name == ""){
		$imageerror .= "Image is required";
		$valid = false;
	}else{
		
    // Check if file already exists
    if (file_exists($target_file)) {
        $imageerror .=  "Image already exists.";
        $valid = true;
    }
   // Check file size
    if ($_FILES["image"]["size"] > 600000) {
        $imageerror .= "Your file is too large.<br>";
        $valid = false;
    }
    // Check file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $imageerror .= "Only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $valid = false;
    }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        } else {
            $imageerror .= "There was an error uploading your file.<br>";
            $valid = false;
        }
    
	}

    
    //full name validation
    if (empty($_POST["artist"])) {
        $artisterror = "* Artist is required";   
        $valid = false;
    } else {
        $artist = test2_input($_POST["artist"]);
        
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$artist)) {
            $artisterror = "* Only letters and white space allowed";
			$artist = "";
            $valid = false;
        }
    }
    
    //category validation
    if (empty($_POST["category"])) {
        $categoryerror = "* Category is required";   
        $valid = false;
    } else {
        $category = test2_input($_POST["category"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$category)) {
            $categoryerror = "* Only letters and white space allowed";
			$category = "";
            $valid = false;
        }
    }
    
    //size validation
    if (empty($_POST["size"])) {
        $sizeerror = "* Size is required";
        $valid = false;
    } else {
        $size = test2_input($_POST["size"]);
        
        
    }
    
    //price validation
    if (empty($_POST["price"])) {
        $priceerror = "* Price is required";
        $valid = false;
    } else {
        $price = test2_input($_POST["price"]);
        // check if phone number has valid format
        if(!is_numeric($price)) {
            $priceerror = "* Invalid price Entered";
			$price ="";
            $valid = false;
        }
    }
    
    //description validation
    if (empty($_POST["description"])) {
        $descriptionerror = "* Description is required";
        $valid = false;
    } else {
        $description = test2_input($_POST["description"]);
        
        
    }
  
    
}//end of update

 // function for removing triming inputed data
    function test2_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }




if(isset($_GET['id']) && $_GET['action'] == update){
	$id = $_GET['id'];
	//displays row from the table
$sql = "SELECT * FROM artrepo WHERE art_id = '$id'";

$result = mysqli_query($connect, $sql);

    $table = "";
	
    $table .= "<form action='' method='POST' enctype='multipart/form-data'>";
    
    while($row = mysqli_fetch_assoc($result)) {
          $table .= "<div class='form-group'>
                             <label for='category'>Category</label><br><br>
                            <div class ='error'>" . $categoryerror ."</div>
                            <select class='form-control' name='category' id='category'>
							    <option disabled selected value>Select category</option>
                                <option>Painting</option>
                                <option>Sculpture</option>
                                <option>Photography</option>
                            </select>
                     </div>";
          $table .= "<div class='form-group'>
                            <label for='artist'>Artist</label><br><br>
                            <div class ='error'>" . $artisterror . "</div>
                            <input class='form-control' type='text' name='artist' id='artist' value='" . $row['artist'] . "' placeholder='artist...'>
                    </div>";
          $table .=  "<div class='form-group'>
                            <label for='size'>Size</label><br><br><br><br>
                            <div class ='error'>" . $sizeerror . "</div>
                            <input class='form-control' type='text' name='size' id='size'  value='" . $row['size'] . "' placeholder='size...'>
                        </div>";
          $table .= "<div class='form-group'>
                            <label for='price'>Price</label><br><br><br><br>
                            <div class ='error'>" .$priceerror . "</div>
                            <input class='form-control' type='text' name='price' id='price'  value='" . $row['price'] . "' placeholder='price...'>
                        </div>";
          $table .= "<div class='form-group'>
                            <label for='description'>Description</label><br><br><br><br>
                            <div class ='error'>" . $descriptionerror . "</div>
                            <textarea class='form-control' id='description' name='description' rows='3' placeholder='description...'>" . $row['description']. "</textarea>
                        </div>"; 
          $table .= "<div class='form-group'>
                            <label for='image'>Image</label><br><br><br><br><br><br>
                            <div class ='error'>" . $imageerror . "</div>
                            <input class='form-control' type='file' id='image' name='image' value='" . $row['image_name'] . " placeholder='image...'>
                        </div>"; 
          $table .= "<input type='submit' class='btn btn-warning' value='Update' name='update' style='margin-right: 10px'>
                        <input type='reset' class='btn btn-warning' value='Reset'>";  
          
    }
	$table .= "</form>";
   



	
	
}

if($valid){
	
	//updates the row of the specified id
        
			$update = "UPDATE artrepo SET category = '$category', artist = '$artist' , size = '$size', price = '$price', image_name = '$image_name', cat_id = '$cat_id', description = '$description' WHERE art_id ='$id'";
   
            $result = $connect->query($update);
            
            if ($connect->query($update) === TRUE) {
                //echo "<br>Record successfully deleted";
            } else {
                echo "Error deleting record: " . $connect->error;
            }
			header("Location: http://f6team2.gblearn.com/project/dbtable.php");
			exit;


    $categoryerror = $artisterror = $sizeerror  = $priceerror = $descriptionerror = $imageerror = "";
    $artist = $size = $price = $description = $category = $image  = $cat_id = $image_name = $file = "";
    unset($_POST);
}




$connect->close();


?>