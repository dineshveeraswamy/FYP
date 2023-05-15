<!DOCTYPE html>

<html>
  <head>
    <title>Articles and Blogs</title>
    <link rel="stylesheet" type="text/css" href="article.css">
  </head>
  
  <body>
    <div class="navbar">
      <ul>
        <li><a href="welcome.php">Home</a></li>
        <li><a href="aboutus.php">About Us</a></li>
        <li><a href="#" id="open-chat-link">Talk with Psychiatrist</a></li>
        <li><p class="displayName"><b>
           <?php
  session_start();
  if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
    $score = $_SESSION['score'];
    echo "Welcome $name"; 
    }
?> 
</b></p></li>
<li>
   <?php
  echo " Your score is $score";
  ?> </li>
        <li>
          <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Log Out</button>
          </form>
        </li>
      </ul>
    </div>


<br>
<span class="cmtHead">Common Myths About Therapy-Debunked:</span><br><br>

<div class="mythRealityTable">
<table>
  <tr>
    <th>Sl.No</th>
    <th>Myth</th>
    <th>Reality</th>
        </tr>

<tr>
    <td>1</td>
  <td>Therapy is only for people with serious mental health issues.</td>
  <td>Therapy is beneficial for anyone who wants to improve their mental health, regardless of the severity of their issues. Therapy can help people with a wide range of concerns, from everyday stress and anxiety to more complex mental health conditions.</td>
        </tr>

        <tr>
        <td>2</td>
          <td>Therapy is a waste of time and money.</td>
          <td>Therapy can be a valuable investment in your mental health and well-being. Many people find that the benefits they gain from therapy far outweigh the costs.</td>
        </tr>

        <tr>
        <td>3</td>
          <td>Therapy is just talking to a stranger about your problems.</td>
          <td>While talking about your problems is certainly a part of therapy, it's not the only aspect. Therapy often involves developing new skills, coping strategies, and ways of thinking that can help you better manage your mental health.</td>
        </tr>

        <tr>
        <td>4</td>
          <td>Therapy is only effective if you have a good relationship with your therapist.</td>
          <td>While a good relationship with your therapist can certainly be helpful, it's not the only factor that determines the effectiveness of therapy. There are many evidence-based therapies that have been shown to be effective for a wide range of mental health issues, regardless of the therapeutic relationship.</td>
        </tr>

        <tr>
        <td>5</td>
          <td>Therapy is only for people who are weak or can't handle their problems on their own.</td>
          <td>Seeking help through therapy is a sign of strength, not weakness. It takes courage to acknowledge that you need help and take steps to improve your mental health. Therapy can provide valuable support and guidance to help you overcome challenges and improve your quality of life.</td>
        </tr>


</table>
</div>
<a class="next1" href="NextPage2.php">Next</a><br><br>


<div class="chat-box" id="chat-box">
      <div class="chat-header">
        <h3>Talk with Psychiatrist</h3>
        <a href="#" class="close-chat-link" id="close-chat">Close</a>
      </div>
      <div class="chat-messages">
        <!-- chat messages will be added here dynamically using JavaScript -->
      </div>
      <form class="chat-form">
        <input type="hidden" name="sender_id" value="1">
        <input type="text" name="message" placeholder="Type your message here...">
        <input type="submit" value="Send" id="send-button">
      </form>
    </div>
  
    <script>

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


var openChatLink = document.getElementById('open-chat-link');
  
      // Add a click event listener to the link
      openChatLink.addEventListener('click', function(event) {
        // Prevent the default behavior of the link
        event.preventDefault();
  
        // Show the chat box
        var chatBox = document.getElementById('chat-box');
        chatBox.style.display = 'block';
  
        // Show the chat box
        var chatBox = document.getElementById('chat-box');
        chatBox.style.display = 'block';

        var closeChatLink = document.getElementById('close-chat');
        closeChatLink.addEventListener('click', function(event) {
          event.preventDefault();
          var chatBox = document.getElementById('chat-box');
          chatBox.style.display = 'none';
        });
        });



      // Get the link to open the chat box
      var openChatLink = document.getElementById('open-chat-link');
  
      // Add a click event listener to the link
      openChatLink.addEventListener('click', function(event) {
        // Prevent the default behavior of the link
        event.preventDefault();
  
        // Show the chat box
        var chatBox = document.getElementById('chat-box');
        chatBox.style.display = 'block';

        var closeChatLink = document.getElementById('close-chat');
        closeChatLink.addEventListener('click', function(event) {
          event.preventDefault();
          var chatBox = document.getElementById('chat-box');
          chatBox.style.display = 'none';

        });
      });
  
      // Log out functionality
      var logOutForm = document.querySelector('form[action="logout.php"]');
      logOutForm.addEventListener('submit', function(event) {
        event.preventDefault()
        window.location.href = 'login.html';
      });
    </script>

  </body>
  </html>
