<?php
include_once("core.inc.php");
include("check_login.inc.php");
if(isset($_SESSION['flatno'])){
$isOwner = "no";
if($flatno == $log_id){
	$isOwner = "yes";



	$flatno=$_SESSION['flatno'];
echo "WELCOME".	$lname=$_SESSION['lname'];
echo $scart=$_REQUEST['pid'];


if(!isset ($_SESSION['cart_array']) || count($_SESSION['cart_array'])<1){
$_SESSION['cart_array']=array($scart);



}
else{
$found=0;

foreach ($_SESSION['cart_array'] as $key => $value) { 

if($scart==$value){

$found=1;
echo "SORRY YOU CANNOT ADD THAT ITEM AGAIN ITS ALREADY IN THE CART";
}else{
array_push($_SESSION['cart_array'],$scart);
print_r($_SESSION['cart_array']);
}
}
} 
}
}
else {
    header("location: ../main.php");
    exit();	
}

?>