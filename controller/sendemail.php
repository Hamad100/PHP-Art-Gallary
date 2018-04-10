<?php 

$nameerror = $usernameerror = $emailerror  = $phoneerror = $passworderror = $commenterror = $subjecterror = "";
$fullname = $username = $email = $phone = $password = $comment = $subject = $success = "";

$valid = '';
if (isset($_POST['contact'])) {
    $valid = true;
    
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
    if (empty($_POST["username"])) {
        $usernameerror = "* Username is required";
        $valid = false;
    } else {
        $username = test_input($_POST["username"]);
        $valid = true;
    }
    //email validation
    if (empty($_POST["email"])) {
        $emailerror = "* Email is required";
        $valid = false;
    } else {
        $email = test_input($_POST["email"]);
        $valid = true;
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "* Invalid email format";
			$email ="";
            $valid = false;
        }
    }
    //phone number validation
    if (empty($_POST["phone"])) {
        $phoneerror = "* Phone number is required";
        $valid = false;
    } else {
        $phone = test_input($_POST["phone"]);
        $valid = true;
        // check if phone number has valid format
        if(!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $phone)) {
            $phoneerror = "* Invalid Phone Number Entered";
			$phone ="";
            $valid = false;
        }
    }
    //password validation
    if (empty($_POST["password"])) {
        $passworderror = "* Password is Required";
        $valid = false;
    } else {
        $password = test_input($_POST["password"]);
        //$valid = false;
    }
    //comment validation
    if (empty($_POST["comment"])) {
        $commenterror = "Comment field is empty";
        $valid = false;
    } else {
        $comment = test_input($_POST["comment"]);
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


if($valid){
        $to = 'f6team2@gmail.com';
		$subject = $_POST['subject'];
        //$message = wordwrap($message, 70);
		$message = strftime("%T", time()) . "\r\n";
        $message .= "Name: " . $_POST['fullname'] . "\r\n";
        $message .= "Email Address: " . $_POST['email'] ."\r\n";
        $message .= "Phone number:  " . $_POST['phone'] ."\r\n";
        $message .= "Comment:  " . $_POST['comment'] . "\r\n";
        $from = $_POST['email'];
		$headers = "From: $from";
		$result = mail($to,$subject,$message,$headers);
        $success = "Your message has been succesfully submitted !"; 
        $nameerror = $usernameerror = $emailerror  = $phoneerror = $passworderror = $commenterror = $subjecterror = "";
        $fullname = $username = $email = $phone = $password = $comment = $subject = "";
        unset($_POST['contact']);
        header("Location: http://f6team2.gblearn.com/project/contact.php");
        exit;
        
}


?>

