<?php 

session_start();
$_SESSION['secure'] = rand(1000, 9999);


 ?>

<html lang="en">
  <head>
    <title>Welcome to Know Your Neighbours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
  <script type="text/javascript">


            function checkname() {
                document.getElementById('submit1').style.display = 'block';
                var lname = document.getElementById("lname").value;
                if (lname == "") {
                    var response = "last name cannot be blank";
                    document.getElementById("mydiv").innerHTML = response;
                    document.getElementById('submit1').style.display = 'none';
                }
                else {
                    document.getElementById('submit1').style.display = 'block';
                    
                }
            }
            function checkinput() {
                var lname = document.getElementById("lname").value;
                document.getElementById('submit1').style.display = 'none';
                var regex = /^[a-zA-Z ]*$/;
                if (document.getElementById("lname").value.match(regex)) {

                    document.getElementById("mydiv").innerHTML = "";
                    document.getElementById('submit1').style.display = 'block';
                }
                else {
                    var response1 = "input should be strictly alphabets";
                    document.getElementById("mydiv").innerHTML = response1;
                    document.getElementById('submit1').style.display = 'none';
                }
            }
            function vemail() {

                var email = document.getElementById("femail").value;
                if (email == "") {
                    var response = "email cannot be blank";
                    document.getElementById("mydiv1").innerHTML = response;
                    document.getElementById('submit1').style.display = 'none';
                }
                else {
				document.getElementById("mydiv1").innerHTML = "";
                    document.getElementById('submit1').style.display = 'block';
                }
            }
        function  checkemailinput()
            {
                
            var email = document.getElementById("femail").value;
		
           
            var regexp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
            
                if (document.getElementById("femail").value.match(regexp) == null)
                {
                    
                    var response1 = "input is not of email type";
                    document.getElementById("mydiv1").innerHTML = response1;
                    document.getElementById('submit1').style.display = 'none';

                    
                }
                else {
                    

                   
                    document.getElementById('submit1').style.display = 'block';



                }
        }

        function checkpasswordinput() {
            var password = document.getElementById("password").value;

            

            if (password.length < 5) {

                var response1 = "password should be more than 5 characters";
                document.getElementById("mydiv3").innerHTML = response1;
                document.getElementById('submit1').style.display = 'none';


            }
            else {


                document.getElementById("mydiv3").innerHTML = "";
                document.getElementById('submit1').style.display = 'block';



            }






        }
        function cpass() {
            var cpassword = document.getElementById("passwordc").value.trim();
            var password = document.getElementById("password").value.trim();
            if (cpassword == "") {
                var response = "password cannot be blank";
                document.getElementById("mydiv4").innerHTML = response;
                document.getElementById('submit1').style.display = 'none';
            }
            else {
                document.getElementById('submit1').style.display = 'block';

                if (cpassword == password) {
                    var response = "";
                    document.getElementById("mydiv4").innerHTML = response;

                }
                else {

                    var response = "password doesnot match";
                    document.getElementById("mydiv4").innerHTML = response;
                    document.getElementById('submit1').style.display = 'none';
                }


            }


        }

            function cemail() {
                
                var cemail = document.getElementById("cemail1").value.trim();
                var email = document.getElementById("femail").value.trim();

                if (cemail == "") {
                    var response = "email cannot be blank";
                    document.getElementById("mydiv2").innerHTML = response;
                    document.getElementById('submit1').style.display = 'none';
                }
                else {
                    document.getElementById('submit1').style.display = 'block';

                    if (cemail == email) {
                        var response = "";
                        document.getElementById("mydiv2").innerHTML = response;

                    }
                    else {

                        var response = "email doesnot match";
                        document.getElementById("mydiv2").innerHTML = response;
                        document.getElementById('submit1').style.display = 'none';
                    }

                }
            }
            function vpass() {

                var password = document.getElementById("password").value;
                if (password == "") {
                    


                    var response = "password cannot be empty";
                    document.getElementById("mydiv3").innerHTML = response;
                    document.getElementById('submit1').style.display = 'none';
                }
                else {
                    document.getElementById("mydiv1").innerHTML = "";
                    document.getElementById('submit1').style.display = 'block';





                }
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
var captcha1=document.getElementById("secure").value;

xmlhttp.onreadystatechange=function()
{
if(xmlhttp.readyState==4 && xmlhttp.status==200)
{
	document.getElementById("captcha").innerHTML=xmlhttp.responseText;
	var captcha=xmlhttp.responseText;
	alert(captcha);
	if (captcha=='success')
	{
	}
	else{
	
	document.getElementById('submit1').style.display = 'none';
}}
}
xmlhttp.open("GET","submit.php?captcha="+captcha1,true);
xmlhttp.send();


}	
			
		
			
			
			function openTerms(){
	 document.getElementById("terms").style.display = "block";
	document.getElementById('submit1').style.display = 'block';
}
			
			
			
			
            function sub() {
              
                checkname();
                checkinput();
                vemail();
                checkemailinput();
                checkpasswordinput();
                vpass();
                cemail();
                cpass();
             checkcap();
			 	
			if( document.getElementById ("terms").style.display == "none"){
			document.getElementById("mydiv9").innerHTML = "Please view the terms of use";
		document.getElementById('submit1').style.display = 'none';
            }
			
			
			}

            </script>
  
  </head>
  <body>
 
	   <div class="bs-docs-section">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-header">
              <h1 id="forms">NEW USERS REGISTER</h1>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-5">
            <div class="well">
              <form class="bs-example form-horizontal"  action="check_reg.php" method="POST">
                <fieldset>
                  <legend>Register Here</legend>
				   <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Apartment No</label>
                    <div class="col-lg-10"> <select class="form-control"  name="flat"  id="Aptno" >
  <option value="1001">1001</option>
  <option value="1002">1002</option>
  <option value="1003">1003</option>
  <option value="1004">1004</option>
  <option value="1005">1005</option>
  <option value="1006">1006</option>
  <option value="1007">1007</option>
  <option value="1008">1008</option>

  
</select>

                      
                    </div>
                  </div>
				  
				   <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">LastName</label>
                    <div class="col-lg-10">
                      
					  <input type="text" class="form-control"   name="lname1"  placeholder="Enter your Last Name" id="lname"
					   onblur="javascript:checkname()"  onkeyup="javascript:checkinput()"/><div id="mydiv"></div>
                    </div>
                  </div>
				  
				  
				  
				  
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                   
					  <input type="email" class="form-control" name="email" placeholder="Email"
					  id="femail" onblur="javascript:vemail()" onkeydown="javascript:checkemailinput()"/><div id="mydiv1"></div>
                    </div>
                  </div>
				  
				  
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Re-Type Email</label>
                    <div class="col-lg-10">
                   <input type="email" class="form-control" placeholder="Email"  name="temail" id="cemail1"onblur="javascript:cemail()"/><div id="mydiv2"></div>
					 
                    </div>
                  </div>  
				   <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                  
					 <input type="password" class="form-control" placeholder="Password-must be more than 5 characters" name="password" id="password"onblur="javascript:vpass()" onkeydown="javascript:checkpasswordinput()"/><div id="mydiv3"></div>
                    </div>
                  </div>  
				  
				  
				  
                  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">Re-Type Password</label>
                    <div class="col-lg-10">
				
                   <input type="password" class="form-control"placeholder="Password-must be more than 5 characters" name="tpassword" id="passwordc"onblur="javascript:cpass()"/><div id="mydiv4"></div>
                     </div>
					 </div>
					  
					  
					  <div class="form-group">
                    <label for="inputPassword" class="col-lg-2 control-label">CAPTCHA</label>
                    <div class="col-lg-10">
				<img src="generate.php"/></br>

</br>
<input type="text" name="secure" id="secure" placeholder="type what you see" onblur="javascript:checkcap()"/><div id="captcha"></div>
                   
                     </div>
					 </div>
					 			  <div>
      <a href="#" onclick="return false" onmousedown="openTerms()">
        View the Terms Of Use
      </a>
    </div><div id="mydiv9"></div>
    <div id="terms" style="display:none;">
      <h3>Know Your Neighbours Terms Of Use</h3>
      
	  <p>TODAYS REALITY</br>
	  Big HOUSE but small family</br>
	  MORE EDUCATION but less common sense</br>
	  LOTS of HUMAN BEINGS BUT LESS HUMANITY</br>
	  HIGH IQ but less Emotions</br>
	  HIGH INCOME BUT LESS PEACE OF MIND</br>
	  AND FINALLY</br></br></br>
	  TOUCHED MOON BUT NEIGHBOURS UNKNOWN</p>
	  <p>SO</p>
	  <p>1. Play nice here.</p>
      <p>2. Respect others</p>
      <p>3. Love thy neighbours.</p>
    </div>
    <br /><br />
					 
					 
					 
					 <div class="form-group">
					 
					<div class="col-sm-offset-0 col-sm-10">
      <button type="submit1" name="submit1" id="submit1" onmouseover="javascript:sub()" class="btn btn-default">Sign UP!</button>
    </div>
  </div>
                    
                  </div>
				  </div>
				  </div>
				  </div>
				 
                 

 


        </form>
    </body>
</html>
       
     
                 

      
       

  
  </body>
</html>

