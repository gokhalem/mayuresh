<?php
?>

<html>
<head>
</head>
<body>

</html>
<?php
ini_set('display_errors', 1);
include_once("core.inc.php");
require 'check_login.inc.php';
if(isset($_SESSION['flatno']) && !empty($_SESSION['flatno'])){
echo "<big>WELCOME  </big>".$_SESSION['lname']."!!!!";





?> </br>
<?php
echo "you last logged in at ";
$flatno=$_SESSION['flatno'];
$lstlogin=$_SESSION['lastlogin'];

echo $lstlogin;

echo "YOUR APARTMENT NUMBER".$_SESSION['flatno'];


// Select the member from the users table
$sql = "SELECT * FROM user WHERE flatno='$flatno' LIMIT 1";
$user_query = mysql_query( $sql , $con);
// Now make sure that user exists in the table
$numrows = mysql_num_rows($user_query);
if(mysql_error() ){
echo mysql_error();
}
// Check to see if the viewer is the account owner
$isOwner = "no";


if($flatno == $log_id ){
	$isOwner = "yes";
	
}
// Fetch the user row from the query above

?>
</br>
<a href="logout.php?logout=1">LOGOUT</a>
</body>
<?php
}
else{
include 'login.inc.php';?>

<?php

}
?>