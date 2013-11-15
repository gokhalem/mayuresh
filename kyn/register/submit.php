<?php
session_start();



if( $_SESSION['secure']== $_GET["captcha"]){

echo "success";
}
else{


echo "failure";
}



?>
