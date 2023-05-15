<!DOCTYPE html>
<html>
<head>
  <title>Psychiatrist Home Page</title>
  <link rel="stylesheet" type="text/css" href="doc_home_css.css">
</head>
<style>
   #chat-box {
    position: fixed;
    bottom: 10px;
    right: 20px;
    border: 1px solid #ccc;
    background-color: #fff;
    padding: 10px;
    height: 400px;
    overflow-y: scroll;
  }

  .chat-message {
    margin-bottom: 10px;
  }

  .chat-message .sender {
    font-weight: bold;
  }

  .chat-message .time {
    font-size: 12px;
    color: #999;
    margin-left: 5px;
  }

  #chat-input {
    margin-top: 10px;
  }

  

  #chat-input input[type="text"] {
  flex-grow: 1;
  height: 15px;
  bottom: 5px;
  margin-right: 5px;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px 10px;
  font-size: 16px;
}

  #chat-input button {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .message-input{
  flex-grow: 1;
  height: 15px;
  bottom: 5px;
  margin-right: 5px;
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 10px 10px;
  font-size: 16px;
  bottom: 10px;
}

  #close-chat {
    float: right;
    font-size: 20px;
    font-weight: bold;
    text-decoration: none;
    color: #000;
    background-color: lightblue;
    border-radius: 5px;
    padding: 5px;
  }

  #close-chat:hover {
    color: #999;
  }

  .user-item{
    font-style: none;
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

      // Get the names of all logged in users
      $sql = "SELECT name,score FROM register WHERE is_logged_in = 1";
      $result = $conn->query($sql);

      // Display the names on the psychiatrist homepage
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo "<li><a class='user-item' href='#' onclick='openChat(\"" . $row['name'] . "\")'>" . $row['name'] . " - Score: " . $row['score'] . "</a></li> <br><br>";
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
  <a href="#" id="close-chat" onclick="closeChat()">Close</a><br><br>
    <input type="text" class="message-input" placeholder="Type your message...">
    <button id="send-button" onclick="sendMessage()">Send</button>
  </div>

    

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

    function openChat(user) {
      // Set the current chat user and clear the chat window
      currentChatUser = user;
      chatWindow.innerHTML = "";

      // Display the chat box and start polling for messages
      chatBox.style.display = "block";
      var chatBoxTitle = document.createElement('h4');
  chatBoxTitle.innerHTML = 'Chat with ' + user;
  chatBox.insertBefore(chatBoxTitle, chatBox.childNodes[0]);
      intervalId = setInterval(getMessages, 1000);
    }

    function closeChat() {
      // Clear the chat window and hide the chat box
      chatWindow.innerHTML = "";
      chatBox.style.display = "none";

      // Stop polling for messages
      clearInterval(intervalId);
    }

    function sendMessage() {
      // Get the message text
      var message = messageInput.value.trim();

      // Send the message to the server
      if (message !== "") {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            // Clear the message input field
            messageInput.value = "";
          }
        };
        xhttp.open("POST", "doc_send_message.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("to_user=" + currentChatUser + "&message=" + message);
      }
    }

    function getMessages() {
      // Get the messages from the server
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          // Display the messages in the chat window
          chatWindow.innerHTML = this.responseText;
          chatWindow.scrollTop = chatWindow.scrollHeight;
        }
      };
      xhttp.open("POST", "doc_get_messages.php", true);
      xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhttp.send("from_user=" + currentChatUser);
    }

    // Scroll to bottom of chat window on load
    chatWindow.scrollTop = chatWindow.scrollHeight;
  </script>
</body>
</html>