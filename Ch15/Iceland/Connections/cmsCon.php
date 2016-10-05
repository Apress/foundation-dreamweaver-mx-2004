<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cmsCon = "localhost";
$database_cmsCon = "book_db";
$username_cmsCon = "spongebob";
$password_cmsCon = "squarepants";
$cmsCon = mysql_pconnect($hostname_cmsCon, $username_cmsCon, $password_cmsCon) or trigger_error(mysql_error(),E_USER_ERROR); 
?>