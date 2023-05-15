<!DOCTYPE html>

<html>
  <head>
    <title>Articles and Blogs</title>
    <link rel="stylesheet" type="text/css" href="content2.css">
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
<div class="heading">
How to Manage Stress and Anxiety in the Workplace ?
</div>
<br><br>
<details>
<summary><b>Identify the source of your stress</b></summary><br>
    <div class="list">
        <li>Try to pinpoint the specific factors that are causing you stress and anxiety.</li>
    <li>This could be anything from a heavy workload to difficult coworkers or a long commute.</li><br>
    </div>
    </details>

   <details> 
<summary>Practice self-care</summary><br>
<div class="list">
<li>Take care of your physical and emotional well-being by getting enough sleep, eating a healthy diet, and engaging in regular exercise.</li>
<li>Taking breaks throughout the workday and doing activities you enjoy outside of work can also help reduce stress.</li><br>
</div>
</details>

<details>
<summary>Prioritize and organize your workload</summary><br>
<div class="list">
<li>Break down your tasks into smaller, more manageable steps and prioritize them based on their level of importance.</li>
<li>This can help you feel more in control of your workload and reduce feelings of overwhelm.</li><br>
</div>
</details>


<details>
<summary>Set boundaries</summary> <br>
<div class="list">
<li>Establish clear boundaries between work and personal time to avoid burnout.</li>
<li>Try to disconnect from work emails and phone calls outside of work hours and avoid overworking yourself.</li><br>
</div>
</details>

<details>
<summary>Practice relaxation techniques</summary><br>
<div class="list">
<li>Incorporate relaxation techniques such as deep breathing, meditation, or yoga into your daily routine to help you manage stress and anxiety.</li><br>
</div>
</details>


<details>
<summary>Seek support</summary><br>
<div class="list">
<li>Talk to a trusted coworker, friend, or family member about your feelings.</li>
<li>If your stress and anxiety are interfering with your ability to function, consider talking to a mental health professional.</li><br>
</div>
</details>

<br><br>

<div class="heading">
Why Self-Care is Important for Mental Health and How to Practice It  ?
</div><br><br>

<details>
<summary>Reduces stress</summary><br>
<div class="list">
<li>Taking care of yourself can help reduce stress and anxiety, which are significant contributors to poor mental health.</li><br>
</div>
</details>

<details>
<summary>Improves mood</summary><br>
<div class="list">
<li>Engaging in activities that you enjoy can help improve your mood and increase feelings of happiness.</li><br>
</div>
</details>


<details>
<summary>Boosts self-esteem</summary><br>
<div class="list">
<li>Self-care can improve your sense of self-worth and confidence, which can lead to greater satisfaction with life.</li><br>
</div>
</details>


<details>
<summary>Helps prevent burnout</summary><br>
<div class="list">
<li>By prioritizing your own needs and taking time to recharge, you can avoid burnout and maintain a healthy work-life balance.</li><br>
</div>
</details>

<hr><br>

<div class="heading2">
Breaking the Stigma: The Importance of Seeking Mental Health Treatment.
</div><br>

<div class="stigmaTable">
<table>
 
<tr>
    <td>1.</td>
<td>Mental health issues are common</td>
<td>Mental health issues are prevalent, and seeking treatment is nothing to be ashamed of. In fact, it's estimated that one in four people will experience a mental health issue in their lifetime.</td>
</tr>

<tr>
    <td>2.</td>
<td>Treatment is effective</td>
<td>There are many evidence-based treatments for mental health issues that have been shown to be effective in improving mental health and overall quality of life.</td>
</tr>

<tr>
<td>3.</td>
    <td>Seeking treatment is a sign of strength</td>
    <td>Recognizing that you need help and seeking treatment is a sign of strength, not weakness.</td>
</tr>

<tr>
    <td>4.</td>
<td>Treatment can prevent further issues</td>
<td>Left untreated, mental health issues can worsen and lead to other problems in various areas of life, such as work, relationships, and physical health.</td>
</tr>
</table>
</div>
<br><br><hr><br><br>

  <div class="heading3">The Link Between Exercise and Mental Health</div><br>

  <details>
    <summary>Reducing symptoms of depression and anxiety</summary><br>
    <div class="list">
    <li>Exercise has been shown to be an effective treatment for depression and anxiety.</li>
    <li>Regular exercise can increase the release of endorphins, which are natural mood-boosters.</li><br>
    </div>
  </details>

  <details>
    <summary>Improving self-esteem</summary><br>
    <div class="list">
    <li>Exercise can improve self-esteem and self-confidence, leading to greater satisfaction with life.</li><br>
</details>

<details>
    <summary>Reducing stress</summary><br>
    <div class="list">
    <li>Exercise has been shown to reduce stress and improve the body's ability to handle stress.</li><br>
</details>

<details>
<summary>Enhancing brain function</summary><br>
<div class="list">
<li>Exercise can improve cognitive function and memory, leading to better overall mental performance.</li><br>
</details>

<details>
<summary>Increasing social interaction</summary><br>
<div class="list">
<li>Exercise can provide opportunities for social interaction and support, leading to greater feelings of connectedness and social support.</li><br>
</details><br><br>


  <div class="tips-heading">Here are some tips for incorporating exercise into your routine for better mental health:</div><br>


  <details>
 <summary>Start small</summary><br>
 <div class="list">
 <li>Begin with short, easy workouts and gradually increase the duration and intensity of your workouts.</li><br>
  </details>

  <details>
  <summary>Choose activities you enjoy</summary><br>
  <div class="list">
  <li>Find activities that you enjoy and that fit into your lifestyle.</li>
  <li>This will make it easier to stick to your exercise routine.</li><br>
</details>

    <details>
    <summary>Set realistic goals</summary><br>
    <div class="list">
    <li>Set achievable goals and track your progress.</li>
    <li>This can help you stay motivated and on track.</li><br>
</details>

<details>
<summary>Make exercise a habit</summary><br>
<div class="list">
<li>Incorporate exercise into your daily routine by scheduling it into your calendar</li>
<li>Find ways to be active throughout the day.</li><br>
</details>

<details>
<summary>Find support</summary><br>
<div class="list">
<li>Join a fitness class or find a workout buddy to provide motivation and accountability.</li><br>
</details>

<br><br>
<a class="back" href="NextPage1.php">Back</a><br><br>

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
