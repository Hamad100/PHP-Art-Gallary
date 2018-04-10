<?php session_start(); ?>
<?php include('connection.php'); ?>
<?php


$nameerror = $usernameerror = $emailerror = $passworderror  = $confirmpassworderror = $usernameLogError = $passwordLogError = "";
$fullname = $username = $email = $phone = $password = $usernameLog = $passwordLog = "";

$validreg = $valid = '';
if (isset($_POST['btnSubmit'])) {
    $validreg = true;
    
    //full name validation
    if (empty($_POST["fullname"])) {
        $nameerror = "* Name is required";   
        $validreg = false;
    } else {
        $fullname = test_input($_POST["fullname"]);
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
            $nameerror = "* Only letters and white space allowed";
			$fullname = "";
            $validreg = false;
        }
    }
	
	    //username validation
    if (empty($_POST["username"])) {
        $usernameerror = "* Username is required";
        $validreg = false;
    } else {
        $username = test_input($_POST["username"]);
    }
	//email validation
    if (empty($_POST["email"])) {
        $emailerror = "* Email is required";
        $validreg = false;
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "* Invalid email format";
			$email ="";
            $validreg = false;
        }
    }
	//password validation
    if (empty($_POST["password"])) {
        $passworderror = "* Password is Required";
        $validreg = false;
    } else {
        $password = test_input($_POST["password"]);
        //$valid = false;
    }
	//password validation
    if (empty($_POST["confirmpassword"])) {
        $confirmpassworderror = "* Confirmation of Password is required";
        $validreg = false;
    } else {
        $confirmpassword = test_input($_POST["confirmpassword"]);
        //$valid = false;
    }
	if($password != $confirmpassword){
		$passworderror = "* Password doesn't match";
		$password = $confirmpassword = "";
		$validreg = false;
	}
}

   

if (isset($_POST['btnLogin'])) {
    $valid = true;
   
	    //username validation
    if (empty($_POST["usernameLog"])) {
        $usernameLogError = "* Username is required";
        $valid = false;
    } else {
        $usernameLog = test_input($_POST["usernameLog"]);
        //$valid = true;
    }
	
	//password validation
    if (empty($_POST["passwordLog"])) {
        $passwordLogError = "* Password is Required";
        $valid = false;
    } else {
        $passwordLog = test_input($_POST["passwordLog"]);
        //$valid = true;
    }
}

    //function for removing triming inputed data
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
	
	if($validreg){
		
	$query = "INSERT INTO members(name, username, email, password) 
    VALUES ('".$_POST['fullname']."','".$_POST['username']."','".$_POST['email']."','".$_POST['password']."')";
    $result = $connect->query($query);
	
	header("Location: http://localhost:800/projectbackup/project/index.php");
    exit;
	
}

	if($valid){
		$usernameLog = $_POST['usernameLog'];
	
        $passwordLog = $_POST['passwordLog'];

        $result = mysqli_query($connect, "SELECT * FROM members WHERE username = '$usernameLog' AND password='$passwordLog' LIMIT 1");

        $row = mysqli_fetch_assoc($result);
        if ($row['username'] == $usernameLog && $row['password'] == $passwordLog && $row['type'] == 1){
                $_SESSION['username'] = $usernameLog;
                $_SESSION['password'] = $passwordLog;
				$_SESSION['type'] = 1;
				header("Location: http://localhost:800/projectbackup/project/manage.php");
                exit;
        }
        else if($row['username'] == $usernameLog && $row['password'] == $passwordLog && $row['type'] == 0){
                $_SESSION['username'] = $usernameLog;
				$_SESSION['password'] = $passwordLog;
				$_SESSION['type'] = 0;
				header("Location: http://localhost:800/projectbackup/project/home.php");
                exit;
        }else{
           
            $incorrectLogError = "Incorrect username or password"; 
        }
		
		
	}
	
?>
