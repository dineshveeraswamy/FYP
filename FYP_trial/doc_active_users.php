// doc_active_user.php
<?php
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
// Get the active user from the POST data
$active_user = $_POST['active_user'];

// Do something with the active user, such as store it in a session variable
session_start();
$_SESSION['active_user'] = $active_user;

?>