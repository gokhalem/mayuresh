<?php
include_once("core.inc.php");
include("check_login.inc.php");

 $prodid=$_REQUEST['pid'];
if($_SESSION['id']== $log_id){
$sql="DELETE FROM products WHERE productid='$prodid'";
$query = mysql_query( $sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{

	header("location: inventory.php?msge=deleted sucessfully");
}}
else{

header("location: message.php?msg=ERROR: some problem in ownership");
exit();
}

?>