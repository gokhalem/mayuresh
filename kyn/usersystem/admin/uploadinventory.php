<?php
include_once("core.inc.php");
include("check_login.inc.php");

$gallery=$_REQUEST['gallery'];
$owner=$_REQUEST['owner'];
 $flatno=$_REQUEST['flatno'];
 echo $cn=$_REQUEST['cn'];
  $cat=$_REQUEST['cat'];
  $rtd=$_REQUEST['rtd'];

 $descr=$_REQUEST['desc'];


 $mydate=getdate(date("U"));
 $my="$mydate[year]-$mydate[mon]-$mydate[mday]";
 if($_SESSION['id']== $log_id){

if (isset($_FILES["photo"]["name"]) && $_FILES["photo"]["tmp_name"] != ""){
 $fileName = $_FILES["photo"]["name"];
    $fileTmpLoc = $_FILES["photo"]["tmp_name"];
 
	$fileType = $_FILES["photo"]["type"];
	$fileSize = $_FILES["photo"]["size"];
	$fileErrorMsg = $_FILES["photo"]["error"];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);

echo list($width, $height) = getimagesize($fileTmpLoc);
	if($width < 10 || $height < 10){
		header("location: message.php?msg=ERROR: That image has no dimensions");
        exit();	
	}
	$db_file_name = date("DMjGisY").".".$fileExt;
	if($fileSize > (1048576 * 2)) {
		header("location: message.php?msg=ERROR:size exceeds 2mb");
		exit();	
	} else if (!preg_match("/\.(gif|jpg|png)$/i", $fileName) ) {
	
	
	
	header("location: message.php?msg=ERROR: filetype can be either jpg,gif or png");
		exit();
	} else if ($fileErrorMsg == 1) {
		header("location: message.php?msg=ERROR: An unknown error occurred");
		exit();
	}
$moveResult = move_uploaded_file($fileTmpLoc, "../../register/admin/products/$db_file_name");
	if ($moveResult != true) {
		header("location: message.php?msg=ERROR: File upload failed");
		exit();
	}
	include_once("image_resize.php");
	$wmax = 800;
	$hmax = 600;
	if($width > $wmax || $height > $hmax){
		$target_file = "../../register/admin/products/$db_file_name";
	    $resized_file = "../../register/admin/products/$db_file_name";
		img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
	}
	
	$sql = "INSERT INTO products(date,owner,flatno,contactno,category,rtd,descr,image,availabel) VALUES ('$my','$owner','$flatno','$cn','$cat','$rtd','$descr','$db_file_name','yes')";
	$query = mysql_query( $sql,$con);
	if(mysql_error()){
	echo mysql_error();
	}else{
	
	header("location: inventory.php");
}}}
else{

header("location: message.php?msg=ERROR: you do not have this right");
exit();
}

?>