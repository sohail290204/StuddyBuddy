<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
  header('Location: firstpage.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="chatdesign.css">
</head>

<body>
  <header class="header" class="mainMenu">

    <nav class="nav">
      <a href="#" class="nav_logo">Studdy Buddy</a>

      <ul class="nav_items">
        <li class="nav_item">
          <a href="adminhome.php" class="nav_link">Home</a>
          <a href="Schedule.php" class="nav_link">Your_Schedule</a>
          <a href="notes.php" class="nav_link">Notes</a>
          <a href="setting.php" class="nav_link">Profile</a>
        </li>
      </ul>

      <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
    </nav>
  </header>
  <img id="bg" src="\images\chatroom.png">
  <h2>Chat Messages</h2>

  <div class="container">
    <div class="con"></div>
    <input id="msg" class="msg" name="msg">
    <input class="open" type="submit" name="sub" id="sub">
  </div>
  <br><br>
  <div class="container" id="c">
    <h4>Join the video room</h4>
    <a href="https://meet.google.com/wvc-gobm-aen" target="_blank" Open>
      <div class="open" id="open">Open</div>
    </a>
  </div> <br>
  <?php
  ?>
  <br> <br><br>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <?php $_SESSION['f'] = 'hello' ?>

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

  <div id="google_translate_element"></div>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en'
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