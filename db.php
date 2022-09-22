<?php
$servername = "75.67.169.238";
$username = "userAuthLogin";
$password = "MasDonutsUserAuthLogin_1993";
// $dbname = "mas_donuts_wholesale";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "<script>console.log('success')</script>";
?>