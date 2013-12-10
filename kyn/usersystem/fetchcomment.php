	<?php
	include_once("core.inc.php");
include_once("check_login.inc.php");
include_once("error.php");
if($_SESSION['flatno']== $log_id){
$flatno=$_SESSION['flatno'];
	echo $a=$_REQUEST['a'];
	
	
	$sql1="SELECT * FROM comment WHERE image='$a'";
	$query1=mysql_query($sql1,$con);

	
	$response='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$response .='<response>';
if(mysql_num_rows($query1)==0){
	
	}else{
	while($row1 = mysql_fetch_array($query, MYSQL_ASSOC)){
$z=$row1['lname'];
$p=$row1['comment'];


 $temp = '<lname>'.$z ."-says  :".'</lname>'.
			'<msg>'.$p  .'</msg>'.'<br />';
 $response.=$temp;
}
	mysql_close();
	}
	
$response .='</response>';
echo $response;
	}?>
	