<?php
include_once("core.inc.php");
 $id= $_SESSION['id'];
if($_SESSION['id']== $log_id){

if (isset($_FILES["avatar"]["name"]) && $_FILES["avatar"]["tmp_name"] != ""){
 $fileName = $_FILES["avatar"]["name"];
    $fileTmpLoc = $_FILES["avatar"]["tmp_name"];
 
	$fileType = $_FILES["avatar"]["type"];
	$fileSize = $_FILES["avatar"]["size"];
	$fileErrorMsg = $_FILES["avatar"]["error"];
	$kaboom = explode(".", $fileName);
	$fileExt = end($kaboom);

echo list($width, $height) = getimagesize($fileTmpLoc);
	if($width < 10 || $height < 10){
		header("location: message.php?msg=ERROR: That image has no dimensions");
        exit();	
	}
	$db_file_name = "profile_pic".".".$fileExt;
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
	$sql = "SELECT avatar FROM admin WHERE id='$log_id' LIMIT 1";
	$query = mysql_query($sql,$con);
	$row = mysql_fetch_row($query);
	$avatar = $row[0];
	if($avatar != ""){
		$picurl = "../register/admin/avatar/$avatar"; 
	    if (file_exists($picurl)) { unlink($picurl); }
	}
	$moveResult = move_uploaded_file($fileTmpLoc, "../../register/admin/avatar/$db_file_name");
	if ($moveResult != true) {
		header("location: message.php?msg=ERROR: File upload failed");
		exit();
	}
	
	include_once("image_resize.php");
	$target_file = "../../register/admin/avatar/$db_file_name";
	$resized_file = "../../register/admin/avatar/$db_file_name";
	$wmax = 300;
	$hmax = 300;
	img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
	$sql = "UPDATE admin SET avatar='$db_file_name' WHERE id='$log_id' LIMIT 1";
	$query = mysql_query( $sql , $con);
	$sql = "SELECT avatar FROM admin WHERE id='$log_id' LIMIT 1";
	$query = mysql_query($sql,$con);
	$row = mysql_fetch_row($query);
	$avatar = $row[0];
	$_SESSION['avatar']=$avatar;
	$_SESSION['profile']=$db_file_name;
	mysql_close($con);
	header("location: main1.php");
	exit();







}else{
echo "you do not have this right";
}
}
