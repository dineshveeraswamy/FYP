<!DOCTYPE html>
<html>
  <head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="home.css">
  </head>
  <style>
    .message.sent {
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

    .message.received {
      background-color: aquamarine;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 10px;
      float: left;
      clear: both;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
      font-size: 13px;
      font-weight: bold;
      color: black;
      max-width: 200px;
    }
  </style>

  <body>
    <div class="navbar">
      <ul>
        <li><a href="welcome.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="#" id="open-chat-link">Talk with Psychiatrist</a></li>
        <li>
          <p class="displayName"><b>
            <?php
              session_start();
              if (isset($_SESSION['name'])) {
                $name = $_SESSION['name'];
                $score = $_SESSION['score'];
                $email_id=$_SESSION['email_id'];
                echo "Welcome $name"; 
              }
              if(!isset($_SESSION['name'])){
                header('location:login.html');
              }
            ?> 
          </b></p>
        </li>
        <li>
          <?php
            echo " Your score is $score";
          ?>
        </li>
      </ul>

      <form action="logout.php" method="POST">
        <input type="submit" name="logout" class="logout-btn" value="Log Out">
      </form>
    </div>
    <br>
    <div class="home">
      <?php
        if ($score >= 7.5) {
          echo "You are doing fine with your mental health.";
        } elseif ($score >= 5 && $score < 7.5) {
          echo "You are moderately fine with your mental health, but still would consider having guidance.";
        } else {
          echo "You are supposed to consider seeing a psychiatrist immediately.";
        }
      ?>
    </div> 

    <!-- *********************************  #any <body> content to be typed here.... ********************************-->

    <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
    <df-messenger
      intent="WELCOME"
      chat-title="peace"
      agent-id="8a0693e5-ffab-475f-8602-40ef1e76a5c0"
      language-code="en"
    ></df-messenger>

    <br><br>
    <div class="conf1">
      You Are
    </div>
    <div class="conf2">
      Not Alone
    </div>
    <div class="conf3">
      Now more than ever, we need to find ways to stay connected.<br>
      No one should feel alone or be without the information support and help that they need.
    </div>
    <br>

    <div class="home-content">
  <h2>SELF CARE TIPS AND TECHNIQUES:</h2>
  <details>
    <summary><b>1. Practice mindfulness</b></summary>
    <p>Set aside time each day to focus on the present moment.<br>You can try techniques like deep breathing, meditation, or yoga.</p>
    </details>
    <details>
    <summary><b>2. Get enough sleep</b></summary>
      <p>Aim to get 7-8 hours of sleep each night.<br>Create a relaxing bedtime routine to help you wind down before sleep.</p>
    </details>
    <details>
      <summary><b>3. Stay hydrated</b></summary>
      <p>Drink plenty of water throughout the day to keep your body and mind hydrated.</p>
      </details>
      <details>
        <summary><b>4. Exercise regularly</b></summary>
        <p>Regular exercise can help reduce stress and improve mood.<br>Find a physical activity you enjoy and make it a regular part of your routine.</p>
        </details>
        <details>
          <summary><b>5. Connect with others</b></summary>
          <p>Spending time with friends and family or joining a social group <br>can help reduce feelings of loneliness and improve mental health.</p>
          </details>
          <details>
            <summary><b>6. Practice self-compassion</b></summary>
            <p>Treat yourself with kindness and understanding.<br>Don't be too hard on yourself and remember that it's okay to make mistakes.</p>
            </details>
            <details>
              <summary><b>7. Engage in hobbies</b></summary>
              <p>Participate in activities that bring you joy and help you relax.<br>This could be anything from reading a book to painting to playing music.</p>
              </details>
              <details>
                <summary><b>8. Eat a balanced diet</b></summary>
                <p>Aim to eat a balanced diet with plenty of fruits, vegetables, lean protein, and whole grains.</p>
                </details>
                <details>
                  <summary><b>9. Take break</b></summary>
                  <p> Make sure to take breaks throughout the day to rest and recharge.<br>This can help prevent burnout and increase productivity.</p>
                  </details>
                  <details>
                    <summary><b>10. Seek professional help</b></summary>
                    <p>If you're struggling with your mental health, don't hesitate to seek professional help.<br>A therapist or counselor can provide support and guidance.</p>

  </details>
</div>
 <br>

 <div class="nextSection">
    Click below to know more about:
 </div><br>
  <a href="NextPage1.php" class="mythRealityHeading">Articles and blog posts on mental health topics.</a>
<br><br>
<br>


    <div class="chat-box" id="chat-box" data-user="">
      <div class="chat-header">
        <h3>Talk with Psychiatrist</h3>
        <a href="#" class="close-chat-link" id="close-chat">Close</a>
      </div>
      <div class="chat-messages">
        <!-- chat messages will be added here dynamically using JavaScript -->
      </div>
      <form class="chat-form">
        <input type="hidden" name="from_user" value="<?php echo $name; ?>">
        <input type="hidden" name="to_user" value="Psychiatrist">
        <input type="text" name="message" placeholder="Type your message here...">
        <input type="submit" value="Send" id="send-button">
      </form>
    </div>

    <script>
      // Get the chat messages div
var chatMessages = document.querySelector('.chat-messages');

// Get the chat form
var chatForm = document.querySelector('.chat-form');

// Add a submit event listener to the chat form
chatForm.addEventListener('submit', function(event) {
  // Prevent the default behavior of the form
  event.preventDefault();

  // Get the input fields for the from_user, to_user, and message
  var fromUserInput = chatForm.querySelector('input[name="from_user"]');
  var toUserInput = chatForm.querySelector('input[name="to_user"]');
  var messageInput = chatForm.querySelector('input[name="message"]');

  // Get the from_user and to_user values
  var fromUser = fromUserInput.value;
  var toUser = chatBox.getAttribute("data-user");
  var message = messageInput.value;

  // Create a new AJAX request to send the message to the server
  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'send_messages.php');
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  xhr.onload = function() {
    // Clear the message input field
    messageInput.value = '';
  };
  xhr.send('from_user=' + encodeURIComponent(fromUser) + '&to_user=' + encodeURIComponent(toUser) + '&message=' + encodeURIComponent(message));
});

// Poll the server for new messages every second
setInterval(function() {
  // Get the from_user and to_user names
  var fromUser = '<?php echo $name; ?>';
  var toUser = chatBox.getAttribute("data-user");

  // Create a new AJAX request to retrieve new messages from the server
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'get_messages.php?from_user=' + encodeURIComponent(fromUser) + '&to_user=' + encodeURIComponent(toUser));
  xhr.onload = function() {
    // Parse the JSON response
    var response = JSON.parse(xhr.responseText);

    // Clear the chat messages div
    chatMessages.innerHTML = '';

    // Add each message to the chat messages div
    response.forEach(function(message) {
      var messageElement = document.createElement('div');
      messageElement.classList.add('message');
      if (message.from_user === fromUser) {
        messageElement.classList.add('sent');
      } else {
        messageElement.classList.add('received');
      }
      messageElement.innerHTML = '<span class="sender">' + message.from_user + '</span> <span class="time">'  + message.timestamp + '</span><br>' + message.message;
      chatMessages.appendChild(messageElement);
    });
  };
  xhr.send();
}, 1000);

// Show and hide the chat box
var openChatLink = document.getElementById('open-chat-link');
var closeChatLink = document.getElementById('close-chat');
var chatBox = document.getElementById('chat-box');
openChatLink.addEventListener('click', function(event) {
  event.preventDefault();
  chatBox.style.display = 'block';
});
closeChatLink.addEventListener('click', function(event) {
  event.preventDefault();
  chatBox.style.display = 'none';
});
</script>
</body>
</html>