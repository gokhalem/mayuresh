<?php
include_once("core.inc.php");

?>
<html>
<head>
<style type="text/css">
#box1{border:#999 2px solid; width:200px; height:200px;}
#box1 > img{position:absolute; z-index:2000; width:200px; max-height:200px;}
#box1 > a {
	display: none;
	position:absolute;
	margin:90px 0px 0px 120px; /* margin:top right btm left; */
	z-index:3000;
	background: #F0F0F0;
	border:#666 1px solid;
	border-radius:3px;
	padding:5px;
	font-size:12px;
	text-decoration:none;
	color:#333;
}
#box1:hover a {
   display: block;
}
</style>
</head>
<body>
<div id="box1">
<?php
$avatar=$_SESSION['avatar'];
$lname=$_SESSION['lname'];
  $_SESSION['flatno'];
 

  if($avatar == NULL){
  ?>
  <img title="Change Profile Photo" src="../commonimages/default.jpg" id="img-id" style= "display:block"alt="pic">
  
<?php
}
else{
 $avatar=$_SESSION['avatar'];
 $profile_pic=$_SESSION['profile'];

  ?>
  <img title="Change Profile Photo" src= '<?php echo "../register/user/$lname/myprofile/$avatar" ?>'  id="img-id"  style= "display:block"alt="pic"/>


<?php
}
?>
</div>


</body>
</html>
<?php
echo $_SESSION['country'];
 echo $_SESSION['ayf'];
 echo $_SESSION['intrest'];
 echo $_SESSION['nok'];
 echo $_SESSION['cn'];
 echo$_SESSION['em'];
 echo$_SESSION['prof'];
 echo$_SESSION['lprof'];
 echo$_SESSION['oprof'];
  echo$_SESSION['gk'];
  echo$_SESSION['uk'];
  echo$_SESSION['hobby'];

?>


















