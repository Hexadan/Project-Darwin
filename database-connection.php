<?php

$dbHost = "localhost";
$dbUsername = "phpmyadmin";
$dbPassword = "testing8";
$dbDatabase = "elite_kiosk";

$db_conn = new MySQLi($dbHost, $dbUsername, $dbPassword, $dbDatabase);

if(mysqli_connect_errno())
{
  echo "Database connection error; please try again later.";
  exit();
}

/* include('/var/www/html/php/database-connection.php'); */
?>
