<?php
include_once("core.inc.php");
include_once("check_login.inc.php");
include_once("error.php");
if($_SESSION['flatno']== $log_id){
$flatno=$_SESSION['flatno'];
$lname=$_SESSION['lname'];
$msg=$_REQUEST['ghe'];

function close(){
mysql_close();

}
function deleteall(){

$sql="TRUNCATE TABLE chat ";
 $query=mysql_query($sql,$con);
 if(mysql_error()){
	echo mysql_error();
	}
}

$sql1="INSERT INTO chat (datetime,user,msg,lname) VALUES ( now(),'$flatno','$msg','$lname')";
$queryy=mysql_query($sql1,$con);
 if(mysql_error()){
	echo mysql_error();
	}
	echo "success";

}
/*function getmessage($id1=0){
$id=$id1;
if($id>0){

$sql="SELECT * FROM CHAT WHERE msgid > '$id' ORDER BY msgid ASC";

 
	}
}else{
$sql="SELECT * FROM CHAT  ORDER BY msgid DESC LIMIT 50";

 if(mysql_error()){
	echo mysql_error();
	}
}
$query=mysql_query($sql,$con);
$response='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$response .='<response>';

$response .='</response>';
return $response;
}*/







?>