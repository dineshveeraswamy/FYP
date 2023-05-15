<?php
session_start();
$host = "localhost";
$user = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);

if (isset($_POST['logout'])) { // Check if logout button was clicked
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update is_logged_in to 0 in the database
    if (isset($_SESSION['email_id'])) {
        $email_id = $_SESSION['email_id'];
        $sql = "UPDATE register SET is_logged_in = 0 WHERE email_id = '$email_id'";
        if ($conn->query($sql) !== TRUE) {
            echo "Error updating is_logged_in: " . $conn->error;
        }
    }

    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_unset();
    session_destroy();
    header('location:login.html');

    exit;
} 
?>