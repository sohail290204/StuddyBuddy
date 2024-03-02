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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="settingdesign.css">
    <style>

    </style>
</head>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const themeDropdown = document.getElementById('theme');
        const settingsContainer = document.querySelector('.settings-container');

        themeDropdown.addEventListener('change', function() {
            const selectedTheme = themeDropdown.value;
            document.body.className = selectedTheme + '-theme';
            settingsContainer.className = 'settings-container ' + selectedTheme + '-theme';
            theme.className = 'theme ' + selectedTheme + '-theme';
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
                    <a href="chat.php" class="nav_link">Chat Room</a>
                    <a href="notes.php" class="nav_link">Notes</a>
                    <a href="profile.php" class="nav_link">Profile</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <br><br><br>
    <h1>Settings</h1>

    <div class="settings-container" id="settings-container">

        <!-- Profile Section -->
        <div class="setting-option">
            <h2>Profile</h2>
            <?php
            require 'vendor/autoload.php';
            $m = ("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
            $client = new MongoDB\Client($m);

            $uname = $_SESSION["uname"];
            // Select a database
            $database = $client->selectDatabase('Syllabus');

            // Select a collection
            $collection = $database->selectCollection('UserDetails');
            $filter = ['Username' => $uname];
            $document = $collection->findOne($filter);

            if ($document) {
                $n = $document['Name'];
                $e = $document['Email'];
                $p = $document['Phone_Number'];
                $ee = $document['Exam'];
                $b = $document['Board'];

                echo "<label for='username'>Username: $uname</label>";
                echo "<label for='Name'>Name: $n</label>";
                echo "<label for='Email'>Email: $e</label>";
                echo "<label for='Phone_Number'>Phone Number: $p</label>";
                echo "<label for='Exam'>Exam: $ee</label>";
                echo "<label for='Board'>Board: $b</label>";
            } else {
                echo "No data found for username $uname";
            }


            ?>
        </div><br>
        <hr>
        <br><br>
        <!-- Light/Dark Mode Section -->

        <div class="setting-option">
            <h2>Theme</h2>
            <label for="theme">Select Theme:</label>
            <select id="theme" class="theme" name="theme">
                <option value="light">Light</option>
                <option value="dark">Dark</option>
            </select>
        </div><br>
        <hr>
        <br><br>
        <!-- About Us Section -->
        <div class="setting-option">
            <h2>About Us</h2>
            <p>This is a brief description about our website and its purpose.</p>
        </div><br>
        <hr>
        <br><br>
        <!-- Contact Us Section -->
        <div class="setting-option">
            <h2>Contact Us</h2>
            <p>If you have any questions or concerns, feel free to contact us at support@example.com.</p>
        </div><br>
        <hr>
        <br>
        <!-- Signout Button -->
        <div class="setting-option">
            <button onclick="signout()">Sign Out</button>
        </div>
    </div>

    <script>
        function signout() {
            // Add logic to sign out the user here

            alert('You have been signed out.');
            window.location.href = "logout.php";
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