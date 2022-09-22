<?php
$servername = "75.67.169.238";
$username = "userAuthLogin";
$password = "MasDonutsUserAuthLogin_1993";
$dbname = "useraccounts";

// Create connection
$conn1 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn1->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "<script>console.log('success')</script>";
?>