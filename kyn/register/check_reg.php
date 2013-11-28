
<?php
session_start();
$flat=$_POST['flat'];
$lname1=$_POST['lname1'];
 $email=$_POST['email'];
  $password=$_POST['password'];
 ?>
 <html lang="en">
  <head>
    <title>Welcome to Know Your Neighbours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
  <script type="text/javascript">
  
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
  
 <?php
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
$con=mysql_connect('localhost','root','');
mysql_select_db('kyn',$con);



$sql="INSERT INTO user VALUES('$flat','$lname1','$email','$password',null,'$ip',now(),now(),now(),0)";
mysql_query($sql,$con);
if(mysql_error()){?>
 <div class="col-lg-4">
 <div class="alert alert-dismissable alert-danger" id="tog">
              <button type="button" class="close" onclick="javascript:toggle_visibility1() "data-dismiss="alert">&times;</button>
              <strong>Oh snap!!!!!!!!</strong>Some one is already registered on this apartment number please contact administrator
            </div>
			</div>
<?php 

}else
{
$sql1=mysql_query("Select * from user where flatno='$flat'");

if(mysql_num_fields($sql1)==10)
if (!file_exists("user/$lname1")) {
mkdir("user/$lname1", 0755);
			mkdir("user/$lname1/myprofile", 0755);
			mkdir("user/$lname1/gallery",0755);
			echo "SUCCESSFULLY REGISTERED";
		}


}
mysql_close($con);
?>
</body>
</html>
<?php
?>