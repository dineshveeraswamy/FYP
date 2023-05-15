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

// Get the sender from the database and the recipient from the session variable
$from_user = 'Psychiatrist';
$to_user = 'Dinesh V';

// Retrieve the messages from the database
$sql = "SELECT * FROM chat_messages1 WHERE (from_user = '$from_user' AND to_user = '$to_user') OR (from_user = '$to_user' AND to_user = '$from_user') ORDER BY timestamp ASC";
$result = $conn->query($sql);

// Display the messages in the chat window
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sender = $row['from_user'];
    $message = $row['message'];
    $time = date('h:i A', strtotime($row['timestamp']));
    echo "<div class='chat-message'><span class='sender'>$sender</span><span class='time'>$time</span><br>$message</div>";
  }
} else {
  echo "<p>No messages</p>";
}

// Close the database connection
$conn->close();
?>