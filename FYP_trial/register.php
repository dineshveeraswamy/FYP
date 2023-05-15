<?php

error_reporting(E_ERROR | E_PARSE);

$name = $_POST['name'];
$age = $_POST['age'];
$email_id = $_POST['email_id'];
$password = $_POST['password'];
$re_password = $_POST['re_password'];
$number = $_POST['number'];
$gender = $_POST['gender'];

$conn = new mysqli('localhost', 'root', '', 'project');

if ($conn->connect_error) {
  echo "$conn->connect_error";
  die("Failed to connect to MySQL: " . $conn->connect_error);
}
else{
  // Prepare SQL statement
  $sql = "SELECT COUNT(*) FROM register WHERE email_id = ?";
  $stmt = $conn->prepare($sql);
  
  // Bind email parameter to prepared statement
  $stmt->bind_param("s", $email_id);
  
  // Execute prepared statement with bound parameters
  if (!$stmt->execute()) {
    die("Error executing query: " . $stmt->error);
  }
  if (strlen($password) < 8 || strlen($password) > 20) {
    die("Password Length Must Be Between 8 and 20");
  }
  // Bind result variable
  $stmt->bind_result($emailCount);
  
  // Fetch the result of the SQL query
  if (!$stmt->fetch()) {
    die("Error fetching result");
  }
  
  // Check if email exists
  if ($emailCount > 0) {
    echo "An account with that Email ID already exists. Try resetting your password instead.";
  } else {
    if ($password != $re_password) {
      echo "Passwords do not match. Please try again.";
    } else {
      if (empty($gender)) { // check if gender field is empty
        echo "Please enter all the details.";
      } else {
        // Email does not exist, proceed with account creation
        $stmt->close();
        $stmt = $conn->prepare("insert into register(name, age, number, email_id, password, re_password, gender) values (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siissss",$name, $age, $number, $email_id, $password, $re_password, $gender);
        if (!$stmt->execute()) {
          die("Seems like there is a problem with registering yourself. Please enter all the details");
        }
        echo "Registration Successfull...";
        header("Location: droplist.html");
        exit();
      }
    }    

  }
  $stmt->close();
  $conn->close();
}
?>
