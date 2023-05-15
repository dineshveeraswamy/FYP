<!DOCTYPE html>

<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="aboutus.css">
    <title>About Us</title>
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
  ?> 
  </li>
        <li>
          <form action="logout.php" method="post">
            <button type="submit" class="logout-btn">Log Out</button>
          </form>
        </li>
      </ul>
    </div>
<!-- *********************************  #any body content to be typed here.... ********************************-->
<div class="container">
<div class="image">
<img src="image.jpg" srcset="image.jpg">
</div>
<div class="text">
  <p><div class="heading"><h3>About Us:</h3></div>

  <p>Talk With Psychiatrist is a space for mental health support and resources. Our goal is to provide a safe and inclusive community where individuals can access the tools they need to prioritize their mental well-being.

    We believe that mental health is just as important as physical health, and we are committed to destigmatizing mental health concerns by providing education, resources, and support.
    <br>
    <h3><b>Our website offers a variety of resources, including:</b></h3>
    <ul>
    <li>Articles and blog posts on mental health topics.</li><br>
    <li>Self-care tips and techniques.</li><br>
    <li>Resources for finding mental health professionals and treatment options.</li><br>
    <li>An anonymous forum for discussing mental health concerns with a professional psychiatrist.</li>
  </ul>
    <br>
    We understand that seeking help for mental health concerns can be daunting, but we hope to provide a welcoming space where individuals can find the support they need.</p>
  </div>
  <hr>
</div>   
<div class="container2">
    <div class="aboutus-content">
   <p><div class="heading"><h3>Purpose:</h3></div>
  We are a team of mental health advocates and professionals dedicated to 
  providing a safe and supportive online community for individuals seeking resources and support for their mental health concerns.</p>

<p><div class="heading"><h3><b>Mission:</b></h3></div>
  <ul>
  <li>Our mission is to break down the stigma surrounding mental health and provide accessible resources for individuals to improve their mental well-being.</li> <br>
  <li>We believe that everyone deserves access to the tools they need to prioritize their mental health and that everyone's journey to mental wellness is unique.</li><br>
  <li>Our team consists of mental health professionals, writers, and individuals with lived experience who are passionate about making a positive impact in the mental health space. </li><br>
  <li>Together, we work to create informative and engaging content, provide a supportive forum for individuals to share their experiences, and connect people with the resources they need to seek help.</li>
  </ul><br>  
We understand that navigating the mental health system can be challenging, and we are committed to making the journey easier for everyone. <br> 
</div><br></div>
<div class="lastline">
  <hr>
    If you have any questions or feedback, please do not hesitate to reach out to us. We are here to support you every step of the way.</p>
    Contact us: &nbsp;&nbsp;<i class="fa fa-envelope" style="font-size:14px"></i>
    &nbsp;E-mail Id: talkwithpsychiatrist@gmail.com<br><br>
  </div>






    
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
 // Get the chat messages div
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
  
      // Log out functionality
      var logOutForm = document.querySelector('form[action="logout.php"]');
      logOutForm.addEventListener('submit', function(event) {
        event.preventDefault()
        window.location.href = 'login.html';
      });
    </script>
  
  </body>
  </html>