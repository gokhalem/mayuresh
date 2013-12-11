<?php
include_once("core.inc.php");
include_once("check_login.inc.php");

$flatno=$_REQUEST['flatno'];

?>
<!DOCTYPE html>
<html>
<head>
<title> Know Your Neighbours</title>
 
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	



 <link rel="stylesheet" type="text/css" href="../css/bootstrap1.css" />
<link rel="icon" type="image/gif" href="../commonimages/kyn.gif">

 <link rel="stylesheet" type="text/css" href="../css/headlogo.css" />
 <link rel="stylesheet" type="text/css" href="../css/footerforpeek.css" />
	
	
                <style>
			#div_chat{	overflow: auto; 
height: 300px; 
width: 500px; 
border-radius:10px;
background-color: #28C4DA; 
border: 1px solid #555555;
color:black;
				}
			#page{
			margin: 10px 200px;}	
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
function pathav(){

var xmlhttp=init();
var ghe=document.getElementById("txt_message").value;

xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
	var response =xmlhttp.responseText;

	if(response){
	
	document.getElementById("txt_message").value="";
	}
	
}
}
xmlhttp.open("GET","chatb.php?ghe="+ghe,true);//SEND FLATNO AS WELLL
xmlhttp.send();


}
function uchal(){

var xmlhttp=init();


xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
	document.getElementById("div_chat").innerHTML=xmlhttp.responseText;
	
	
}
}
xmlhttp.open("GET","chatr.php?",true);//SEND FLATNO AS WELLL
xmlhttp.send();


}

setInterval(uchal,1000);
		</script>
		
		
	</head>

	<body style="margin: 0px;">
		 <div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../commonimages/logo2.png" height="50px"align="left"/>
 
                 
                </div><!-- /.nav-collapse -->
              </div>
			  	<h1 style="margin-left:200px">
	
	KNOW YOUR NEIGHBOURS: CHAT ROOM</h1>
	<div id="page">
		
	<h2><p>Better a good neighbour than a distant friend.</p>
	    Enjoy the fact that you guys are neighbours!!
		KEEP CHATTING!!
	</h2>
	
		<div id="div_chat" class="chat_main" >
	
		<?php
	
/*$sql="SELECT * FROM CHAT  ORDER BY msgid ASC";
$query=mysql_query($sql,$con);
 if(mysql_error()){
	echo mysql_error();
	}
	if(mysql_num_rows($query)==0){
	echo "No one is talking today....post somthin to get people talking";
	}else{
while($row = mysql_fetch_array($query, MYSQL_ASSOC)){

$a=$row['datetime'];
$b=$row['lname'];
 $c=$row['msg'];
 "<br />";

echo "[".$a."]"."--".$b."says ---".$c."<br />";



}}
		
		*/
		?>
			
		</div>
	
		<div id="a">
			
			<input type="text" id="txt_message" name="txt_message" style="width: 447px;" />
			
			
			<input type="button" name="btn_send_chat" id="sendchat" onclick="javascript:pathav()" value="SEND" />
			<div id="mydiv"></div>
		</div>
</div>
<p style="margin-bottom:150px">

<p>
<div id="footer" style="margin-top:200px">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>
<?PHP



?>