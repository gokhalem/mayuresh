<?php
include_once("core.inc.php");
require 'check_login.inc.php';
if(isset($_SESSION['flatno']) && !empty($_SESSION['flatno'])){
$flatno =$_SESSION['flatno'];
$lname=$_SESSION['lname'];
$avatar=$_SESSION['avatar'];
echo "<big>WELCOME  </big>".$_SESSION['lname']."!!!!";
$isOwner = "no";


if($flatno == $log_id ){
	$isOwner = "yes";
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
<script type="text/javascript">
function toggle1(){
	
	//var x = document.getElementById('img-id');
	//alert(x.style.display);
	/* if(x.style.display == 'block'){
		alert("block");
		x.style.display = 'none';
	}else{
		alert("none");
		x.style.display = 'block';
	} */
	if (document.getElementById('img-id').style.display = "block"){
	document.getElementById('img-id').style.display = "none";}

	
}
function toggle2(){
	
	//var x = document.getElementById('img-id');
	//alert(x.style.display);
	/* if(x.style.display == 'block'){
		alert("block");
		x.style.display = 'none';
	}else{
		alert("none");
		x.style.display = 'block';
	} */
	if (document.getElementById('img-id').style.display = "none"){
	document.getElementById('img-id').style.display = "block";}

	
}

</script>
</head>
<body>
<div id="box1">

<?php

  
  
  if($avatar == NULL){
  ?>
  <img title="Change Profile Photo" src="../commonimages/default.jpg" id="img-id" onclick="javascript:toggle1()" style= "display:block"alt="pic">
  <form id="avatar_form" enctype="multipart/form-data" method="post" action="updatephoto.php">
  <h4>Change your avatar</h4>
	 <input type="file" name="avatar" required>
	  <p><input type="submit" value="Upload"></p>
	</form>
<?php
}
else{
 $avatar=$_SESSION['avatar'];
 $profile_pic=$_SESSION['profile'];

  ?>
  <img title="Change Profile Photo" src= '<?php echo "../register/user/$lname/myprofile/$avatar" ?>' id="img-id" onclick="javascript:toggle1()"  style= "display:block"alt="pic">
  <form id="avatar_form" enctype="multipart/form-data" method="post" action="updatephoto.php">
  <h4>Change your avatar</h4>
	 <input type="file" name="avatar" required>
	  <p><input type="submit" value="Upload"></p>
	</form>
<?php
}

?>
</div>









<form action="updateprofile.php" method="GET">




</br></br></br>
WHICH PART OF WORLD ARE YOU FROM?:<input type="text" id="country" name="country"  placeholder ="Country"/></br>
ABOUT YOUR FAMILY:<input type="text" id="ayf" name="ayf"
cols="40" rows="5" style="width:200px; height:50px;" 
name="Text1" id="Text1" value="" placeholder="In few words about your family"></br>
INTRESTS:
<input type="text" id="intrests" name="intrests"
cols="40" rows="5" style="width:200px; height:50px;" 
 value="" placeholder="Your passion"></br>
 NUMBER OF KIDS::<input type="text" id="nok" name="nok"  placeholder ="Number of kids in your family"/></br>
 CONTACT NUMBER:<input type="text" id="cn"name="cn" placeholder ="CONTACT NUMBER"/></br>
 EMAIL::<input type="email" id="em" name="em" placeholder ="You can Email me at?"/></br>
 YOUR PROFESSION::<input type="text" id="prof" name="prof"  placeholder ="What do you do?"/></br>

 YOUR LOVED ONES PROFESSION::<input type="text" id="lprof" name="lprof" placeholder ="partner's profession"/></br>

 PROFESSION OF OTHERS IN FAMILY::<input type="text" id="oprof" name="oprof" placeholder ="Profession of your parents for eg"/></br>

 IN WHICH GRADE IS YOUR KID?::<input type="text" id="gk" name="gk" placeholder ="Grade of your kid"/></br>

 SCHOOL/UNIVERSITY OF KID::<input type="text" id="uk"name="uk"  placeholder ="Name of school/university"/></br>

 
 HOBBIES::<input type="text" id="hb" name="hb" placeholder ="Hobby"/></br></br>
<button type="submit" name="login" id="submit"   class="btn btn-default">UPDATE YOUR PROFILE</button>
</form>




</body>
</html>
<?php

}

}







?>