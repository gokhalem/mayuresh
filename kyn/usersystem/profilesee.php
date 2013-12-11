<?php
include_once("core.inc.php");
$flatno= $_REQUEST['flatno'];

?>

<!doctype html>
<html lang="en">
<head>
 <title>Welcome to Know Your Neighbours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
<link rel="icon" type="image/gif" href="../commonimages/kyn.gif">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.css" />
 <link rel="stylesheet" type="text/css" href="../css/headlogo.css" />
 
<link rel="stylesheet" href="../css/main1.css"><!--Q1-Imported the file main1.css for styling-->
</head>
<body>
<div id="hw">
       
                
                                
                <div class="navbar-collapse collapse navbar-inverse-collapse">
                <img src="../commonimages/logo2.png" height="50px"align="left"/>
 
                 
                </div><!-- /.nav-collapse -->
              </div>
<div id="big">

<nav id="navbar">




</nav>


<aside id="box1">
<ul class="nav nav-pills nav-stacked" style="max-width: 400px;">
              
                <li> <a href="album.php?flatno=<?php echo "$flatno"?>& page=1">SEE OUR PROFILE PICS</a></li>
<li>  <a href="gallery.php?flatno=<?php echo "$flatno"?>& page=1">SEE OUR GALLERY</a></li>
              
              </ul>
<?php


 
 $sql="SELECT * FROM user WHERE flatno='$flatno'";
$query=mysql_query($sql,$con);
  if(mysql_num_rows($query)==0){

  ?>
  
  <img title="Change Profile Photo" src="../commonimages/default.jpg" id="img-id" style= "display:block"alt="pic">
  
<?php
}
else{
while($row = mysql_fetch_array($query, MYSQL_ASSOC))
{
 $flatno1=$row['flatno'];
 $lname1=$row['lname'];
 $avatar=$row['avatar'];
 
 }


  ?>
  <img title="Profilephoto" src= '<?php echo "../register/user/$lname1/myprofile/$avatar" ?>'  id="img-id"  style= "display:block"alt="pic"/>


<?php
}
?>

</aside>
<h1>Welcome to AptNo: <?php echo "$flatno";?>'s Profile</h1>
<section id="section">
   <article>
      <header>
        <h1>Know About <?php echo "$lname1";?> Family</h1>
       </header>
          <p>
		  <?php
		  $sql1="SELECT * FROM profile WHERE flatno='$flatno1'";
$query1=mysql_query($sql1,$con);
if(mysql_num_rows($query1)==0){
echo "no data";}
else{
while($row = mysql_fetch_array($query1, MYSQL_ASSOC))
{
$flatno=$row['flatno'];
 $country=$row['country'];
 $ayf=$row['ayf'];
 $intrests=$row['intrests'];
 $nok= $row['nok'];
 $cn=$row['cn'];
 $em=$row['em'];
 $prof=$row['prof'];
 $lprof=$row['lprof'];
 $oprof=$row['oprof'];
 $gk=$row['gk'];
 $uk=$row['uk'];
 $hobby=$row['hb'];
		  
	}}	  
		  ?>
		  <div id="ab">
		  <h2 id="b"> Where Are We From:</h2>
			 <div class="well well-sm">
			 
              <?php echo "$country";?>
            </div>
			</div>
		
		  <div id="ab">
		  <h2 id="b"> About Our Family:</h2>
			 <div class="well ">
			 
              <?php echo "$ayf";?>
            </div>
			</div>
		  
		  <div id="ab">
		  <h2 id="b"> INTERESTS:</h2>
			 <div class="well well-sm ">
			 
              <?php echo "$intrests";?>
            </div>
			</div>
		  <div id="ab">
		  <h2 id="b"> EMAIL:</h2>
			 <div class="well well-sm ">
			 
              <?php echo "$em";?>
            </div>
			</div>
			 <div id="ab">
		  <h2 id="b"> My Profession:</h2>
			 <div class="well well-sm ">
			 
              <?php echo "$prof";?>
            </div>
			</div>
				 <div id="ab">
		  <h2 id="b"> My Partner's Profession:</h2>
			 <div class="well well-sm ">
			 
              <?php echo "$lprof";?>
            </div>
			</div>
				 <div id="ab">
		  <h2 id="b"> Hobbies:</h2>
			 <div class="well well-sm ">
			 
              <?php echo "$hobby";?>
            </div>
			</div>
		  </p>
       
    </article>

</section>


</div>
 <div id="footer">
                <ul id="footer_menu">
                
                        <li class="homeButton"><a href="main.php"></a></li>
                       		  
                
	
                        <li class="right"><a href="logout.php?logout=1">Log Out</a>
                        </li>
                        
                </ul>
 
     
 
        </div>


</body>
</html>