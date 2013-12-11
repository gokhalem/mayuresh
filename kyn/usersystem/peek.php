<?php
ini_set('display_errors', 1);


include_once("core.inc.php");

?>
<!DOCTYPE html>
<html>
<head>
<title> Know Your Neighbours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="../css/headlogo.css" />
 <link rel="icon" type="image/gif" href="../commonimages/kyn.gif">
  <link rel="stylesheet" type="text/css" href="../css/footerforpeek.css" />
  
  <style type="text/css">
  #hi{
 margin: 50px 120px;
 
  }
  #bye{
  margin: 50px 100px;
 
  }
  #mybox{
display:block;

color:#ffffff;
-webkit-border-radius:10px;



-webkit-transition:-webkit-transform 2s, opacity 2s, background 2s,
width 2s, height 2s;
}
#mybox:hover{
-webkit-transform: rotate(360deg);
opacity:0.8;
background:#1ec7e6;

}
  
  </style>
  
</head>
<body>
<div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../commonimages/logo2.png" height="50px"align="left"/>
 
                 
                </div><!-- /.nav-collapse -->
              </div>
<div class="page-header">
            <h2>  PEEK INTO YOUR NEIGHBORS</h2>
            </div>
<aside id="box1">


<div id="hi">
 <div id="mybox"style="float:left;">
 <h4 >APTNO:1001</h4>
<a href="profilesee.php?flatno=1001"><img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
</a>
</div>
 <div id="mybox" style="float:left;">
 <h4>APTNO:1002</h4>
<a href="profilesee.php?flatno=1002"><img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
</a>
</div>
 <div>
 <div id="mybox" style="float:left;">
 <h4 >APTNO:1003</h4>
<a href="profilesee.php?flatno=1003">	<img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
</a>
</div>
<div id="mybox" style="float:left;">
 <h4 >APTNO:1004</h4>
 <a href="profilesee.php?flatno=1004">
<img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
</a>
</div>
 <div id="mybox" style="float:left;">
<h4 >APTNO:1005</h4>
<a href="profilesee.php?flatno=1005">
<img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
</a>
</div>
 <div id="mybox" style="float:left;">
<h4 >APTNO:1006</h4>
<a href="profilesee.php?flatno=1006">
<img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
</a>
</div>
 <div id="mybox" style="float:left;">
 <a href="profilesee.php?flatno=1007">
 <h4 >APTNO:1007</h4>
<img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
<a>
</div>
 <div id="mybox" style="float:left;">
 <a href="profilesee.php?flatno=1008">
<h4 >APTNO:1008</h4>
<img src="../commonimages/door.jpg" style="width: 180px; float: left; margin-bottom: 35px; margin-right: 30px;">
</a>
</div>

</div>

</aside>
<div id="footer">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>
 
     
 
        </div>






<?PHP

include('footer.php');
?>