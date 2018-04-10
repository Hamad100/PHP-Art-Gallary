<?php include("connection.php"); ?>
<?php
$nameerror = $usernameerror = $emailerror = $passworderror  = $confirmpassworderror = "";
$fullname = $username = $email = $phone = $password = "";

$validupdate = '';
if (isset($_POST['btnUpdate'])) {
    $validupdate = true;
    
    //full name validation
    if (empty($_POST["fullname"])) {
        $nameerror = "* Name is required";   
        $validupdate = false;
    } else {
        $fullname = test_input_update($_POST["fullname"]);
        //$validupdate = true;
        // check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
            $nameerror = "* Only letters and white space allowed";
			$fullname = "";
            $validupdate = false;
        }
    }
	
	    //username validation
    if (empty($_POST["username"])) {
        $usernameerror = "* Username is required";
        $validupdate = false;
    } else {
        $username = test_input_update($_POST["username"]);
        //$validupdate = true;
    }
	//email validation
    if (empty($_POST["email"])) {
        $emailerror = "* Email is required";
        $validupdate = false;
    } else {
        $email = test_input_update($_POST["email"]);
        //$validupdate = true;
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailerror = "* Invalid email format";
			$email ="";
            $validupdate = false;
        }
    }
	//password validation
    if (empty($_POST["password"])) {
        $passworderror = "* Password is Required";
        $validupdate = false;
    } else {
        $password = test_input_update($_POST["password"]);
        //$valid = false;
    }
	//password validation
    if (empty($_POST["confirmpassword"])) {
        $confirmpassworderror = "* Password is Required";
        $validupdate = false;
    } else {
        $confirmpassword = test_input_update($_POST["confirmpassword"]);
        //$valid = false;
    }
	if($password != $confirmpassword){
		$passworderror = "* Password doesn't match";
		$password = $confirmpassword = "";
		$validupdate = false;
	}
}

//function for removing triming inputed data
    function test_input_update($data) {
        $data = trim($data);
        $data = stripslashes($data);
        //$data = htmlspecialchars($data);
        return $data;
    }
	
if($validupdate){
	$query = "UPDATE members SET username = '".$_POST['username']."', name = '".$_POST['fullname']."' , email = '".$_POST['email']."', password = '".$_POST['password']."' WHERE username ='" . $_SESSION[username]."'";
   
    $result = $connect->query($query);
	
	
	$_SESSION[username] = $_POST['username'];
	
	 header("Location: http://f6team2.gblearn.com/project/changeprofile.php");
     exit;
	
	
}

$result = mysqli_query($connect, "SELECT * FROM members WHERE username = '" . $_SESSION['username']."' AND password = '" . $_SESSION['password']."'");

$update = "<form action=\"changeprofile.php\" method=\"post\">";
while($row = mysqli_fetch_assoc($result)){  
            $update .= "<div class=\"form-group\"><label class=\"form-control-label\" for=\"fullname\">Full Name</label> <br><br>";         
			$update .= "<div class =\"error\"> " . $nameerror . "</div>";
            $update .= "<input class=\"form-control\" type=\"text\" name=\"fullname\" id=\"fullname\" value='" . $row['name'] . "' \"placeholder=\"fullname...\"></div>";
            

            $update .= "<div class=\"form-group\">
                        <label class=\"form-control-label\" for=\"username\">Username</label> <br><br><br><br>
						<div class = \"error\">" . $usernameerror . "</div>";
            $update .= "<input class=\"form-control\" type=\"text\" name=\"username\" id=\"username\" value='" . $row['username'] . "' placeholder=\"username...\">
                    </div>";
            $update .= "<div class=\"form-group\">
                        <label class=\"form-control-label\" for=\"email\">Email</label> <br><br><br><br>
						<div class = \"error\">" . $emailerror . "</div>";
            $update .= "<input class=\"form-control\" type=\"email\" name=\"email\" id=\"email\" value='" . $row['email'] ."' placeholder=\"email...\">
                    </div>";

             $update .= "<div class=\"form-group\">
                        <label class=\"form-control-label\" for=\"password\">Password</label> <br><br><br><br>
						<div class = \"error\">" . $passworderror . " </div>";
            $update .= "<input class=\"form-control\" type=\"password\" name=\"password\" id=\"password\" value='" . $row['password'] . "' placeholder=\"password...\">
                    </div>";
             $update .= "<div class=\"form-group\">
                        <label class=\"form-control-label\" for=\"password\">Confirm Password</label> <br><br><br><br>
						<div class = \"error\"> " . $confirmpassworderror . "</div>";
            $update .= "<input class=\"form-control\" type=\"password\" name=\"confirmpassword\" id=\"password\" value='" .$row['password'] ."' placeholder=\"password...\">
                    </div>

                    <br>
                     <button type=\"submit\" name=\"btnUpdate\" class=\"btn btn-warning col-xs-12\">Update</button>";

}
           $update .= "</form>";


   

?>

