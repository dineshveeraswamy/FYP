<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the number of active users
$sql = "SELECT COUNT(DISTINCT email_id) FROM register";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$num_active_users = $row['COUNT(DISTINCT email_id)'];

// Return the number of active users as plain text
echo $num_active_users;

// Close the database connection
$conn->close();
?>
