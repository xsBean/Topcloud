<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost = "localhost";
$database_localhost = "cloud";
$username_localhost = "root";
$password_localhost = "cs360";
$localhost = mysql_pconnect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_USER_ERROR); 
?>