<?php include('connection.php'); ?>
<?php
$categoryerror = $artisterror = $sizeerror  = $priceerror = $descriptionerror = $imageerror = "";
$artist = $size = $price = $description = $category = $image  = $cat_id = $image_name = $file = "";
$valid = "";
if(isset($_POST['upload'])){
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
        $imageerror .=  "File already exists. Either change the name or upload another image<br>";
        $valid = false;
    }
   // Check file size
    if ($_FILES["image"]["size"] > 6000000) {
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
    
    //full name validation
    if (empty($_POST['category'])) {
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
        // check if price number has valid format
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
    

} //end of populate


 // function for removing triming inputed data
    function test2_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

if($valid){
    $qry = "INSERT INTO artrepo (category, artist, size, price, description, cat_id, image_name)
            VALUES ('$category', '$artist', '$size', '$price','$description','$cat_id','$image_name')";
    
    if (!$connect->query($qry)) {
    //printf("Errormessage: %s\n", $connect->error);
   }
    header("Location: http://f6team2.gblearn.com/project/manage.php");
	exit;
    $categoryerror = $artisterror = $sizeerror  = $priceerror = $descriptionerror = $imageerror = "";
    $artist = $size = $price = $description = $category = $image  = $cat_id = $image_name = $file = "";
    unset($_POST);
}


//displays row from the table
$sql = "SELECT art_id, image_name, category, artist, size, price, description FROM artrepo ORDER BY art_id ASC";

$result = mysqli_query($connect, $sql);

$test = null;

//gets the id of the row
if(isset($_GET['id']) && $_GET['action'] == delete){
    $id = $_GET['id'];
    //echo "<br>test: " . $id;
//deletes the row of the specified id
    function deleterow($id){
            global  $connect;
            $delete = "DELETE FROM artrepo WHERE art_id=$id";
            if ($connect->query($delete) === TRUE) {
                //echo "<br>Record successfully deleted";
            } else {
                //echo "Error deleting record: " . $connect->error;
            }
			header("Location: http://f6team2.gblearn.com/project/dbtable.php");
			exit;

            return $delete;
        }

    $test = deleterow($id);

}


function dbtable($test){
    global $result;
    $table = "";
    $table .= "<table class=\"table table-bordered table-striped\">
               <thead class=\"thead-inverse\">
               <tr>
                  <th>ID</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>Artist</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Update</th>
                  <th>Delete</th>
                </tr>
              </thead><tbody>";
    
    while($row = mysqli_fetch_assoc($result)) {
          $table .= "<tr class=\"deleteme\">";
          $table .= "<th scope=\"row\">" . $row['art_id'] . "</th>";
          $table .= "<td><img height=\"50\" width=\"50\" src='upload/" . $row['image_name'] ."'></td>";
          $table .= "<td>" . $row['category'] . " </td>"; 
          $table .= "<td>" . $row['artist'] .   " </td>"; 
          $table .= "<td>" . $row['size'] .     " </td>"; 
          $table .= "<td>" . $row['price'] .    " </td>"; 
		  $table .= "<td><a class='btn btn-info' href='updaterepo.php?id=" . $row['art_id']. "&action=update'>Update</a></td>";
          $table .= "<td><a class='btn btn-danger' href='dbtable.php?id=" . $row['art_id']. "&action=delete'>Delete</a></td>";  
          $table .= "</tr>";
    }
    
    $table .= "</tbody></table>";
    return $table;
}

$dbtable = dbtable($test);





?>

