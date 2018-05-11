<?php 
$database_localhost = "localhost";
$database_user = "root";
$database_pass = "cs360";
$database_database = "cloud";

$con = mysqli_connect("$database_localhost","$database_user","$database_pass","$database_database");

if (!$con) {
die ('Failed to connect to DB' .mysqli_error());
}
?>