<?php 
$categoryerror = $artisterror = $sizeerror  = $priceerror = $descriptionerror = $imageerror = "";
$artist = $size = $price = $description = $category = $image  = $cat_id = $image_name = $file = "";

$valid = '';
if(isset($_POST['upload'])){
    $valid = true;
    
    $category = $_POST['category'];
    $artist = $_POST['artist'];
    $price = $_POST['price'];
    $size = $_POST['size'];
    $description = $_POST['description'];
    $file = $_FILES['image']['tmp_name'];

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
        /*default:
            $cat_id = 1;
            break;*/
    }
    
    $target_dir = "C:xampp/htdocs/comp1230/assignments/assignment1/gallery/controller/upload/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $image_name = addslashes($_FILES['image']['name']);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

// Check if image file is a actual image or fake image
    if(isset($file)) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            //echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $imageerror = "File is not an image.";
            $uploadOk = 0;
            $valid = false;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        $imageerror =  "Sorry, file already exists.";
        $uploadOk = 0;
        $valid = false;
    }
// Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $imageerror = "Sorry, your file is too large.";
        $uploadOk = 0;
        $valid = false;
    }
// Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        $imageerror = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
        $valid = false;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $imageerror = "Sorry, your file was not uploaded.";
        $valid = false;
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
            //echo $target_file;
            //$imageerror = "<script>alert('Your file is uploaded successfully')</script>";
            $valid = true;
        } else {
            $imageerror = "Sorry, there was an error uploading your file.";
            $valid = false;
        }
    }
    
    
    //full name validation
    if (empty($_POST["fullname"])) {
        $nameerror = "* Name is required";   
        $valid = false;
    } else {
        $fullname = test_input($_POST["fullname"]);
        $valid = true;
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
            $nameerror = "* Only letters and white space allowed";
			$fullname = "";
            $valid = false;
        }
    }
    //subject error
    if (empty($_POST["subject"])) {
        $subjecterror = "* Subject is required";
        $valid = false;
    } else {
        $subject = test_input($_POST["subject"]);
        $valid = true;
        // check if subject only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$subject)) {
            $subjecterror = "* Only letters and white space allowed";
			$subject ="";
            $valid = false;
        }
        
    }
    //username validation
    if (empty($_POST["category"])) {
        $categoryerror = "* Category is required";
        $valid = false;
    } else {
        $category = test_input($_POST["category"]);
        $valid = true;
    }
    //email validation
    if (empty($_POST["artist"])) {
        $artisterror = "* Artist name is required";
        $valid = false;
    } else {
        $artist = test_input($_POST["artist"]);
        $valid = true;
    }
    //phone number validation
    if (empty($_POST["price"])) {
        $priceerror = "* Price is required";
        $valid = false;
    } else {
        $price = test_input($_POST["price"]);
        $valid = true;
        // check if phone number has valid format
        if(!is_numeric($price)) {
            $priceerror = "* Invalid price Entered";
			$price ="";
            $valid = false;
        }
    }
    
     //size validation
    if (empty($_POST["size"])) {
        $sizeerror = "Size is required";
        $valid = false;
    } else {
        $size = test_input($_POST["size"]);
        $valid = true;
        
    }
    
    //description validation
    if (empty($_POST["description"])) {
        $descriptionerror = "Description is required";
        $valid = false;
    } else {
        $description = test_input($_POST["description"]);
        $valid = true;
        
    }
    
    

    
}
   

    // function for removing triming inputed data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


/*
if($valid){
    
        
        unset($_POST['contact']);
        header("location: contact.php"); 
        exit;
        
}
*/


?>

