<?php
$hostname_connect = "localhost";
$database_connect = "waterbilling";
$username_connect = "root";
$password_connect = "";
$connect = mysql_pconnect($hostname_connect, $username_connect, $password_connect) or trigger_error(mysql_error(),E_USER_ERROR); 
?>