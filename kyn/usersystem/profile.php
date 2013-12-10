<?php
include_once("core.inc.php");
include_once("header.php");

require 'check_login.inc.php';
if(isset($_SESSION['flatno']) && !empty($_SESSION['flatno'])){
$flatno =$_SESSION['flatno'];
$lname=$_SESSION['lname'];
$sql="SELECT * FROM user WHERE flatno='$flatno'";
$query=mysql_query($sql,$con);


while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{

 $avatar=$row['avatar'];
 }


  





echo "<h3><big>WELCOME  </big>".$_SESSION['lname']."!!!!</h3>";
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
#h1{
float:left;
width:1024px;
}
#box1{
float:left;
width:200px;
}
#h{
float:right;
width:774px;
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
<div id="h1">
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
<div id="h">
<div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-10">
            <div class="page-header">
              <h1 id="forms">UPDATE YOUR PROFILE</h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-14">
            <div class="well">
              <form class="bs-example form-horizontal" action="updateprofile.php" method="GET">
                <fieldset>
                  <legend>Update Profile</legend>
		
				  
				   <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">WHERE ARE YOU FROM?:</label>
                    <div class="col-lg-8">
                      <input type="text" class="form-control"id="country" name="country"  placeholder ="Country"/>

                    </div>
                  </div>
				  
				  <div class="form-group">
                    <label for="textArea" class="col-lg-4 control-label">ABOUT YOUR FAMILY:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" id="ayf" name="ayf"rows="3" placeholder="TELL US ABOUT YOUR FAMILY"></textarea>
             
                    </div>
					
					
					
                  </div>
				  
				  
                

				  
				  
				  <div class="form-group">
                    <label for="textArea" class="col-lg-4 control-label"> INTERESTS:</label>
                    <div class="col-lg-8">
                      <textarea class="form-control" id="intrests" name="intrests"rows="3" placeholder="Your Passion"></textarea>
             
                    </div>
					
					
					
                  </div>
                
				
				  
				  <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">NUMBER OF KIDS:</label>
                    <div class="col-lg-8">
                      <input type="text" id="nok" name="nok"  placeholder ="Number of kids in your family"/>

                    </div>
                  </div>
				  
              	  
					  <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">CONTACT NUMBER:</label>
                    <div class="col-lg-8">
                         <input type="text" id="cn"name="cn" placeholder ="CONTACT NUMBER"/>
				 </div>
                  </div>
			
	
					  <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">EMAIL::</label>
                    <div class="col-lg-8">
                         <input type="email" id="em" name="em" placeholder ="You can Email me at?"/>
				 </div>
                  </div>
  
   <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">YOUR PROFESSION::</label>
                    <div class="col-lg-8">
                          <input type="text" id="prof" name="prof"  placeholder ="What do you do?"/>
				 </div>
                  </div>
				  
				  
   <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">YOUR LOVED ONES PROFESSION::</label>
                    <div class="col-lg-8">
                       <input type="text" id="lprof" name="lprof" placeholder ="partner's profession"/>
				 </div>
                  </div>
  <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">PROFESSION OF OTHERS IN FAMILY::</label>
                    <div class="col-lg-8">
                       <input type="text" id="oprof" name="oprof" placeholder ="Profession of your parents for eg"/>
				 </div>
                  </div>
				  
   <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">IN WHICH GRADE IS YOUR KID?::</label>
                    <div class="col-lg-8">
                       <input type="text" id="gk" name="gk" placeholder ="Grade of your kid"/>
				 </div>
                  </div>
				  
      <div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">SCHOOL/UNIVERSITY OF KID::</label>
                    <div class="col-lg-8">
                        <input type="text" id="uk"name="uk"  placeholder ="Name of school/university"/>
				 </div>
                  </div>
 

<div class="form-group">
                    <label for="inputEmail" class="col-lg-4 control-label">HOBBIES::</label>
                    <div class="col-lg-8">
                        <input type="text" id="hb" name="hb" placeholder ="Hobby"/>
				 </div>
                  </div>
   <br /><br />
					 
					 
					 
					 <div class="form-group">
					 
					<div class="col-sm-offset-4 col-sm-15">
     <button type="submit" name="login" id="submit"   class="btn btn-default">UPDATE YOUR PROFILE</button>
    </div>
  </div>
 
  
                    
                  </div>
				  </div>
				  </div>
				  </div>
				  </div>
				 </div>







<form >




</br></br></br>
</br>
 


 
 
 


 



 

</br>

 

</form>




</body>
</html>
<?php

}

}







?>