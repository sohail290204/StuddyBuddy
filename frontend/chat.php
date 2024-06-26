<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
  header('Location: /admin/firstpage.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="chatdesign.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>
<script>
  // Smooth scroll animation using GSAP
  document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
      anchor.addEventListener('click', function(e) {
        e.preventDefault();

        document.querySelector(this.getAttribute('href')).scrollIntoView({
          behavior: 'smooth'
        });
      });
    });

    // GSAP ScrollTrigger for the animation
    gsap.registerPlugin(ScrollTrigger);

    gsap.to("#todays-topic", {
      opacity: 100, // Initial opacity
      scrollTrigger: {
        trigger: "#todays-topic",
        start: "top bottom", // Trigger animation when the top of the element reaches the bottom of the viewport
        end: "center center", // End the animation when the center of the element reaches the center of the viewport
        scrub: true, // Smooth scrubbing effect
      },
    });
  });
</script>

<body>
  <header class="header" class="mainMenu">

    <nav class="nav">
      <a href="#" class="nav_logo">Studdy Buddy</a>

      <ul class="nav_items">
        <li class="nav_item">
          <a href="home.php" class="nav_link">Home</a>
          <a href="Schedule.php" class="nav_link">Schedule</a>
          <a href="notes.php" class="nav_link">Notes</a>
          <a href="profile.php" class="nav_link">Profile</a>
          <a href="#msg" class="nav_link">ChatBox</a>
          <a href="#c" class="nav_link">Group Study</a>
          <!-- <a href="#list" class="nav_link">Teachers List</a> -->
        </li>
      </ul>

      <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
    </nav>
  </header>
  <div id="main">
    <img id="bg" src="\images\chatroom.png">
    <!-- <h2>Chat Messages</h2> -->
    <!-- <br><br> -->
    <div id="msgg">
      <div class="containerr">
        <div class="con" id="con"></div>
        <div id="tetx">
          <input id="msg" class="msg" name="msg" required>
          <!-- <input class="open" type="submit" name="sub" id="sub" > -->
          <button class="open" name="sub" id="sub"><i class="fas fa-paper-plane"></i></button>
        </div>
      </div>
    </div>
    <div id="c">
      <br><br> <br><br>
      <div class="c">
        <h4>Join the video room</h4>
        <button class="o"> <a href="https://meet.google.com/wvc-gobm-aen" target="_blank" Open>
            <div>Open</div>
          </a> </button>
      </div>
    </div> <br>

    <!-- <div class="container" id="c">
    <h4>List of student on our platform</h4>
    <?php
    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('UserDetails');

    ?>
  </div><br> -->
    <?php
    $_SESSION["first"] = "eight";
    echo "<form action='register1.php' method='post'>";

    echo '<div class="container1" id="t">';
    echo "<br>";

    echo "<label >Search for the username of the teacher you want</label><br><br>";
    echo '<input type="text" class="msg1" id="username" name="username" required><br>';
    echo " <span id='usernameError'></span><br>";
    echo "<br>";
    echo "<label>Enter your Doubt</label><br><br>";
    echo '<input type="text" class="msg1" id="topic" name="topic" required><br><br>';
    // echo '  <input type="submit"  id="submitBtn" class="open" disabled>';
    echo '<button id="submitBtn"  disabled>Submit </button>';
    echo " </form>";
    echo "<br><br> <br><br>";
    echo "</div>";
    echo "<div > <br> <br> <br> <br>";
    echo "</div>";
    echo '<div  class="container2">';

    echo "";
    echo "<div id='list' class='list'  style='color:white'><h1> List of teachers available with us </h1></div>";
    echo "";

    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('admin');
    $cursor = $collection->find();
    $foundDocuments = false;
    echo "<table><tr>";
    echo "<th>Teacher's Name</th>";
    echo "<th>Teacher's Userame</th>";
    echo "<th>Subject</th>";
    echo "</tr>";

    // Output specific data from documents using foreach directly on the cursor
    foreach ($cursor as $document) {
      $foundDocuments = true;
      echo "<tr>";
      echo "<td>" . $document['Name'] . "</td>";
      echo "<td>" . $document['Username'] . "</td>";
      echo "<td>" . $document['Subject'] . "</td>";
      // echo '<td> <a href="request.php" target="_blank" Open><div id="open">Open</div></a></td>';
      echo "</tr>";
    }

    echo "</table>";
    echo "<br>";
    echo "</div>";
    ?>
  </div>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      var scrollableDiv = document.getElementById("con"); // corrected ID to "con"
      scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
    });
  </script> -->
  <script>
    $(document).ready(function() {
      // Function to check if username is available
      function checkUsernameAvailability() {
        <?php $_SESSION['f'] = 'hello'; ?>
        let username = $("#username").val();
        $.post("usernamecheck1.php", {
          username: username
        }, function(data) {
          $("#usernameError").html(data);
          updateSubmitButtonState();
        });
      }

      function updateSubmitButtonState() {
        let usernameExists = $("#usernameError").text().includes("exists");
        let disableButton = usernameExists;
        $("#submitBtn").prop("disabled", disableButton);
      }

      // Bind the input event to check username availability
      $("#username").on("input", checkUsernameAvailability);

      // Update button state initially
      updateSubmitButtonState();
    });
  </script>



  <script type="text/javascript">
    var input = document.getElementById("msg");
    input.addEventListener("keypress", function(event) {
      if (event.key === "Enter") {
        event.preventDefault();
        document.getElementById("sub").click();
      }
    });


    $("#sub").click(function() {
      var chat = $("#msg").val();
      $.post("chat1.php", {
          text: chat
        },
        function(data, status) {
          document.getElementsByClassName('con')[0].innerHTML = data;
        });
      $("#msg").val("");
      return false;
    });

    setInterval(runFunction, 100);

    function runFunction() {
      $.post("chat3.php",
        function(data, status) {
          document.getElementsByClassName('con')[0].innerHTML = data;
        });
    }
  </script>

  <div id="google_translate_element"> </div>
  <script class="google_translate_element" type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en',

        autoDisplay: false,
        gaTrack: true,
      }, 'google_translate_element');
    }
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>

</html>