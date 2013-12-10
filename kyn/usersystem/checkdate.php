<?php
include_once("core.inc.php");
include_once("check_login.inc.php");
$flatno=$_SESSION['flatno'];
$lname=$_SESSION['lname'];
$mydate=getdate(date("U"));

 $my="$mydate[mon]/$mydate[mday]/$mydate[year]";
 $captcha=$_REQUEST['captcha'];


 







if( strtotime($captcha)>strtotime($my) ){
echo "ok";
}
else{
echo "nok";
}

?>