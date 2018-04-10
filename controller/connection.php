<?php 
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'gallery';

// Create connection
$connect = new mysqli($host,$username,$password,$database);
//check connection
if ($connect->connect_error) {
    printf("Connection failed: %s\n", $connect->connect_error);
    exit();
}

?>
