<?php
include_once("core.inc.php");
include_once("check_login.inc.php");
if($_SESSION['flatno']== $log_id){
  $flatno=$_SESSION['flatno'];
 $lname=$_SESSION['lname'];
  $seats=$_REQUEST['seats'];
  $req=$_REQUEST['req'];
 
 $sql="SELECT * FROM carpool WHERE regno='$req' ";
 $query=mysql_query($sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) ==0){
echo"OOPS! REQUEST INVALID ,PLEASE RE-ENTER";

}
if(mysql_num_rows($query) ==1){
$row = mysql_fetch_array($query, MYSQL_ASSOC);
$a= $row['regno'] ;
 $o=$row['cap'];
 $e=$row['cap'];
 $seats;
if($e>=$seats){
$e=$e-$seats;
$sql1="UPDATE carpool SET cap='$e' WHERE regno='$req' ";
$query1=mysql_query($sql1,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	$sql2="INSERT INTO lifttakers
	(regno,flatno,lname,seatstaken,cap) VALUES('$req','$flatno','$lname','$seats','$o')";
	$query2=mysql_query($sql2,$con);
	if(mysql_error()){
	echo mysql_error();
	}else{
echo"You are ALL SET!!SUCCESS....Your booking entry  is recorded with us ENJOY UR TRIP!!";
}
}

}else{

echo"Sorry seats not enough";
}

 
 
}
}
}
?>