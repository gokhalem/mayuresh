<?php
include_once("core.inc.php");
include_once("check_login.inc.php");
if($_SESSION['flatno']== $log_id){
 $flatno=$_SESSION['flatno'];
  $lnamei=$_SESSION['lname'];
?>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../css/ui-lightness/jquery-ui-1.10.3.custom.css">
<script type="text/javascript" src="../javascript/jquery.js"></script>
<script type="text/javascript" src="../javascript/jquery-ui.js"></script>
<script type="text/javascript" src="../javascript/boot.js"></script>
<link rel="icon" type="image/gif" href="../commonimages/kyn.gif">

 <link rel="stylesheet" type="text/css" href="../css/headlogo.css" />
 <link rel="stylesheet" type="text/css" href="../css/footerforpeek.css" />
	
<style>
#ref{
border:2px solid #28C4DA;;
margin:10px 100px;
padding:10px;
border-radius:10px;
}
#ref1{
border:2px solid #28C4DA;
border-radius:10px;
margin:100px 100px;
padding:0px;
align:center;
}
#hey{
				border: 1px solid #28C4DA;
				background:white;
				height:40px;
				width:1250px;
				
				}
</style>
<script type="text/javascript">
  $(document).ready(function(){
$('#date').datepicker({});

});

function checkinputa(){
var cap=document.getElementById("cap").value;

if (document.getElementById("cap").value.match(/[1-9]/g)== null){



  var response = "input is not valid";
                    document.getElementById("mydiv1").innerHTML = response;
                    document.getElementById('submit1').style.display = 'none';
            
   
}
else{
var response1 = "";
  document.getElementById("mydiv1").innerHTML = response1;
document.getElementById('submit1').style.display = 'block';
                    
}


}
function checkinput(){
checkcap();
var loc= document.getElementById("loc").value;

if (document.getElementById("loc").value.match(/^[a-zA-Z]+$/)== null){


    var response1 = "input is not alphabetic";
                    document.getElementById("mydiv").innerHTML = response1;
                    document.getElementById('submit1').style.display = 'none';
            
}
else{
 var response1 = "";
  document.getElementById("mydiv").innerHTML = response1;
document.getElementById('submit1').style.display = 'block';

                    
}


}
function validate(){

checkinput();
checkinputa();

}

     
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
var captcha1=document.getElementById("date").value;

xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{

        var captcha=xmlhttp.responseText;
alert(captcha);
var captcha1="ok";
        if (captcha == captcha1)
        {
		alert("here");
        document.getElementById("mydiv3").innerHTML="";
        }
        else{
        document.getElementById("mydiv3").innerHTML="YOU CANNOT SET CARPOOL FOR CURRENT DAY or days passed by";
        document.getElementById('submit1').style.display = 'none';
}}
}
xmlhttp.open("GET","checkdate.php?captcha="+captcha1,true);
xmlhttp.send();


}        
function enter(){

var xmlhttp=init();
var req=document.getElementById("req1").value;
alert(req);
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{

        document.getElementById("me").innerHTML=xmlhttp.responseText;

        
}
}

xmlhttp.open("GET","cpool.php?req="+req,true);
xmlhttp.send();


}        
function update(){

var xmlhttp=init();
var req=document.getElementById("req").value;
var seat=document.getElementById("seats").value;
xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{

        document.getElementById("mee").innerHTML=xmlhttp.responseText;

        
}
}

xmlhttp.open("GET","upool.php?req="+req+"&&seat="+seat,true);
xmlhttp.send();


}        
 
</script>
</head>
<body>
 <div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../commonimages/logo2.png" height="50px"align="left"/>
 
                 
                </div><!-- /.nav-collapse -->
              </div>
</br>  

<h2 style="margin-left:200px;"> Awesome <?php echo "$lnamei"?> family !!, you are taking eco-friendly option!!<h2>
<div id="hey"></div>      
<div id="ref">
<form >





</form>
    <div class="bs-docs-section">
  <div class="row">
  <img src="../commonimages/carpool.jpg" height="300px" width="400px" style="float:right;padding:20px;"align="left"/>
          <div class="col-lg-6">
            <div class="well">
              <form class="bs-example form-horizontal" action="carpool.php" method="GET">
                <fieldset>
                  <legend>Offer Car Pool</legend>
                  <div class="form-group">
				 
                    <label for="inputEmail" class="col-lg-2 control-label"> Date: </label>
                    <div class="col-lg-10">
                      <input type="text"id="date" name="date"  class="form-control"  placeholder="Date Of Your Trip" required/>
					  <div id="mydiv3"></div>
                    </div>
                  </div>
              
   <div class="form-group">
				 
                    <label for="inputEmail" class="col-lg-2 control-label">Location:</label>
                    <div class="col-lg-10">
            <input type="text" class="form-control" id="loc" name="loc" required  placeholder="where you are going?" onblur="javascript:checkinput()"/>
					  <div id="mydiv"></div>
                    </div>
                  </div>
            	    <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label"> Time:</label>
                    <div class="col-lg-10">
            <input type="time" class="form-control" id="time" name="time"required /> 
					 
                    </div>
                  </div>
							  
             <div class="form-group">
				 
                    <label for="inputEmail" class="col-lg-2 control-label">Seats:</label>
                    <div class="col-lg-10">
<input type="text" class="form-control" id="cap" name="cap" required placeholder="no of seats you offer" onblur="javascript:checkinputa()"/>
					  <div id="mydiv1"></div>
                    </div>
                  </div>
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                        <input class="btn btn-default" type="submit" id="submit1" value="POST" onmouseover="javascript:validate()" />
<div id="div4"></div> 
                    </div>
                  </div>
  
                
				
				
				
				
				
				</fieldset>
              </form>
            </div>
          </div>
         
        </div>
		</div>
<?php
if(isset ($_REQUEST['date'])){
$flatno=$_SESSION['flatno'];
 $lname=$_SESSION['lname'];
 $date=$_REQUEST['date'];
 $location=$_REQUEST['loc'];
  $time=$_REQUEST['time'];
  $capacity=$_REQUEST['cap'];
$sql1="SELECT * from carpool WHERE flatno='$flatno' AND date='$date'";
$query=mysql_query($sql1,$con);
if(mysql_error()){
echo mysql_error();
}else{
if(mysql_num_rows($query)>=1){
$row = mysql_fetch_array($query, MYSQL_ASSOC);
$ro= $row['regno'];
$date= $row['date'];
echo "Sorry!! You cannot set up a car pool again on same day...RELAXX!";
echo "Your registration number for carpool".$date." is:".$ro;
}elseif(mysql_num_rows($query)==0){

$sql="INSERT INTO carpool VALUES('','$flatno','$lname','$date','$time','$location','$capacity')";
mysql_query($sql,$con);
if(mysql_error()){
echo mysql_error();
}else{
$sql3="SELECT * from carpool WHERE flatno='$flatno' AND date='$date'";
$query1=mysql_query($sql3,$con);
if(mysql_error()){
echo mysql_error();
}else{
$row = mysql_fetch_array($query1, MYSQL_ASSOC);
$ro= $row['regno'];
$date= $row['date'];


echo " post successful";
echo "Your registration number for carpool on ".$date." is:".$ro;
}}}}}}


?>

</div>

  <div class="bs-docs-section">
        <div id="ref1">
        <div class="row">
                
          <div class="col-lg-8">
            <div class="page-header">
        
              <h1 id="tables">Carpools offered by you</h1>
            </div>

            <div class="bs-example table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Requestno</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>LOCATION</th>
                                        <th>SEATSLEFT</th>
                  </tr>
                </thead>
                <tbody>
                                        <?php
                                
                $sql3="SELECT * from carpool WHERE flatno='$flatno' ORDER BY regno DESC";
$queryy=mysql_query($sql3,$con);
if(mysql_error()){
echo mysql_error();
}else{
if(mysql_num_rows($queryy)==0){
echo "**YOU HAVE NO CAR POOLS ON OFFER";
}



while($row = mysql_fetch_array($queryy, MYSQL_ASSOC))
{
$a= $row['regno'] ;
 $b=$row['date'];
$c=$row['time'];
$d=$row['location'];
$e=$row['cap'];
$mydate=getdate(date("U"));

 $my="$mydate[mon]/$mydate[mday]/$mydate[year]";
if( strtotime($my)== strtotime($b)){
?>


                
                
                  <tr class="warning">
                    <td><?php echo "$a";?></td>
                    <td><?php echo "$b";?></td>
                    <td><?php echo "$c";?></td>
                    <td><?php echo "$d";?></td>
                                        <td><?php echo "$e";?></td>
                  </tr>
                <?php 
                                }
                                else if(strtotime($my) < strtotime($b)){ ?>
                                <tr class="success">
                    <td><?php echo "$a";?></td>
                    <td><?php echo "$b";?></td>
                    <td><?php echo "$c";?></td>
                    <td><?php echo "$d";?></td>
                                        <td><?php echo "$e";?></td>
                  </tr>
                                
                                
                        <?php        }else if(strtotime($my) > strtotime($b)){?>
                        

 <tr class="active">
                    <td><?php echo "$a";?></td>
                    <td><?php echo "$b";?></td>
                    <td><?php echo "$c";?></td>
                    <td><?php echo "$d";?></td>
                                        <td><?php echo "$e";?></td>
                  </tr>


                        
                        
                        <?php }}}?> 
                </tbody>
              </table>
            </div><!-- /example -->
          </div>
                  <div class="col-lg-4" >

            <h2>Car Pool Options</h2>
            <div class="bs-example">
               <h4 id="nav-tabs">Modify Requests</h4>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px; ">
                <li class="active"><a href="#home" data-toggle="tab">UPDATE</a></li>
                <li><a href="#delete" data-toggle="tab">DELETE</a></li>
                                
                                 </ul>
            </div>
                        </div>
                        <div id="myTabContent" class="tab-content" id="mytab">
                        <div class="tab-pane fade active in" id="home">
                         <h3> UPDATE SEATS</h3></br>
                         <div class="form-group">
                  <label class="control-label" for="inputSmall">Number of Seats left in vehicle</label>
                  <input class="form-control input-sm" id="seats"type="text" placeholder="number of seats left" id="inputSmall">
                </div>
                         <div class="input-group">
                        
                    <span class="input-group-addon">REQNO:</span>
                    <input type="text" id="req"class="form-control" placeholder="Enter the request number">
                    <span class="input-group-btn">
                      <button class="btn btn-default" onclick="javascript:update()"type="button">UPDATE</button>
                    </span>
                  </div>
                                          <div id="mee"></div>
                                        </div>
                                        <div class="tab-pane fade" id="delete" >
                                   <h3> DELETE REQUEST</h3></br>
                                  
                                   <div class="input-group">
                        
                    <span class="input-group-addon">REQNO:</span>
                    <input type="text" id="req1" name="req" class="form-control"  placeholder="Enter the request number">
                    <span class="input-group-btn">
                      <button class="btn btn-default" name="del" onclick="javascript:enter()" type="submit">DELETE</button>
                    </span>
                                        
                  </div>
                        <div id="me"></div>
                        </div>
                        </div>
                        </div>

                        
                        
                
                        
                  <div class="col-lg-7">
    
            
       
           
            <div class="bs-example">
              <p> </p>
              
              <p class="text-warning"></p>
             <h4> <p class="text-warning">**Indicates today you are supposed to offer car pool</p></h4>
             <h4> <p class="text-success">**Indicates you are all set for car-pool</p></h4>
                          <h4><p class="text-primary"><h4>**Indicates your past car-pool offers</p></h4>
              <p class="text-info"></p>
            </div>
            
          </div>
        </div>
      </div>
</div>
<div id="footer" style="margin-top:200px">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>

</body>
</html>

                



<?php



?>