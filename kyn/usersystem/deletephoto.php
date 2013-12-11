<?php
include_once("core.inc.php");
include("check_login.inc.php");


 $photo=$_REQUEST['res1'];
$sql=" DELETE FROM gallery WHERE image='$photo'";
$query=mysql_query($sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
echo "Deleted Sucessfully";}
?>