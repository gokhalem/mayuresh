<?php
if (isset($_GET['logout'])){
session_start();
// Set Session data to an empty array
$_SESSION = array();
// Expire their cookie files
if(isset($_COOKIE["flatno"]) && isset($_COOKIE["lname"]) && isset($_COOKIE["password"])) {
	setcookie("flatno", '', strtotime( '-5 days' ), '/');
    setcookie("lname", '', strtotime( '-5 days' ), '/');
	setcookie("password", '', strtotime( '-5 days' ), '/');
}
// Destroy the session variables
session_destroy();
// Double check to see if their sessions exists
if(isset($_SESSION['lname'])){
	echo"logout failed";
} else {
	header("location: main.php");
	exit();
}}
?>