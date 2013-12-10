<?php
include_once("core.inc.php");
include("check_login.inc.php");

 $pid=$_REQUEST['pid'];


if(count($_SESSION['cart_array'])==1 ){
unset ($_SESSION['cart_array']);
echo"oops!! YOU EMPTIED YOUR CART NO PRODUCTS IN YOUR CART";




}else{
echo $pid;
 $_SESSION['cart_array'] = array_diff($_SESSION['cart_array'], array($pid));
print_r ($_SESSION['cart_array']);

echo "Item removed refresh the page to see the change";
}
?>