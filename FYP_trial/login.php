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

// Check if form has been submitted
if($_SERVER['REQUEST_METHOD'] == "POST"){

  // Retrieve the entered email and password
  $email_id = $_POST['email_id'];
  $password = $_POST['password'];

  // Check if the user is a psychiatrist
  if ($email_id === 'talkwithpsychiatrist@gmail.com' && $password === 'MentalHealth$@2023') {
    // The user is a psychiatrist, redirect to psychiatrist homepage
    header('Location: psychiatrist_homepage.php');
    exit;
  } else {
    // The user is not a psychiatrist, check their login credentials

    // Prepare a SQL query to check if the user exists and the password matches
    $sql = "SELECT * FROM register WHERE email_id = '$email_id' AND password = '$password'";

    // Execute the query
    $result = $conn->query($sql);

    // Check if the query returned any results
    if ($result->num_rows > 0) {
      // User credentials are valid, check if the user is already logged in
      $row = $result->fetch_assoc();
        // Update the is_logged_in field to 1 and store user's information in session variables
        $sql = "UPDATE register SET is_logged_in = 1 WHERE email_id = '$email_id'";
        $conn->query($sql);
        session_start();
        $_SESSION['email_id'] = $row['email_id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['score'] = $row['score'];
        

        // Redirect to welcome page
        header('Location: welcome.php');
        exit;
      }
    else {
      // User credentials are invalid, display an error message
      echo "Invalid email or password";
    }
  }
}

// Close the database connection
$conn->close();
?>
