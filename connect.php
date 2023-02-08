<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prospect";

$con = mysqli_connect($servername, $username, $password,$dbname);

if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}

$db = mysqli_select_db($con,$dbname);
if (!$db){
    echo ("Unable to connect to db");
    die();
}
?>