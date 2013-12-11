<?php
?>


<?php
ini_set('display_errors', 1);
include('header.php');

include_once("core.inc.php");
require 'check_login.inc.php';
if(isset($_SESSION['flatno']) && !empty($_SESSION['flatno'])){

	
	
$flatno=$_SESSION['flatno'];
$lstlogin=$_SESSION['lastlogin'];






$sql = "SELECT * FROM user WHERE flatno='$flatno' LIMIT 1";
$user_query = mysql_query( $sql , $con);

$numrows = mysql_num_rows($user_query);
if(mysql_error() ){
echo mysql_error();
}
$row = mysql_fetch_array($user_query, MYSQL_ASSOC);
$isOwner = "no";
 $avatar=$row['avatar'];

if($flatno == $log_id ){
	$isOwner = "yes";
	
	?>
	<html>
<head>
 <link rel="stylesheet" type="text/css" href="../css/headlogo.css" />
 <link rel="stylesheet" type="text/css" href="../css/footer1.css" />
</head>
<body>
<div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../commonimages/logo2.png" height="50px"align="left"/>
 
                 
                </div><!-- /.nav-collapse -->
              </div>
<?php
$lnamee=$_SESSION['lname'];
$flatnoo=$_SESSION['flatno'];?>

<p>
<img src='<?php echo "../register/user/$lnamee/myprofile/$avatar" ?>' align="left"  style=" height:200px; width:200px; margin:20px 20px;">
<h1>Welcome <?php echo "$lnamee" ?> family!!</h1>

<h2>Your Apartment Number---<?php echo "$flatnoo" ?><br>
You Last Logged In At---<?php echo "$lstlogin" ?></h2>
	<br>
	</p>
	
	
	
	 <div id="footer">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="#"></a></li>
                        
                        <li><a href="#">Your Profile</a>
                                <div class="one_column_layout">
                                        <div class="col_1">
                                                <a class="headerLinks">Your Family</a>
                                                
                                               
                                                
                                                
                                                <a class="headerLinks">Information</a>
                                               <a class="listLinks" style="font-weight:bold;color:white;" href="profile.php">UPDATE YOUR PROFILE</a>
                                               <a class="headerLinks">My Profile</a>
											  <a class="listLinks" style="font-weight:bold;color:white;"href="profilesee.php?flatno=<?php echo "$flatno"?>">MY PROFILE</a>	  
                                               <a class="headerLinks">Pictures</a>
                                              
                                       <a  class="listLinks" style="font-weight:bold;color:white;" href="album.php?flatno=<?php echo "$flatno"?>& page=1">Upload Photos</a>                                       
                                                 
                                        </div>
                                </div>
                        </li>                   
                        
                        <li>
                                <a href="#">Car Pool</a> 
                                <ul class="dropup">
                                        <li><a href="carpool.php">Offer Car Pool</a></li>
                                        <li><a href="getpool.php">Get Car Pool</a></li>
                                       
                                </ul>
                        </li>      
						 <li ><a href="peek.php">Peek Into Your Neighbors</a></li>
 <li><a href="admin/inventory.php">Trash To Treasure</a></li>
	
	<li><a href="chat.php?flatno=<?php echo "$flatno"?>">CHAT ROOM</a></li>
	
                        <li class="right"><a href="logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>
 
     
 
        </div>
	<?php
}


	
?>






</body>
<?php
}
else{
include 'login.inc.php';?>

<?php

}
include('footer.php');
?>