
<!DOCTYPE html>








<html lang="en">
  <head>
    <title> Know Your Neighbours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
  
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

	   <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
             
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-5">
            <div class="well">
            <form action= "<?php echo $current_file ?>"  method="POST"class="bs-example form-horizontal"  >
                <fieldset>
                  <legend>Login Here</legend>
			
				<div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Apartment No:</label>
                    <div class="col-lg-10">
                   
					  <input type="text" class="form-control" name="aptno" placeholder="Enter your apartment number "
					  id="aptno" onblur="javascript:vapt()" /><div id="mydiv1"></div>
                    </div>
                  </div>
				  
				 
				   <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                  
					 <input type="password" class="form-control" placeholder="enter your password" name="password"  
					 id="password"onblur="javascript:vpass()" /><div id="mydiv3"></div>
                    </div>
                  </div>  
	
				  
				  <div class="form-group">
					 
					<div class="col-sm-offset-0 col-sm-10">
      <button type="submit" name="login" id="submit"   class="btn btn-default">LOGIN</button>
    
 <div class="bs-example">
             
            <div class="alert alert-dismissable alert-info" id="toggle">
              <button type="button" id="btn1" class="close" onclick="javascript:toggle_visibility()" data-dismiss="alert">&times;</button>
              <strong>Please Note  ::</strong>you need to register first before logging in! <a href="../register/Home.php" class="alert-link">REGISTER HERE</a>
            
	</div>
  </div>
  
  <?php
  if (isset($_POST['aptno']) && isset($_POST['password'])){
$flat= htmlentities($_POST['aptno']);
$password= htmlentities($_POST['password']);

if(!empty ($flat) && !empty($password)){
$query= "SELECT * FROM user WHERE flatno='$flat' AND password='$password'";
if($query_run= mysql_query($query)){
$query_rows = mysql_num_rows($query_run);
if($query_rows==0){?>


            <div class="alert alert-dismissable alert-danger" id="tog">
              <button type="button" class="close" onclick="javascript:toggle_visibility1() "data-dismiss="alert">&times;</button>
              <strong>Oh snap!</strong>wrong username password combination..please re-enter the details
            </div>
       

<?php
}elseif($query_rows==1){
$flat_no = mysql_result($query_run, 0,'flatno');
$lname = mysql_result($query_run, 0,'lname');
$password=mysql_result($query_run, 0,'password');
$lastlogin=mysql_result($query_run, 0,'lastlogin');
$_SESSION['flatno']=$flat_no;
$_SESSION['lname']= $lname;
$_SESSION['lastlogin']=$lastlogin;

// CREATE THEIR SESSIONS AND COOKIES
	$http_client= $_SERVER['HTTP_CLIENT_IP'];
$http_fwd= $_SERVER['HTTP_X_FORWARDED_FOR'];
$remote_addr= $_SERVER['REMOTE_ADDR'];
if(!empty ($http_client)){
$ip=$_SERVER['HTTP_CLIENT_IP'];
}else if(!empty ($http_fwd)){
$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else if(!empty($remote_addr)){
$ip=$_SERVER['REMOTE_ADDR'];

}		
			$_SESSION['password'] = $password;
			setcookie("flatno", $flat_no, strtotime( '+3 days' ), "/", "", "", TRUE);
			setcookie("lname", $lname, strtotime( '+3 days' ), "/", "", "", TRUE);
    		setcookie("password", $password, strtotime( '+3 days' ), "/", "", "", TRUE); 
			// UPDATE THEIR "IP" AND "LASTLOGIN" FIELDS
			$sql = "UPDATE user SET ip='$ip', lastlogin=now() WHERE flatno='$flat_no' LIMIT 1";
			
           mysql_query($sql,$con);
if(mysql_error()){
echo mysql_error();

}


 
		
		   
header('Location: main.php');
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



                    
                  </div>
				  </div>
				  </div>
				  </div>
				 
                 

 


        </form>
    </body>
</html>
 <?php
?> 
     
                 

      
       

  
  </body>
</html>
<?php
?>
