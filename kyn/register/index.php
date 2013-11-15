<?php 

session_start();
$_SESSION['secure'] = rand(1000, 9999);


 ?>
 
 <html>
 <head>
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
function checkcap(){

var xmlhttp=init();
var captcha1=document.getElementById("secure").value;

xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
	document.getElementById("captcha").innerHTML=xmlhttp.responseText;
	var captcha=xmlhttp.responseText;
	
	if (captcha=='success')
	{
	document.getElementById('submit').style.display = 'block';
	
	}
	else{
	
	document.getElementById('submit').style.display = 'none';
}}
}
xmlhttp.open("GET","submit.php?captcha="+captcha1,true);
xmlhttp.send();


}
</script>
 
 </head>
 <body>
<img src="generate.php"/></br>
<form id="submit" action="submit.php" method="POST">

<input type="text" name="secure" id="secure" placeholder="type what you see" onblur="javascript:checkcap()"/><div id="captcha"></div>
<input type="submit" id="submit"/>
</form>
<body>
</html>
