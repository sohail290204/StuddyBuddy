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

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<body>
    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="adminhome.php" class="nav_link">Home</a>
                    <a href="Schedule.php" class="nav_link">Schedule</a>
                    <a href="notes.php" class="nav_link">Notes</a>
                    <a href="setting.php" class="nav_link">Profile</a>
                    <a href="request.php" class="nav_link">Request</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>

    <img src="\images\indianboywithlaptop.png" />
    <div id="main">
        <div id="page1">

            <?php
            $adminuname = $_SESSION["adminuname"];
            // $_SESSION['first'] = "third";

            // $_SESSION['person'] = "admin";
            echo "<h1>Welcome $adminuname , We welcome you as an mentor/teacher on our platform</h1>"
            ?>
            <p id="details">
                Study Buddy is an educational companion designed to enhance your learning experiences. It offers prepare study plans, exam preparation support, and many more features to help students excel in their academic journey.
            </p>
            <br /><br />

            <form action="chat.php" action="POST">
                <button class="custom-button">Help Students Out</button>
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
        <script>
            window.botpressWebChat.init({
                "composerPlaceholder": "Chat with bot",
                "botConversationDescription": "This chatbot was built surprisingly fast with Botpress",
                "botId": "38628bbc-dceb-422d-8790-bab1ef048274",
                "hostUrl": "https://cdn.botpress.cloud/webchat/v1",
                "messagingUrl": "https://messaging.botpress.cloud",
                "clientId": "38628bbc-dceb-422d-8790-bab1ef048274",
                "webhookId": "8c140d3c-7b05-456e-9089-240df6f0d6ac",
                "lazySocket": true,
                "themeName": "prism",
                "stylesheet": "https://webchat-styler-css.botpress.app/prod/cd5e5920-0cc0-48ba-91da-21a2ae294fd3/v92597/style.css",
                "frontendVersion": "v1",
                "showPoweredBy": true,
                "theme": "prism",
                "themeColor": "#2563eb"
            });
        </script>
</body>

</html>