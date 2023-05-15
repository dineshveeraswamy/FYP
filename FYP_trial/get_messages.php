<?php
// Start the session
session_start();

// Get the from_user and to_user values from the GET request
$fromUser = $_GET['from_user'];
$toUser = "Psychiatrist";

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

// Retrieve the messages from the messages table
$sql = "SELECT * FROM chat_messages1 WHERE (from_user = '$fromUser' AND to_user = '$toUser') OR (from_user = '$toUser' AND to_user = '$fromUser') ORDER BY timestamp ASC";
$result = $conn->query($sql);

// Create an array to hold the messages
$messages = array();

if ($result->num_rows > 0) {
  // Loop through each row in the result set and add it to the messages array
  while($row = $result->fetch_assoc()) {
    $message = array(
      'from_user' => $row['from_user'],
      'to_user' => $row['to_user'],
      'message' => $row['message'],
      'timestamp' => $row['timestamp']
    );
    array_push($messages, $message);
  }
}

// Convert the messages array to a JSON string and echo it
echo json_encode($messages);

$conn->close();
?>