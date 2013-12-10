<?php
include_once("core.inc.php");
require 'check_login.inc.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

$flatno=$_REQUEST['flatno'];
 $sql="DELETE FROM user WHERE flatno='$flatno'";
 $queryy=mysql_query($sql,$con);
if(mysql_error()){
echo mysql_error();
}else{

echo "**DELETED USER ";
}
}
