<?php
include_once("core.inc.php");
include("check_login.inc.php");
$flatno=$_REQUEST['flatno'];
 $lname1=$_SESSION['lname'];
?>
<html>
	<head>
	<link rel="icon" type="image/gif" href="../commonimages/kyn.gif">
	<script type="text/javascript" src="../javascript/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../javascript/swfobject.js"></script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="../js/excanvas/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="../javascript/spinners/spinners.min.js"></script>
<script type="text/javascript" src="../javascript/lightview/lightview.js"></script>

<link rel="stylesheet" type="text/css" href="../css/lightview/lightview.css" />
<link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../css/headlogo.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
 <link rel="stylesheet" type="text/css" href="../css/footerforpeek.css" />
	<style type="text/css">
form#photo_form{background:#28C4DA; border:#AFD80E 1px solid;border-radius:25px;s padding:20px;margin:20px ;float:center; color:black;}
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
#baap{

float: left;
}
#a{
float: left;
padding: 20px;
border: 2px soild black;
}
#b{
float: right;

padding: 20px;
width: 400px;
height: 150px;
}
#pagination{
border:1px solid black;
font: 12px solid black;
margin: 0px 400px ;
}

		#div_chat{	overflow: auto; 
height: 70px; 
width: 400px; 

background-color: #28C4DA; 
border: 1px solid #555555;
border-radius: 6px;
				}
				#hey{
				border: 1px solid #28C4DA;
				background:white;
				}
				#pagination1{
margin: 0px 400px ;
}
				
</style>
<script type="text/javascript">
function init(){
//alert("in init");
var xmlhttp;
if(window.XMLHttpRequest)
{
xmlhttp=new XMLHttpRequest();
}
else
{
xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}
return xmlhttp;
}
  function delete1(id){

var c=id;
var res1 = c.replace(/d-/,"");

var xmlhttp=init();



xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
    var a=xmlhttp.responseText;
    alert(a);  
location.reload();	    
}
}

xmlhttp.open("GET","deletephoto.php?res1="+res1,true);
xmlhttp.send();


}     
     
function comment(id){

var c=id;
var res = c.replace(/d-/,"");

var xmlhttp=init();
var comment=document.getElementById("c-"+res).value;
var lname=document.getElementById("lname").value;


xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{

        var response=xmlhttp.responseText;
if(response){
document.getElementById("c-"+res).value="";
location.reload();	
}
        
}
}

xmlhttp.open("GET","addcomment.php?lname="+lname+"&res="+res+"&comment="+comment,true);
xmlhttp.send();


}      
</script>
	</head>
	<body>
	<div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../commonimages/logo2.png" height="50px"align="left"/>
 
                 
                </div><!-- /.nav-collapse -->
              </div>
<?php
$sql2="SELECT * FROM user where flatno=$flatno";
$query3=mysql_query($sql2,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query3) ==1){
	while($row = mysql_fetch_array($query3, MYSQL_ASSOC)){
	$lname=$row['lname'];
	
	}
	
	
	}}

	$per_page=4;
	$sql1="SELECT * FROM gallery where flatno=$flatno AND gallery1= '0'";
	$pages_perquery=mysql_query($sql1,$con);
	mysql_num_rows($pages_perquery);
	 $pages= ceil(mysql_num_rows($pages_perquery)/$per_page);
	 if(!isset($_GET['page'])){
	 header("location: gallery.php?page=1");
	 }
	 else{
	 $page=$_GET['page'];
	 }
	 $start=(($page-1)*$per_page);
	 
	$sql=$sql1="SELECT * FROM gallery where flatno='$flatno' AND gallery1= '0' LIMIT $start,$per_page";
	$query=mysql_query($sql,$con);?>
	<button type="button" class="btn btn-primary"><a href="album.php?flatno=<?php echo "$flatno"?>& page=1"> Our Profile Pics</a></button>
			<ul id="pagination1" class="pagination">
                
       <?php       
	for ($i=1;$i<=$pages ;$i++){
	if($i==$page){
	?>
  <li class="active">
  <?php  }else{   ?>
	 <li>  <?php  }   ?>
	 <a  href="?flatno=<?php echo "$flatno"?>&page=<?php echo "$i";?>"><?php echo "  $i  ";?></a></li>
	
	<?php
	}
	?>
	</ul>
<?php
	if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) >=1){
	?>
	<div id="hey">
	<div id='page'>



<div class='demonstrations'>
<?php 	echo "<big> MYGALLERY PICS</big>"."</br>";?>
<h2>This page belongs to apt no :<?php 	echo "$flatno"."</br>";?>
	<h1>Picture</h1>
<p>My Picture Gallery</p>

	<?php
	$i=0;
	while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
$num=mysql_num_rows($query);
 $i+=1;
$a= $row['image'] ;
$b=$row['uploaddate'];
$c=$row['infoimg'];

?>
<div id="baap">
<div id="a">
  <a href='<?php echo "../register/user/$lname/gallery/$a";?>' 
     class='lightview' 
     data-lightview-group='example'
     data-lightview-title='<?php echo "$c";?>'
     data-lightview-caption='<?php echo "$b";?>'>
    <img src='<?php echo "../register/user/$lname/gallery/$a";?>'alt=''/>
	
  </a><?php
  $isOwner = "no";
if($flatno == $log_id){
$flatno=$_SESSION['flatno'];
$lname=$_SESSION['lname'];
	$isOwner = "yes";?>
	  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                     
                      <button type="submit" id="d-<?php echo "$a";?>" onclick="javascript:delete1(this.id)"class="btn btn-primary">Delete</button> 
                    </div>
                  </div>
	<?php }?>
  <hr>
</div>
<div id="b">

          WHEN          :     <?php echo "$b";?></br>
      DESCRIBE:<?php echo "$c";?></br>
	 <div id="div_chat">
	<div id="d-<?php echo "$a";?>">
	<?php
	$sql1="SELECT * FROM comment WHERE image='$a'";
	$query1=mysql_query($sql1,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	while($row1 = mysql_fetch_array($query1, MYSQL_ASSOC)){
	
	$z=$row1['lname'];
	$p=$row1['comment'];
	echo "<b>".$z."Says"."</b>"."--".$p."</br>";
	}}
	
	?>
	
	
	</div>
	
	
	</div>
	<textarea name="comment" id="c-<?php echo "$a";?>" cols="50" rows="2" placeholder="ENTER A COMMENT"></textarea>
	 <input type="hidden" id="lname" value='<?php echo "$lname1";?>'>
	 <input type="hidden" id="img" value='<?php echo "$a";?>'>

	 <input type="submit" id="d-<?php echo "$a";?>" onclick="javascript:comment(this.id)" value="COMMENT">
	<div id="mydiv"></div>
	
	<?php
	if($i==$num){
?>
<p>
</br>
</br>
</br>
</br>
</br>
</p>
<?php } ?>
   
<hr>
</div>

</div>

	<!--<div id="galleries">  <img src=<?php echo "../register/user/$lname/gallery/$a";?> width = "150px" height="150px"/></div>-->
	   <?php
} 

?>
	</div>
</div>

	</div>
	<div id="footer" style="margin-top:200px">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>
 
     
 
        </div>
	
	<?php


	}else{
	echo "no images";
	}
	
	}