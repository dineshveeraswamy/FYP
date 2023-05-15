<?php
// Connect to the database
$conn = new mysqli('localhost', 'root', '', 'project');

// Retrieve the user's email from the session or URL parameter
$email_id = $_POST['email_id']; // or $_GET['email'] or $_POST['email']

// Retrieve the user's score from the droplist.html form
$score = $_POST['score'];

// Update the user's score in the database
$update_query = "UPDATE register SET score='$score' WHERE email_id='$email_id'";
mysqli_query($conn, $update_query);

// Redirect the user to a success page
header('Location: login.html');
?>
