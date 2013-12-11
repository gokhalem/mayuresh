<?php
include_once("core.inc.php");
include("check_login.inc.php");
if(isset($_SESSION['flatno'])){
$isOwner = "no";



        $isOwner = "yes";?>
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
        <?php
 $flatno=$_SESSION['flatno'];

$lnameew=$_SESSION['lname'];

       ?>
<h1 style="margin-left: 350px;">WELCOME <?php echo "$lnameew"?> family to your SHOPPING CART!<h1>

<?php
 $scart=$_REQUEST['pid'];
 $opFlag=$_REQUEST['OpFlag'];?>
   <button class="btn btn-primary"><a href="inventory.php">GO BACK TO Inventory</a></button> 
   <div id="hey">
</div>
<?php
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
         $found;
        array_push($_SESSION['cart_array'],$scart);
        $ok=yes;
        }

        } 
}else if($opFlag == "R"){
if(count($_SESSION['cart_array'])==0 ){
        echo" go back sir";?>
    <button class="btn btn-primary"><a href="inventory.php">GO BACK TO Inventory</a></button> 
        <?php

exit();


        }
        if(count($_SESSION['cart_array'])==1 ){
        unset ($_SESSION['cart_array']);
        echo"oops!! YOU EMPTIED YOUR CART NO PRODUCTS IN YOUR CART";




        }else{
         $scart;
         $_SESSION['cart_array'] = array_diff($_SESSION['cart_array'], array($scart));
    

        echo "Item removed refresh the page to see the change";
        }
}
?>
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
         <input type="submit" class="btn btn-primary"  value="Remove From Cart">
		   
         </form>
<form method="post" action="porder.php">
 <input type="submit" class="btn btn-primary" value="Place Your Order">
         </form>         
<?php





?>
<div id="footer" style="margin-top:200px">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="../main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="../logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>
 
     
 
        </div>
</body>
</html>

<?php
}
else {
    header("location: ../main.php");
    exit();        
}

?>