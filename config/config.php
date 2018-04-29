<?php   

$timezone = date_default_timezone_set('America/Denver');

session_start();
$con = mysqli_connect('localhost','root','root','Social');//connection variable

if (mysqli_connect_errno()) {
  echo "Failed to connect:" . mysqli_connect_errno();
}
