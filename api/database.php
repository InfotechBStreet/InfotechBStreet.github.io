<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$dhbost = "localhost";
$dbname = "Infotech";
$uname = "Autumn";
$upass = "win";
$conn = new mysqli($dhbost, $uname, $upass, $dbname);
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>
