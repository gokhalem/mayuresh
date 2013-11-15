<?php
$con = mysql_connect('localhost','root','');
mysql_select_db('kyn',$con);
if(!$con  || !mysql_select_db('kyn',$con)){

echo(mysql_error());
}
?>