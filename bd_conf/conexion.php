<?php
$servername = "localhost";
$username = "wwwrun";
$password = "*$0410WIZK.";
$dbname = "CONTINGENCIA";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

?>
