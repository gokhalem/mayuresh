<?php
include_once("core.inc.php");
include_once("check_login.inc.php");
if($_SESSION['flatno']== $log_id){
$flatno=$_SESSION['flatno'];
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
<script type = "text/javascript">
 $(document).ready(function(){
$('#datee').datepicker({});

});
 $(document).ready(function(){
$('#dateee').datepicker({});

});
</script>
<body>
  <div class="bs-docs-section">
	<div id="ref1">
        <div class="row">
		
          <div class="col-lg-6">
            <div class="page-header">
	
              <h1 id="tables">SEARCH FOR CAR POOL</h1>
            </div>
			
<h2></h2>
            <div class="bs-example">
               <h4 id="nav-tabs">SEARCH BY:</h4>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px; ">
             
                
				<li><a href="#tandl" data-toggle="tab">LOCATION AND DATE</a></li>
				 <li><a href="#recent" data-toggle="tab">RECENT POSTS</a></li>
				 </ul>
          
			</div>
			</div>
			<div id="myTabContent" class="tab-content" id="mytab">
		
			
 	<div class="tab-pane fade active in" id="tandl" >
				   <h3>SEARCH BY LOCATION OR DATE</h3></br>
				  <form>
				   <div class="input-group">
				   <span class="input-group-addon">LOCATION:</span>
                    <input type="text" name="loc"id="loc"class="form-control" placeholder="Enter the LOCATION">
                    
			 <span class="input-group-addon">DATE:</span>
                    <input type="text" name="date1"id="dateee"class="form-control" placeholder="Enter the date">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="submit">SEARCH</button>
                    </span>
                  </div>
				  </form>
			<div id="mee"></div>
							<?php
			
			if(isset ($_REQUEST['date1'])&& isset ($_REQUEST['loc'])){
			$loc=$_REQUEST['loc'];
			 $date=$_REQUEST['date1'];
			$sql2="SELECT * from carpool WHERE date='$date' AND location='$loc';";
$queryy=mysql_query($sql2,$con);
if(mysql_error()){
echo mysql_error();
}else{
	if(mysql_num_rows($queryy)==0){
	?>
		<div id="mee"><?php echo "SORRY Nobody Offering any car pool on this date!!";  ?></div>	
		<?php }
		else{
	
		if(mysql_num_rows($queryy)> 0){
?>
<div class="bs-example table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Requestno</th>
					<th>LIFT-PROVIDER</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>LOCATION</th>
					<th>SEATSLEFT</th>
                  </tr>
                </thead>
                <tbody>

<?php


while($row = mysql_fetch_array($queryy, MYSQL_ASSOC))
{
$a= $row['regno'] ;
 $z=$row['lname'] ;
$b=$row['date'];
$c=$row['time'];
$d=$row['location'];
$e=$row['cap'];
		
		?>
 

		
		
                  <tr class="success">
                    <td><?php echo "$a";?></td>
					<td><?php echo "$z";?></td>
                    <td><?php echo "$b";?></td>
                    <td><?php echo "$c";?></td>
                    <td><?php echo "$d";?></td>
					<td><?php echo "$e";?></td>
                  </tr>
				  
                <?php 
		}?>
		
		</tbody>
				  </table>
				  </div>
		
		<?php
		}
		
		
		
		
		}}	}
			?>
			</div>
         <div class="tab-pane fade" id="recent" >
				   <h3>RECENT POSTS</h3></br>
					<div class="bs-example table-responsive">
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Requestno</th>
					<th>LIFT-PROVIDER</th>
                    <th>DATE</th>
                    <th>TIME</th>
                    <th>LOCATION</th>
					<th>SEATSLEFT</th>
                  </tr>
                </thead>
                <tbody>
					
					
					
		
							<?php
			
		
			
			$sql2="SELECT * from carpool LIMIT 8;";
$queryyy=mysql_query($sql2,$con);
if(mysql_error()){
echo mysql_error();
}else{
	if(mysql_num_rows($queryyy)==0){
	?>
		<div id="meeee"><?php echo "SORRY Nobody Offering any car pool on this date!!";  ?></div>	
		<?php }
		else{
	
		if(mysql_num_rows($queryyy)> 0){?>
		
		
		
		<?php



while($row = mysql_fetch_array($queryyy, MYSQL_ASSOC))
{
$a= $row['regno'] ;
 $z=$row['lname'] ;
$b=$row['date'];
$c=$row['time'];
$d=$row['location'];
$e=$row['cap'];
		
		?>
 

		
		
                  <tr class="success">
                    <td><?php echo "$a";?></td>
					<td><?php echo "$z";?></td>
                    <td><?php echo "$b";?></td>
                    <td><?php echo "$c";?></td>
                    <td><?php echo "$d";?></td>
					<td><?php echo "$e";?></td>
                </tr>
				  
                <?php 
		}
		
		
		
		
		}}	}
			?>
			  
				  </tbody>
				  </table>
			</div>
			</div>
		
					
			
	
		 </div>
		  </div>
		   <div class="col-lg-4" >

            <h2>BOOK YOUR SEAT</h2>
            <div class="bs-example">
               <h4 id="nav-tabs"></h4>
            <div class="bs-example">
              <ul class="nav nav-tabs" style="margin-bottom: 15px; ">
                <li class="active"><a href="#home" data-toggle="tab">SEAT BOOKING</a></li>
                
				
				 </ul>
            </div>
			</div>
			<div id="myTabContent" class="tab-content" id="mytab">
			<div class="tab-pane fade active in" id="home">
			 <h3> </h3></br>
			 <div class="form-group">
                  <label class="control-label" for="inputSmall">Number of Seats you want in vehicle</label>
                  <input class="form-control input-sm" id="seats"type="text" placeholder="number of seats" id="inputSmall">
                </div>
			 <div class="input-group">
			
                    <span class="input-group-addon">REQNO:</span>
                    <input type="text" id="req"class="form-control" placeholder="Enter the request number">
                    <span class="input-group-btn">
                      <button class="btn btn-default" onclick="javascript:update()"type="button">BOOK</button>
                    </span>
                  </div>
				  	<div id="BOOK"></div>
					</div>
			
		 
			</div>
			</div>
			</div>
		  </div>
		  </div>
		  
		  
		  <?php
		  }
		  ?>