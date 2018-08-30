<?php 
$host="";
$user="zeyarmyo_travel";
$pass="4thSWLreginal";
//connection
$con=mysql_connect($host,$user,$pass) or die(mysql_error());
//db selection
mysql_select_db("zeyarmyo_travel",$con);
?>