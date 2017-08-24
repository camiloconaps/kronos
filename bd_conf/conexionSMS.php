<?php
$servername = "localhost";
$username = "root";
$password = "AlejaSiza2015";
$dbname = "PRUEBAS_ORION";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>
