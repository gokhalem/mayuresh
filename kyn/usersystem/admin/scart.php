<?php
include_once("core.inc.php");
include("check_login.inc.php");
if(isset($_SESSION['flatno'])){
$isOwner = "no";
if($flatno == $log_id){
	$isOwner = "yes";?>
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
border: 2px soild b;
color:blue;
}
#b{
float: right;

padding: 20px;
width: 400px;
height: 250px;
}
 


</style>
 </head>
 <body>
	<?php




	$flatno=$_SESSION['flatno'];
echo "WELCOME".	$lname=$_SESSION['lname'];
echo $scart=$_REQUEST['pid'];
echo $opFlag=$_REQUEST['OpFlag'];?>
<a href="inventory.php">GO BACK TO Inventory</a><?PHP
if($opFlag == "A"){
	if(!isset ($_SESSION['cart_array']) || count($_SESSION['cart_array'])<1){
	if(isset ($_REQUEST['pid'])){
	$_SESSION['cart_array']=array($scart);

	}

	}
	else{
	$found=0;
	?>

	<?php
	foreach ($_SESSION['cart_array'] as $key => $value) { 

	if($scart==$value){

	$found=1;
	echo "SORRY YOU CANNOT ADD THAT ITEM AGAIN ITS ALREADY IN THE CART";
	}}
	$ok=no;
	if($found==0){
	echo $found;
	array_push($_SESSION['cart_array'],$scart);
	$ok=yes;
	}

	} 
}else if($opFlag == "R"){
if(count($_SESSION['cart_array'])==0 ){
	echo" go back sir";?>
	<a href="inventory.php">Inventory</a>
	<?php

exit();


	}
	if(count($_SESSION['cart_array'])==1 ){
	unset ($_SESSION['cart_array']);
	echo"oops!! YOU EMPTIED YOUR CART NO PRODUCTS IN YOUR CART";




	}else{
	echo $scart;
	 $_SESSION['cart_array'] = array_diff($_SESSION['cart_array'], array($scart));
	print_r ($_SESSION['cart_array']);

	echo "Item removed refresh the page to see the change";
	}
}
print_r($_SESSION['cart_array']);?>
<div id='page'>



<div class='demonstrations'>
<?php
if( empty($_SESSION['cart_array'])){
echo"Go shop,you dont have any items here";
}else{

foreach ($_SESSION['cart_array'] as $key => $value) { 
$prodid=$value;


$sql="SELECT * FROM products WHERE productid='$prodid' AND  availabel='yes'";
$query=mysql_query($sql,$con);
if(mysql_error()){
	echo mysql_error();
	}else{
	if(mysql_num_rows($query) ==0){
echo"OOPS! THE PRODUCT IS NO LONGER AVAILABEL..SORRY!";

}

if(mysql_num_rows($query) >=1){?>
 


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
 




<?php

}

?>



<?php
}










}

}

}

?>
</div>
</div>
<form method="post" action="scart.php">
<input type="text" name="pid" id="pid" placeholder="product id to be dumped">
<input type="hidden" name="OpFlag" id="OpFlag" value="R">
	 <input type="submit" value="Remove from cart">
	 </form>
<form method="post" action="porder.php">

	CheckOut: <input type="submit" value="PLACE YOUR ORDER">
	 </form>	 
<?php




}
?>
</body>
</html>

<?php
}
else {
    header("location: ../main.php");
    exit();	
}

?>