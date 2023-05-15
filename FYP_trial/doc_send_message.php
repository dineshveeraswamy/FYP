<?php
// Start the session
session_start();

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the message data
$to_user = $_POST['to_user'];
$message = $_POST['message'];

// Store the message in the database
$sql = "INSERT INTO chat_messages1 (from_user, to_user, message) VALUES ('Psychiatrist', '$to_user', '$message')";
if ($conn->query($sql) === TRUE) {
  header('Location: psychiatrist_homepage.php');
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}


// Close the database connection
$conn->close();
?>