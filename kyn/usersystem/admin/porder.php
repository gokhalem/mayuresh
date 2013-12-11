<?php
include_once("core.inc.php");
include("check_login.inc.php");
if(isset($_SESSION['flatno'])){
$lname=$_SESSION['lname'];
$isOwner = "no";?>
 <!DOCTYPE html>
<html>
<head>
<title> Know Your Neighbours</title>
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	




<link rel="icon" type="image/gif" href="../../commonimages/kyn.gif">
 <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="../../css/headlogo.css" />
 <link rel="stylesheet" type="text/css" href="../../css/footerforpeek.css" />
	<script type="text/javascript" src="../../javascript/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../../javascript/swfobject.js"></script>

<script type="text/javascript" src="../../javascript/spinners/spinners.min.js"></script>
<script type="text/javascript" src="../../javascript/lightview/lightview.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/lightview/lightview.css" />


<link rel="stylesheet" type="text/css" href="css/style.css" />
 <style type="text/css">
form#product{background:#F3FDD0; border:#AFD80E 1px solid; padding:20px;margin:20px ;float:center; color:black;}
form#del{background:#F3FDD0; border:#AFD80E 1px solid; padding:20px;margin:20px ;float:center; color:black;}
form#search{background:#F3FDD0; border:#AFD80E 1px solid; padding:20px;margin:20px ;float:center; color:black;}
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
border: 2px soild b;
color:blue;
}
#b{
float: right;

padding: 20px;
width: 400px;
height: 250px;
}
 
#hey{
				border: 1px solid #28C4DA;
				background:white;
				height:40px;
				width:1250px;
				
				}

</style>
 </head>
 <body>
 <div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../../commonimages/logo2.png" height="50px"align="left"/>
 
                 
                </div><!-- /.nav-collapse -->
              </div>
			   <button class="btn btn-primary"><a href="inventory.php">GO BACK TO Inventory</a></button> 
			   <div id="hey"></div>
<?php
if($flatno == $log_id){
	$isOwner = "yes";
$array=$_SESSION['cart_array'];
foreach ($array as $key => $value) {

$sql="SELECT * FROM products WHERE productid='$value' AND availabel='yes'";
$query=mysql_query($sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) ==0){
	?>
	<h1>OOPS! THE PRODUCT with Product-Id :<?php echo"$value"?> IS NO LONGER AVAILABEL..SORRY!<h1><br>
<?php
}
if(mysql_num_rows($query) ==1){?>

<h1> Congratulations!! You get this product with Product-Id :<?php echo"$value"?>"</h1><br>
<?php
$sql1="UPDATE products SET availabel='no' ,soldto='$lname' WHERE productid='$value'";
$query1=mysql_query($sql1,$con);
if(mysql_error()){
	echo mysql_error();
	}else{?>
<h1>Database updated</h1>
<?php
	}

}






}




}
}
?>
<div id="footer" style="margin-top:200px">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="../main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="../logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>




<?php }






?>