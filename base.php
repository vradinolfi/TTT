<?php

session_start();

$dbhost = "localhost";
$dbname = "transmute_tournaments";
$dbuser = "transmuteAdmin";
$dbpass = "121790crap";

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_select_db($dbname) or die("MySQL Error: " . mysql_error()));

?>