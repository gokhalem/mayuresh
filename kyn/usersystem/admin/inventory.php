<?php
include_once("core.inc.php");
include("check_login.inc.php");
// Make sure the _GET "u" is set, and sanitize it
$flatno= $_SESSION['flatno'];
$lname2=$_SESSION['lname'];
if(isset($_SESSION['id'])){
	$id=$_SESSION['id'];
	




// Check to see if the viewer is the account owner
$isOwner = "no";

if($id == $log_id){

	$isOwner = "yes";
	$mydate=getdate(date("U"));
 $my="$mydate[year]-$mydate[mon]-$mydate[mday]";
 ?>
 
	<html>
	<head>
	<script type="text/javascript" src="../../javascript/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="../../javascript/swfobject.js"></script>
<!--[if lt IE 9]>
  <script type="text/javascript" src="../js/excanvas/excanvas.js"></script>
<![endif]-->
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
border: 2px soild black;
}
#b{
float: right;

padding: 20px;
width: 400px;
height: 200px;
}
#pagination{
border:1px solid black;
font: 12px solid black;
margin: 0px 400px ;
}
</style>
	</head>
	<body>
	<form id="product" enctype="multipart/form-data" method="post" action="uploadinventory.php">
	  <h2>Hi ADMIN upload products in TRASH TO TREASURE </h2>
	  
<b>Choose Gallery:</b> 
	  <select name=" INVENTORY GALLERY" required>
	    <option value=""></option>
	
	   <option value="gallery">PRODUCT</option>
	  </select>
	 <b>Choose product:</b> 
	
	 <input type="file" name="photo" accept="image/*" required></br>
	 <b> OWNER:</b>  <input type="text" name="owner" id="owner" placeholder="owner who discarded the product"required></br>
	  <b> FLAT NO:</b>  <input type="text" name="flatno" id="flatno"  placeholder="describe the product"required></br>
	  <b> CONTACT NO:</b>  <input type="text" name="cn" id="cn" placeholder="contact number of the owner"required></br>
	  <b> CATEGORY:</b>  <input type="text" name="cat" id="cat" placeholder="category of product"required></br>
	  <b> REASON TO DISCARD:</b>  <input type="text" name="rtd" id="rtd" placeholder="reason to discard"required></br>
	<b> Describe the product:</b>  <input type="text" id="desc" name="desc"
cols="40" rows="5" style="width:200px; height:50px;" 
 value="" placeholder="description"required></br>
	
	  <p><input type="submit" value="Upload PRODUCT Now"></p>
	</form>
	
	<form id="del" action="delete.php" method="get">
	PRODUCT-ID:<input type="text" name="pid" id="pid" placeholder="id of product to be deleted"></br>
	 <p><input type="submit" value="DELETE "></p>
	</form>
	<?php
	echo $_REQUEST['msge'];
	?>
	<form id="search" action="search.php" method="get">
	PRODUCT-ID:<input type="text" name="pid" id="pid" placeholder="id of product to be SEARCHED"></br>
	 <p><input type="submit" value="SEARCH"></p>
	</form>
	
	</head>
	</body>
	<?php
	}?>
	<?php
	$per_page=4;
	$sql1="SELECT * FROM products WHERE availabel='yes'";
	$pages_perquery=mysql_query($sql1,$con);
	 mysql_num_rows($pages_perquery);
	 $pages= ceil(mysql_num_rows($pages_perquery)/$per_page);
	 if(!isset($_GET['page'])){
	 header("location: inventory.php?page=1");
	 }
	 else{
	 $page=$_GET['page'];
	 }
	 $start=(($page-1)*$per_page);
	 
	$sql="SELECT * FROM products WHERE availabel='yes' LIMIT $start,$per_page";
	$query=mysql_query($sql,$con);?>
		<div id="pagination">
		<?php
	for ($i=1;$i<=$pages ;$i++){?>

	 <a  href="?page=<?php echo "$i";?>"><?php echo "$i";?></a>
	
	<?php
	}?>
	</div>
	<?php
	if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) >=1){
	
	?>
	 
	<div id='page'>



<div class='demonstrations'>
<?php 	echo "<big> INVENTORY </big>"."</br>";?>
	<h1>PRODUCTS</h1>
 <hr>

	<?php
	while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
 $a=$row['productid'];
 $b= $row['date'] ;
$c=$row['owner'];
$d=$row['flatno'];
$e=$row['contactno'];
 $f= $row['category'] ;
$g=$row['rtd'];
$h=$row['descr'];
$i=$row['image'];
$j=$row['availabel'];


?>
 
<div id="baap">
<div id="a">
  <a href='<?php echo "../../register/admin/products/$i";?>' 
     class='lightview' 
     data-lightview-group='example'
     data-lightview-title=  <?php echo "Product-id:"."$a"?>
     data-lightview-caption='<?php echo "$h";?>'>
    <img src='<?php echo "../../register/admin/products/$i";?>'alt=''/>
	  <hr>
	  Click me to see
  </a>
  </div>
  <div id="b">
 PRODUCT-ID:<?php echo "$a";?></br>
       DATE:<?php echo "$b";?></br>
      OWNER:<?php echo "$c";?></br>
     FLATNO:<?php echo "$d";?></br>
	 CONTACTNO:<?php echo "$e";?></br>
	 CATEGORY:<?php echo "$f";?></br>
	 Reason to Discard:<?php echo "$g";?></br>
	Description:<?php echo "$h";?></br>
	Available:<?php echo "$j";?></br>
	 <hr>

  </div>

 </div>

 
	<!--<div id="galleries">  <img src= width = "150px" height="150px"/></div>-->
	   <?php
} 


?>
	</div>
</div>
	
	
	<?php


	}else{
	echo "no products in inventory";
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

	} else {?>
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
<!--[if lt IE 9]>
  <script type="text/javascript" src="../js/excanvas/excanvas.js"></script>
<![endif]-->
<script type="text/javascript" src="../../javascript/spinners/spinners.min.js"></script>
<script type="text/javascript" src="../../javascript/lightview/lightview.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/lightview/lightview.css" />


<link rel="stylesheet" type="text/css" href="css/style.css" />
	<style type="text/css">

form#search{background:#28C4DA; border:#AFD80E 1px solid;border-radius:25px; padding:40px;margin:20px ;float:center; color:black;}
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
height: 250px;
}
#pagination{
border:1px solid black;
font: 12px solid black;
margin: 0px 400px ;
}
#pagination1{
margin: 0px 400px ;
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
			  
			  <h1 style="margin-left:350px;">WELCOME <?php echo "$lname2"?> family! Happy Shopping!!</h1>
<form id="search" action="search.php" method="get">
	<b>PRODUCT-ID:</b><input type="text" name="pid" id="pid" placeholder="id of product to be SEARCHED"></br>

	   <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-0">
                  
                      <button type="submit" class="btn  btn-default">SEARCH</button> 
                    </div>
                  </div>
	</form>
	
	<?php
	$per_page=4;
	$sql1=$sql1="SELECT * FROM products WHERE availabel='yes'";
	$pages_perquery=mysql_query($sql1,$con);
	 mysql_num_rows($pages_perquery);
	 $pages= ceil(mysql_num_rows($pages_perquery)/$per_page);
	 if(!isset($_GET['page'])){
	 header("location: inventory.php?page=1");
	 }
	 else{
	 $page=$_GET['page'];
	 }
	 $start=(($page-1)*$per_page);
	 
	$sql=$sql1="SELECT * FROM products WHERE availabel='yes' LIMIT $start,$per_page";
	$query=mysql_query($sql,$con);?>
	<div id="hey">
	<h1 style="font:20px solid black; color:black; margin-left:350px;">
	Happy Shopping!!
	</h1>
	</div>
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
	$k=0;
	?>
	 
	<div id='page'>



<div class='demonstrations'>
<?php 	echo "<big> INVENTORY </big>"."</br>";?>
	<h1>PRODUCTS</h1>
 <hr>

	<?php
	
	while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
 $num=mysql_num_rows($query);
 $k=$k+1;
 $a=$row['productid'];
 $b= $row['date'] ;
$c=$row['owner'];
$d=$row['flatno'];
$e=$row['contactno'];
 $f= $row['category'] ;
$g=$row['rtd'];
$h=$row['descr'];
$i=$row['image'];
$j=$row['availabel'];


?>
 
<div id="baap">
<div id="a">
  <a href='<?php echo "../../register/admin/products/$i";?>' 
     class='lightview' 
     data-lightview-group='example'
     data-lightview-title=  <?php echo "Product-id:"."$a"?>
     data-lightview-caption='<?php echo "$h";?>'>
    <img src='<?php echo "../../register/admin/products/$i";?>'alt=''/>
	  <hr>
	  Click me to see
  </a>
  </div>
  <div id="b">
 PRODUCT-ID:<?php echo "$a";?></br>
       DATE:<?php echo "$b";?></br>
      OWNER:<?php echo "$c";?></br>
     FLATNO:<?php echo "$d";?></br>
	 CONTACTNO:<?php echo "$e";?></br>
	 CATEGORY:<?php echo "$f";?></br>
	 Reason to Discard:<?php echo "$g";?></br>
	Description:<?php echo "$h";?></br>
	Available:<?php echo "$j";?></br>
	<form id="shop" action="scart.php" method="get">

<input type="hidden" name="pid" id="pid" value='<?php echo "$a";?>'>
<input type="hidden" name="OpFlag" id="OpFlag" value="A">
<img src="../../commonimages/small.png"/>
	 <input type="submit" value="Add to Cart">
	 
	</form>
	
		<?php
	if($k==$num){
?>
<p>
</br>
</br>
</br>
</br>
</br>
</p>
<?php } ?>
	

  </div>

 </div>

 
	<!--<div id="galleries">  <img src= width = "150px" height="150px"/></div>-->
	   <?php
} 


?>
	</div>
</div>
	<div id="footer" style="margin-top:200px">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="../main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="../logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>
 
     
 
        </div>
	
	<?php


	}else{
	echo "no products in inventory";
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
	
	
	

}
/*

}*/
?>