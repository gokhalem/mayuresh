    <?php

include_once("core.inc.php");
include_once("check_login.inc.php");
		if(isset ($_REQUEST['date1'])&& isset ($_REQUEST['loc'])){
			$loc=$_REQUEST['loc'];
			 $date=$_REQUEST['date'];
			$sql2="SELECT * from carpool WHERE date='$date' AND location='$loc';";
$queryy=mysql_query($sql2,$con);

if(mysql_error()){
echo mysql_error();
}else{

	
	if(mysql_num_rows($queryy)==0){

		 echo "SORRY Nobody Offering any car pool on this date!!";  	
		}
		
	
		if(mysql_num_rows($queryy)> 0){
		$row = mysql_fetch_array($queryy, MYSQL_ASSOC)
$_SESSION['row']=$row;
}}
?>