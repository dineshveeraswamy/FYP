<!DOCTYPE html>
<html>
<head>
  <title>Psychiatrist Home Page</title>
  <link rel="stylesheet" type="text/css" href="doc_home_css.css">
</head>
<style>

body {
    margin: auto;
    font-family: 'Times New Roman';
    background-image: url('stethoscope.jpg');
  }
  
#chat-box {
  position: fixed;
  bottom: 70px;
  right: 20px;
  border: 1px solid #ccc;
  background-color: #f2f2f2;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
  z-index: 9999;
  width: 300px;
   }

#chat-box h4 {
  margin: 0;
  padding: 10px;
  background-color: #333;;
  font-size: 18px;
  font-weight: bold;
  color: white;
  border-bottom: 1px solid #ccc;
}

#chat-window {
  height: 300px;
  overflow-y: scroll;
  padding: 10px;
}

.chat-message .sender {
  font-weight: bold;
}

.chat-message .time {
  font-size: 12px;
  color: #999;
  margin-left: 5px;
}

/* #chat-input {
  display: flex;
  align-items: center;
  height: 50px;
  padding: 10px;
  border-top: 1px solid #ddd;
}

#chat-input input[type="text"] {
  flex-grow: 1;
  height: 20px;
  margin-right: 5px;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px 10px;
  font-size: 16px;
}

#chat-input input[type="submit"] {
  height: 35px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 10px;
  font-size: 16px;
  cursor: pointer;
}

#chat-input button {
  padding: 10px 20px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 20px;
  cursor: pointer;
  font-size: 16px;
} */

#close-chat {
  position: absolute;
  top: 6px;
  right: 8px;
  font-size: 16px;
  font-weight: bold;
  text-decoration: none;
  color: #000;
  background-color: lightcoral;
  border-radius: 5px;
  padding: 5px;
}

#close-chat:hover {
  color: black
}

 .chat-message{
      background-color: blanchedalmond;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 10px;
      float: right;
      clear: both;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: 13px;
      font-weight: bold;
      max-width: 200px;
    } 

    .sender{
      font-size: 10px;
      font-family:'Times New Roman', Times, serif;
      font-style: italic;
      text-decoration: underline;
    }

    .time{
      font-size: 10px;
      font-family:'Times New Roman', Times, serif;
      font-style: italic;
      text-decoration: underline;
    }

.received-message{
  background-color: aquamarine;
  color: #333;
  border-radius: 10px; 
  padding: 10px;
  margin-bottom: 10px; 
  float: left; 
  clear: both; 
  font-family: Arial, sans-serif; 
  font-size: 13px; 
  font-weight: bold; 
  max-width: 200px; 
}

.hidden-content {
  /* display: none; */
  margin-top: 10px;
  left:20px;
  padding: 10px;
  
}

.hidden-content input[type="text"] {
  flex-grow: 1;
  height: 20px;
  margin-right: 5px;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px 10px;
  font-size: 16px;
  position: fixed;
  bottom:20px;
  right:85px;
 
}

.hidden-content input[type="submit"] {
  height: 35px;
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 10px 10px;
  font-size: 16px;
  cursor: pointer;
  position: fixed;
  bottom:20px;
  right:20px;
  
}

</style>
<body>
    <div class="navbar">
    <button class="login-btn" onclick="showUsers()">Logged in users</button>
    <div class="twp">Talk With Psychiatrist</div>
    <form action="doc_logout.php" method="POST">
      <button class="logout-btn" type="submit" name="logout">Log Out</button>
    </form>
  </div>

  <ul id="user-list" class="user-list" style="display: none;">
  <?php
// Start the session
session_start();

// Connect to the database
$servername = "";
$username = "root";
$password = "";
$dbname = "project";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the names of all logged in users
$sql = "SELECT name,score FROM register WHERE is_logged_in = 1";
$result = $conn->query($sql);

// Display the names on the psychiatrist homepage
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo "<li><a class='user-item' href='#' onclick='openChat(\"" . $row['name'] . "\", \"" . $row['score'] . "\")'>" . $row['name'] . " - Score: " . $row['score'] . "</a></li> <br><br>";
    echo "<form id='active-user-form' action='doc_send_message.php' method='POST'><input type='hidden' name='to_user' value='" . $row['name'] . "'><div class='hidden-content'><input type='text' placeholder='Type your message...' name='message'><input type='submit' value='Send'></div></form>";
  }
} else {
  echo "<li><p class='user-item'>&nbsp;&nbsp;&nbsp;No users logged in</p></li>";
}

// Close the database connection
$conn->close();
?>
  </ul>

  <div id="chat-box" style="display: none;">
  <div id="chat-window"></div>
  <div id="chat-input">
  <a href="#" id="close-chat" onclick="closeChat()">Close</a><br><br></div>
   <!-- <input type="text" name="message" class="message-input" placeholder="Type your message...">
    <input type="submit" id="send-button" value="Send" onclick="sendMessage()"> -->
  

    

  <script>
    // Global variables
    var chatBox = document.getElementById("chat-box");
    var chatWindow = document.getElementById("chat-window");
    var messageInput = document.getElementById("message-input");
    var sendButton = document.getElementById("send-button");
    var closeChatButton = document.getElementById("close-chat");
    var currentChatUser = "";
    var intervalId;

    var chatMessages = document.querySelector('.chat-messages');

// Get the chat form
var chatForm = document.querySelector('.chat-form');

// Add a submit event listener to the chat form
chatForm.addEventListener('submit', function(event) {
  // Prevent the default behavior of the form
  event.preventDefault();

  // Get the input field for the message
  var messageInput = chatForm.querySelector('input[name="message"]');

  // Get the message text
  var messageText = messageInput.value;

  // Create a new message element
  var messageElement = document.createElement('div');
  messageElement.classList.add('message');
  messageElement.innerText = messageText;

  // Add the message element to the chat messages div
  chatMessages.appendChild(messageElement);

  // Clear the message input field
  messageInput.value = '';
});


    function showUsers() {
      var userList = document.getElementById("user-list");
      if (userList.style.display === "none") {
        userList.style.display = "block";
      } else {
        userList.style.display = "none";
      }
    }

    function openChat(user, score) {
  // Set the current chat user and clear the chat window
  currentChatUser = user;
  currentChatUserScore = score;
  var scoreText = "";

  // Display the chat box and start polling for messages
  chatBox.style.display = "block";

  // Check if a chat box title already exists
  var chatBoxTitle = document.getElementById("chat-box-title");
  if (!chatBoxTitle) {
    // If it doesn't exist, create a new one
    if (score) {
      scoreText = " [ " + score + " ]";
    }
    chatBoxTitle = document.createElement('h4');
    chatBoxTitle.id = "chat-box-title";
    chatBoxTitle.innerHTML = 'Name: ' + user + scoreText;
    chatBox.insertBefore(chatBoxTitle, chatBox.childNodes[0]);
  } else {
    // If it already exists, update the title
    if (score) {
      scoreText = " [ " + score + " ]";
    }
    chatBoxTitle.innerHTML = 'Name: ' + user + scoreText;
  }

  chatWindow.innerHTML = "";
  intervalId = setInterval(getMessages, 1000);
}

    function closeChat() {
      // Clear the chat window and hide the chat box
      chatWindow.innerHTML = "";
      chatBox.style.display = "none";

      // Stop polling for messages
      clearInterval(intervalId);
    }

    function getCurrentTime() {
  var now = new Date();
  var hours = now.getHours();
  var minutes = now.getMinutes();
  var ampm = hours >= 12 ? 'PM' : 'AM';
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? '0' + minutes : minutes;
  var time = hours + ':' + minutes + ' ' + ampm;
  return time;
}



function sendMessage() {
  // Get the message text and clear the input field
  var messageInput = document.getElementById("message-input");
  var messageText = messageInput.value;
  messageInput.value = "";

  // Create a new message element and add it to the chat window
  var messageElement = document.createElement("div");
  messageElement.classList.add("chat-message", "chat-message-sent", "sent-message");
  messageElement.innerHTML = messageText;
  chatWindow.appendChild(messageElement);

  // Scroll to the bottom of the chat window
  chatWindow.scrollTop = chatWindow.scrollHeight;

  // Send the message to the server
  var xhttp = new XMLHttpRequest();
  xhttp.open("POST", "doc_send_message.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("from_user=Psychiatrist&to_user=" + currentChatUser + "&message=" + messageText);
}

function getMessages() {
  // Get the messages from the server
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // Display the messages in the chat window
      chatWindow.innerHTML = this.responseText;

      // Add styles to the received messages
      var receivedMessages = chatWindow.querySelectorAll('.chat-message-receive');
      for (var i = 0; i < receivedMessages.length; i++) {
        receivedMessages[i].style.backgroundColor = "#f2f2f2";
        receivedMessages[i].style.color = "#333";
        receivedMessages[i].style.borderRadius = "10px";
        receivedMessages[i].style.padding = "10px";
        receivedMessages[i].style.marginBottom = "10px";
        receivedMessages[i].style.float = "left";
        receivedMessages[i].style.clear = "both";
        receivedMessages[i].style.fontFamily = "Arial, sans-serif";
        receivedMessages[i].style.fontSize = "13px";
        receivedMessages[i].style.fontWeight = "bold";
        receivedMessages[i].style.maxWidth = "200px";
      }
    }
  };
  xhttp.open("GET", "doc_get_messages.php?from_user=" + currentChatUser + "&to_user=Psychiatrist", true);
  xhttp.send();
}
  </script>
</body>
</html>