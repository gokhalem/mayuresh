<?php
ini_set('display_errors', 1);


include_once("core.inc.php");
require 'check_login.inc.php';
?>
<!DOCTYPE html>



<html lang="en">
  <head>
    <title> Know Your Neighbours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
	<link rel="icon" type="image/gif" href="../../commonimages/kyn.gif">
  <link rel="stylesheet" type="text/css" href="../../css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" href="../../css/headlogo.css" />
 
  
  <script type="text/javascript">

        
        

function vapt(){
 var apt = document.getElementById("aptno").value;

if (apt == "") {
                    


                    var response = "please enter your apartment number";
                    document.getElementById("mydiv1").innerHTML = response;
                    document.getElementById('submit').style.display = 'none';
                }
                else {
                    document.getElementById("mydiv1").innerHTML = "";
                    document.getElementById('submit').style.display = 'block';
}

}
        

            
            function vpass() {

                var password = document.getElementById("password").value;
                if (password == "") {
                    


                    var response = "password cannot be empty";
                    document.getElementById("mydiv3").innerHTML = response;
                    document.getElementById('submit').style.display = 'none';
                }
                else {
                    document.getElementById("mydiv3").innerHTML = "";
                    document.getElementById('submit').style.display = 'block';
}
            }
		
			
			 function toggle_visibility() {
       var e = document.getElementById('toggle');
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
   }
			
				
			 function toggle_visibility1() {
       var e = document.getElementById('tog');
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
		  }
			
			
			
			
			
            

            </script>
			
  </head>
  <body>
  <div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../../commonimages/logo2.png" height="50px"align="left"/>
 
                  <ul class="nav navbar-nav navbar-right">
				  <li><a href="../../face.html">Home</a></li>
                    <li><a href="#">Admin-Login</a></li>
                    <li><a href="../main.php">Members-Login</a></li>
					
					
                  </ul>
                </div><!-- /.nav-collapse -->
              </div><!-- /.navbar -->

	   <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
             
            </div>
          </div>
        </div>
		

        <div class="row">
          <div class="col-lg-5" style="margin-left:350px;">
            <div class="well">
            <form action= "<?php echo $current_file ?>"  method="POST"class="bs-example form-horizontal"  >
                <fieldset>
                  <legend> ADMIN Login </legend>
			
				<div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">ID:</label>
                    <div class="col-lg-10">
                   
					  <input type="text" class="form-control" name="aptno" placeholder="Enter your ID"
					  id="aptno" onblur="javascript:vapt()" /><div id="mydiv1"></div>
                    </div>
                  </div>
				  
				 
				   <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Password:</label>
                    <div class="col-lg-10">
                  
					 <input type="password" class="form-control" placeholder="enter your password" name="password"  
					 id="password"onblur="javascript:vpass()" /><div id="mydiv3"></div>
                    </div>
                  </div>  
	
				  
				  <div class="form-group">
					 
					<div class="col-sm-offset-0 col-sm-12">
      <button type="submit" name="login" id="submit"   class="btn btn-default">LOGIN</button>
    </div>
	</div>
 <div class="bs-example">
             
            <div class="alert alert-dismissable alert-info" id="toggle">
              <button type="button" id="btn1" class="close" onclick="javascript:toggle_visibility()" data-dismiss="alert">&times;</button>
              <strong>Please Note  ::</strong>only admin can login here
       </div>

  
  <?php
  if (isset($_POST['aptno']) && isset($_POST['password'])){
$id= htmlentities($_POST['aptno']);
$password= htmlentities($_POST['password']);

if(!empty ($id) && !empty($password)){
$query= "SELECT * FROM admin WHERE id='$id' AND password='$password'";
if($query_run= mysql_query($query)){
$query_rows = mysql_num_rows($query_run);
if($query_rows==0){?>


            <div class="alert alert-dismissable alert-danger" id="tog">
              <button type="button" class="close" onclick="javascript:toggle_visibility1() "data-dismiss="alert">&times;</button>
              <strong>Oh snap!</strong>wrong username password combination..please re-enter the details
            </div>
       

<?php
}elseif($query_rows==1){
$id = mysql_result($query_run, 0,'id');

$password=mysql_result($query_run, 0,'password');
$lastlogin=mysql_result($query_run, 0,'lastlogin');
$avatar=mysql_result($query_run, 0,'avatar');

$_SESSION['id']=$id;

$_SESSION['lastlogin']=$lastlogin;
$_SESSION['avatar']=$avatar;
// CREATE THEIR SESSIONS AND COOKIES
	
			$_SESSION['password'] = $password;
			setcookie("id", $id, strtotime( '+2 days' ), "/", "", "", TRUE);
			setcookie("lname", $lname, strtotime( '+2 days' ), "/", "", "", TRUE);
    		setcookie("password", $password, strtotime( '+2 days' ), "/", "", "", TRUE); 
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE admin SET lastlogin=now() WHERE id='$id' LIMIT 1";
			
           mysql_query($sql,$con);
if(mysql_error()){
echo mysql_error();

}


 
		
		   
header('Location: main1.php');
}



}
}
else{?>
 <div class="alert alert-dismissable alert-danger" id="tog">
              <button type="button" class="close" onclick="javascript:toggle_visibility1() "data-dismiss="alert">&times;</button>
              <strong>Oh snap!</strong>Check your username and password..please re-enter the details
            </div>



<?php
}

}?>



                    
                  
				 
                 

 </form>	   
	</div>
	
	</div>
	</div>
	</div>
	</div>


      <footer id="footer">
copyright @KnowYourNeighbors 2013-2014
</footer>
    </body>
</html>
 <?php
?> 
     
                 

      
       

  
  </body>
</html>
<?php
?>
