<?php
// Start the session
session_start();

// Get the from_user, to_user, and message values from the POST request
$fromUser = $_POST['from_user'];
$toUser = "Psychiatrist";
$message = $_POST['message'];

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Insert the message into the messages table
$sql = "INSERT INTO chat_messages1 (from_user, to_user, message) VALUES ('$fromUser', '$toUser', '$message')";

if ($conn->query($sql) === TRUE) {
  echo "Message sent successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>