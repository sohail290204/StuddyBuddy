<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
  header('Location: firstpage.php');
}

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="homedesign.css">

<div id="google_translate_element"></div>
<script type="text/javascript">
  function googleTranslateElementInit() {
    new google.translate.TranslateElement({
      pageLanguage: 'en'
    }, 'google_translate_element');
  }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" style="display: inline;"></script>

<body>
  <header class="header" class="mainMenu">

    <nav class="nav">
      <a href="#" class="nav_logo">Studdy Buddy</a>

      <ul class="nav_items">
        <li class="nav_item">
          <a href="home.php" class="nav_link">Home</a>
          <a href="Schedule.php" class="nav_link">Your_Schedule</a>
          <a href="chat.php" class="nav_link">Chat Room</a>
          <a href="notes.php" class="nav_link">Notes</a>
          <a href="profile.php" class="nav_link">Profile</a>
        </li>
      </ul>

      <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
    </nav>
  </header>

  <img src="\images\indianboywithlaptop.png" />
  <div id="main">
    <div id="page1">

      <?php
      $uname = $_SESSION["uname"];
      $_SESSION['first'] = "third";
      // $_SESSION['person'] = "student";
      $_SESSION['premium'] = "p";
      echo "<h1>Welcome $uname to Your Personalize Study Buddy!</h1>"
      ?>
      <p id="details">
        Study Buddy is an educational companion designed to enhance your learning experiences. It offers prepare study plans, exam preparation support, and many more features to help students excel in their academic journey.
      </p>
      <br /><br />

      <form action="premium.php" action="POST">
        <button class="custom-button">Lets Start</button>
      </form>
    </div>
    <div id="page2">
      <h2>JEE MAINS</h2>
      <br />
      <p id="lorem">
        Joint Entrance Examination (JEE) Main is a national-level engineering entrance exam in India. It is conducted by the National Testing Agency (NTA). JEE Main is the gateway for admission to various undergraduate engineering programs at top engineering institutes in India, including the Indian Institutes of Technology (IITs), National Institutes of Technology (NITs), and other Centrally Funded Technical Institutions (CFTIs). The exam assesses candidates' knowledge in Physics, Chemistry, and Mathematics and is an important step for students aspiring to pursue engineering careers.
      </p>
    </div>

    <div id="page3">
      <h2>Remember</h2>
      <br /><br>
      <p id="lorem">
        Believe in yourself and all that you are. Know that there is something inside you that is greater than any obstacle." - Christian D. Larson
      </p><br><br><br><br><br><br><br>
      <p id="lorem">
        Success is not final, failure is not fatal: It is the courage to continue that counts." - Winston Churchill
      </p><br><br><br><br><br><br><br>
      <p id="lorem">
        The only limit to our realization of tomorrow will be our doubts of today." - Franklin D. Roosevelt
      </p><br><br><br><br><br><br><br>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>

</body>

</html>