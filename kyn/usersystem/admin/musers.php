<?php
include_once("core.inc.php");
require 'check_login.inc.php';
if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
echo "<big>WELCOME  </big>".$_SESSION['id']."!!!!";


?>
<html>
<head>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
         <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="../../css/ui-lightness/jquery-ui-1.10.3.custom.css">
<script type="text/javascript" src="../../javascript/jquery.js"></script>
<script type="text/javascript" src="../../javascript/jquery-ui.js"></script>
<script type="text/javascript" src="../../javascript/boot.js"></script>
<style>
#ref{
border:1px solid black;
margin:10px 100px;
padding:100px;
}
#ref1{
border:1px solid black;
margin:100px 150px;
padding:0px;
align:center;
}
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
       
     
function enter(){

var xmlhttp=init();
var flatno=document.getElementById("flatno").value;

xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{

        document.getElementById("mee").innerHTML=xmlhttp.responseText;

        
}
}

xmlhttp.open("GET","deluser.php?flatno="+flatno,true);
xmlhttp.send();


}        
 
</script>
</head>
<body>

</br>        

  <div class="bs-docs-section">
        <div id="ref1">
        <div class="row">
                
          <div class="col-lg-8">
            <div class="page-header">
        
              <h1 id="tables">USERS ON YOUR WEBSITE</h1>
            </div>

            <div class="bs-example table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>FLATNO</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>LASTLOGIN AT</th>
                                        
                  </tr>
                </thead>
                <tbody>
                                        <?php
                                
                $sql3="SELECT * from user ";
$queryy=mysql_query($sql3,$con);
if(mysql_error()){
echo mysql_error();
}else{
if(mysql_num_rows($queryy)==0){
echo "**YOU HAVE NO USERS";
}



while($row = mysql_fetch_array($queryy, MYSQL_ASSOC))
{
$a= $row['flatno'] ;
$b=$row['lname'];
$c=$row['email'];
$d=$row['lastlogin'];


$my="$mydate[mon]/$mydate[mday]/$mydate[year]";

?>


                
                
                 
                <?php 
                                ?>
                                <tr class="success">
                    <td><?php echo "$a";?></td>
                    <td><?php echo "$b";?></td>
                    <td><?php echo "$c";?></td>
                    <td><?php echo "$d";?></td>
                                       
                  </tr>
                                
                                
                        <?php       ?>
                        

 

                        
                        
                        <?php }}?> 
                </tbody>
              </table>
            </div><!-- /example -->
          </div>
                  <div class="col-lg-4" >

            <h2></h2>
            <div class="bs-example">
               <h4 id="nav-tabs">Manage Users</h4>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px; ">
                <li class="active"><a href="#delete" data-toggle="tab">DELETE USERS</a></li>
             
                                
                                 </ul>
            </div>
                        </div>
                        <div id="myTabContent" class="tab-content" id="mytab">
                     
                                        <div class="tab-pane fade active in" id="delete" >
                                   <h3> </h3></br>
                                  
                                   <div class="input-group">
                        
                    <span class="input-group-addon">FLATNO:</span>
                    <input type="text" id="flatno" name="req" class="form-control"  placeholder="FLATNO">
                    <span class="input-group-btn">
                      <button class="btn btn-default" name="del" onclick="javascript:enter()" type="submit">DELETE</button>
                    </span>
                                        
                  </div>
                        <div id="mee"></div>
                        </div>
                        </div>
                        </div>

                        
                        
                
                        
          
        </div>
      </div>
</div>


</body>
</html>

                



<?php
}


?>