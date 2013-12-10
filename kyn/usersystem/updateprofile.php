<?php
include ('header.php');
include_once("core.inc.php");
include_once("check_login.inc.php");
require 'check_login.inc.php';
$lname= $_SESSION['lname'];
 $country= $_REQUEST['country'];
 $flatno= $_SESSION['flatno'];
 $ayf = $_REQUEST['ayf'];
 $intrest= $_REQUEST['intrests'];
 $nok= $_REQUEST['nok'];
 $cn=$_REQUEST['cn'];
 $em=$_REQUEST['em'];
 $prof=$_REQUEST['prof'];
 $lprof=$_REQUEST['lprof'];
 $oprof=$_REQUEST['oprof'];
 $gk=$_REQUEST['gk'];
 $uk=$_REQUEST['uk'];
 $hobby=$_REQUEST['hb'];


$sql="SELECT * FROM profile  WHERE flatno='$flatno' LIMIT 1";
$userquery=mysql_query($sql,$con);
 $numrows = mysql_num_rows($userquery); 
if(mysql_error()){
echo mysql_error();
}else{
         
if($numrows == 1){

$sql2="UPDATE profile SET country='$country', ayf='$ayf',intrests='$intrest', nok='$nok', contactno='$cn',em='$em',prof='$prof',lprof='$lprof', oprof='$oprof',gk='$gk',uk='$uk',hb='$hobby' WHERE flatno='$flatno'";
$userquery1=mysql_query($sql2,$con);
if(mysql_error()){
echo mysql_error();
}else{
$_SESSION['country']= $country;
$_SESSION['ayf']= $ayf;
$_SESSION['intrests']=$intrest;
$_SESSION['nok']=$nok;
$_SESSION['cn']=$cn;
$_SESSION['em']=$em;
$_SESSION['prof']=$prof;
$_SESSION['lprof']=$lprof;
$_SESSION['oprof']=$oprof;
$_SESSION['gk']=$gk;
$_SESSION['uk']=$uk;
$_SESSION['hb']=$hobby;

	header("location: profilesee.php?flatno=$flatno");
}}else{

$sql3="INSERT INTO profile VALUES('$flatno','$country','$ayf','$intrest',$nok,$cn,'$em','$prof','$lprof','$oprof','$gk','$uk','$hobby')";
mysql_query($sql3,$con);
if(mysql_error()){
echo mysql_error();
}else{
$_SESSION['country']= $country;
$_SESSION['ayf']= $ayf;
$_SESSION['intrests']=$intrest;
$_SESSION['nok']=$nok;
$_SESSION['cn']=$cn;
$_SESSION['em']=$em;
$_SESSION['prof']=$prof;
$_SESSION['lprof']=$lprof;
$_SESSION['oprof']=$oprof;
$_SESSION['gk']=$gk;
$_SESSION['uk']=$uk;
$_SESSION['hb']=$hobby;
header("location: profilesee.php?flatno=$flatno");}






}





		   }






include('footer.php');
?>