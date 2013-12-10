<?php
include_once("core.inc.php");
include("check_login.inc.php");

$lname=$_REQUEST['lname'];
$comment=$_REQUEST['comment'];
$image=$_REQUEST['res'];
echo $msglength=strlen($comment);

if($msglength<100 && $msglength !=0){
$sql="INSERT INTO comment( lname,comment,image) VALUES('$lname','$comment','$image')";

$query=mysql_query($sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
echo "posted";}
}
else{
echo "Comment too large";
}


?>