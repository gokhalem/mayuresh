<?php

include_once("core.inc.php");
include_once("check_login.inc.php");
$req=$_REQUEST['req'];
$flatno=$_SESSION['flatno'];
				if($_SESSION['flatno']== $log_id){
				if(isset ($_REQUEST['req'])){
			
			
			$del= "SELECT regno from carpool WHERE flatno='$flatno' AND regno='$req'";
$quer=mysql_query($del,$con);
if(mysql_error()){
echo mysql_error();
}else{
if(mysql_num_rows($quer)==1){
		$del1="DELETE FROM carpool WHERE flatno='$flatno' AND regno='$req'";
$querk=mysql_query($del1,$con);		
		if(mysql_error()){
echo mysql_error();
}else{
echo "Deleted Your Request";

}
		
		}
		else
		{
		echo "OOPS!!CHECK YOUR REQUEST NUMBER";

		}
		}}	}
			?>
			







