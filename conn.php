<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename ="message";

$conn = mysqli_connect($servername,$username,$password, $databasename);

if(!$conn)
{
	die('Connection failed!'.mysqli_error($conn));
}

?>