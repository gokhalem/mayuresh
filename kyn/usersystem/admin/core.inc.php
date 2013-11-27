<?php
session_start();
ob_start();

include_once("check_login.inc.php");
// Files that inculde this file at the very top would NOT require 
// connection to database or session_start(), be careful.
// Initialize some vars
$user_ok = 0;
$log_id = "";

$log_password = "";
// User Verify function

function evalLoggedUser($con,$id,$p){

	$sql = "SELECT * FROM admin WHERE id='$id' AND password='$p'  LIMIT 1";
    $query = mysql_query($sql ,$con);
    $numrows = mysql_num_rows($query);
	if($numrows > 0){
		return 1;
	}
}
if(isset($_SESSION["id"])  && isset($_SESSION["password"])) {
	$log_id =  $_SESSION['id'];

	$log_password = $_SESSION['password'];
	// Verify the user
	$user_ok = evalLoggedUser($con,$log_id,$log_password);
} else if(isset($_COOKIE["id"]) && isset($_COOKIE["password"])){
	$_SESSION['id'] =  $_COOKIE['id'];
 
    $_SESSION['password'] =  $_COOKIE['password'];
	$log_id = $_SESSION['id'];

	$log_password = $_SESSION['password'];
	// Verify the user
	$user_ok = evalLoggedUser($con,$log_id,$log_password);
	if($user_ok == 1){
		// Update their lastlogin datetime field
		
		$sql = "UPDATE admin SET lastlogin=now() WHERE id='$log_id' LIMIT 1";
        $query = mysqli_query($con, $sql);
		$_SESSION['userok']= 1;
	}
}
?>


