<?php
include_once("core.inc.php");
include_once("check_login.inc.php");
include_once("error.php");
if($_SESSION['flatno']== $log_id){
$flatno=$_SESSION['flatno'];
$lname=$_SESSION['lname'];


$sql="SELECT * FROM CHAT  ORDER BY msgid ASC";

 
	

 

$query=mysql_query($sql,$con);
if(mysql_error()){
	echo mysql_error();
	}
$response='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$response .='<response>';
if(mysql_num_rows($query)==0){
	echo "No one is talking today....post somthin to get people talking";
	}else{
	while($row = mysql_fetch_array($query, MYSQL_ASSOC)){
$id=$row['msgid'];
$datetime=$row['datetime'];
$lname=$row['lname'];
 $msg=$row['msg'];
 $temp = '<lname>'.'<strong>'.$lname. '<strong>'."-says  :".'</lname>'.
			'<msg>'.$msg   .'</msg>'.'<br />';
 $response.=$temp;
}
	mysql_close();
	}
	
$response .='</response>';
echo $response;
}
