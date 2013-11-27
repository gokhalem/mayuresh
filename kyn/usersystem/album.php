<?php
include_once("core.inc.php");
include("check_login.inc.php");
// Make sure the _GET "u" is set, and sanitize it

if(isset($_SESSION['flatno'])){
	$flatno=$_SESSION['flatno'];
	$lname=$_SESSION['lname'];
$mydate=getdate(date("U"));
 $my="$mydate[year]-$mydate[mon]-$mydate[mday]";

} else {
    header("location: main.php");
    exit();	
}

// Check to see if the viewer is the account owner
$isOwner = "no";
if($flatno == $log_id){
	$isOwner = "yes";?>
	<html>
	<head>
	<script type="text/javascript" src="../javascript/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../javascript/swfobject.js"></script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="../js/excanvas/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="../javascript/spinners/spinners.min.js"></script>
<script type="text/javascript" src="../javascript/lightview/lightview.js"></script>

<link rel="stylesheet" type="text/css" href="../css/lightview/lightview.css" />


<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">
form#photo_form{background:#F3FDD0; border:#AFD80E 1px solid; padding:20px;margin:20px ;float:center; color:black;}
div#galleries{}
div#galleries > div{float:left; margin:20px; text-align:center; cursor:pointer; color:black;}
div#galleries > div > div {height:100px; overflow:hidden;}
div#galleries > div > div > img{width:150px; cursor:pointer;}
div#photos{display:none; border:#666 1px solid; padding:20px;}
div#photos > div{float:left; width:125px; height:80px; overflow:hidden; margin:20px;}
div#photos > div > img{width:125px; cursor:pointer;}
div#picbox{display:none; padding-top:36px;}
div#picbox > img{max-width:800px; display:block; margin:0px auto;}
div#picbox > button{ display:block; float:right; font-size:36px; padding:3px 16px;}
</style>
	</head>
	<body>
	<form id="photo_form" enctype="multipart/form-data" method="post" action="uploadgallery.php">
	  <h2>Hi <?php echo $lname ?>, add a new photo into one of your galleries</h2>
<b>Choose Gallery:</b> 
	  <select name="gallery" required>
	    <option value=""></option>
	   <option value="myprofile">PROFILE</option>
	   <option value="gallery">GALLERY</option>
	  </select>
	 <b>Choose Photo:</b> 
	
	 <input type="file" name="photo" accept="image/*" required>
	<b> Describe the photo</b>  <input type="text" name="desc"  placeholder="describe your photo">
	  <p><input type="submit" value="Upload Photo Now"></p>
	</form>
	<?php
	}
	
	$sql="SELECT * FROM gallery where flatno=$flatno AND gallery= '1'";
	$query=mysql_query($sql,$con);
	if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) >=1){
	?>
	<div id='page'>



<div class='demonstrations'>
<?php 	echo "<big> MYPROFILE PICS</big>"."</br>";?>
	<h1>Picture</h1>
<p>My Picture Gallery</p>

	<?php
	while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
 $a= $row['image'] ;
$b=$row['uploaddate'];
$c=$row['infoimg'];

?>

  <a href='<?php echo "../register/user/$lname/myprofile/$a";?>' 
     class='lightview' 
     data-lightview-group='example'
     data-lightview-title='<?php echo "$c";?>'
     data-lightview-caption='<?php echo "$b";?>'>
    <img src='<?php echo "../register/user/$lname/myprofile/$a";?>'alt=''/>
  </a>

	<!--<div id="galleries">  <img src=<?php echo "../register/user/$lname/myprofile/$a";?> width = "150px" height="150px"/></div>-->
	   <?php
} 

?>
	</div>
</div>
	
	
	<?php


	}else{
	echo "no images";
	}
	
	}

/*	$sql="SELECT * FROM gallery where flatno=$flatno AND gallery= '0'";
	$query=mysql_query($sql,$con);
	if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) >=1){
	?>
	<div id='page'>

<?php 	echo "<big> MYGALLERY PICS</big>"."</br>";?>

<div class='demonstrations'>

	<h1>Picture</h1>
<p>My Picture Gallery</p>

	<?php
	while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
 $a= $row['image'] ;
$b=$row['uploaddate'];
$c=$row['infoimg'];

?>

  <a href='<?php echo "../register/user/$lname/gallery/$a";?>' 
     class='lightview' 
     data-lightview-group='example'
     data-lightview-title='<?php echo "$c";?>'
     data-lightview-caption='<?php echo "$b";?>'>
    <img src='<?php echo "../register/user/$lname/gallery/$a";?>'alt=''/>
  </a>

	<!--<div id="galleries">  <img src=<?php echo "../register/user/$lname/gallery/$a";?> width = "150px" height="150px"/></div>-->
	   <?php
} 

?>
	</div>
</div>
	
	
	<?php


	}else{
	echo "no images";
	}
	
	}
	
	*/
	
	
	
	?>
	


<?php

/*

}*/
?>