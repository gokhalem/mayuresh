<?php

include_once("core.inc.php");
include_once("check_login.inc.php");
$req=$_REQUEST['req'];
 $seat=$_REQUEST['seat'];
$flatno=$_SESSION['flatno'];
				if($_SESSION['flatno']== $log_id){
				if(isset ($_REQUEST['req'])){
				$del= "SELECT regno from carpool WHERE flatno='$flatno' AND regno='$req'";
$quer=mysql_query($del,$con);
if(mysql_error()){
echo mysql_error();
}else{
if(mysql_num_rows($quer)==1){
		$up="UPDATE carpool SET cap='$seat' WHERE regno='$req'";
$querk=mysql_query($up,$con);		
		if(mysql_error()){
echo mysql_error();
}else{
echo "UPDATED YOUR REQUEST: available seats now  are  :".$seat;

}
		
		}
		else
		{
		echo "OOPS!!CHECK YOUR REQUEST NUMBER";

		}
		}
				
				
				
				}}