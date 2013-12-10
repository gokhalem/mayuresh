<?php
include_once("core.inc.php");
include("check_login.inc.php");
if(isset($_SESSION['flatno'])){
$lname=$_SESSION['lname'];
$isOwner = "no";
if($flatno == $log_id){
	$isOwner = "yes";
$array=$_SESSION['cart_array'];
foreach ($array as $key => $value) {

$sql="SELECT * FROM products WHERE productid='$value' AND availabel='yes'";
$query=mysql_query($sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) ==0){
echo"OOPS! THE PRODUCT with Product-Id :".$value." IS NO LONGER AVAILABEL..SORRY!";

}
if(mysql_num_rows($query) ==1){

echo "Congratulations!! You get this product with Product-Id :".$value."<br />";
$sql1="UPDATE products SET availabel='no' ,soldto='$lname' WHERE productid='$value'";
$query1=mysql_query($sql1,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	echo "database updated";
	}

}






}




}
}}






?>