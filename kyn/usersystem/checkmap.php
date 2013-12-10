<?php
include_once("core.inc.php");
include_once("check_login.inc.php");
if($_SESSION['flatno']== $log_id){

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
$b= $row['location'];
}
echo trim($b);
}
}
?>