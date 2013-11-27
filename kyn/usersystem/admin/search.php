<?php
include_once("core.inc.php");
include("check_login.inc.php");

 $prodid=$_REQUEST['pid'];
if($_SESSION['id']== $log_id){
$sql="SELECT * FROM products WHERE productid='$prodid'";
$query = mysql_query( $sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	?>
	<html>
	<head>
	<style type="text/css">
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
</style>
	</head>
	<body>

<?php 	echo "<big> INVENTORY </big>"."</br>";?>
	<h1>PRODUCTS</h1>
 <hr>

	<?php
	if(mysql_num_rows($query) == 0){
	echo "PRODUCT NOT IN THE INVENTORY";
	}
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

 </body>
 </html>
	<!--<div id="galleries">  <img src= width = "150px" height="150px"/></div>-->
	   <?php
} 



	
}}
else{

header("location: message.php?msg=ERROR: some problem in ownership");
exit();
}

?>