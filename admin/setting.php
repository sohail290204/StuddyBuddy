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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="settingdesign.css">
    <style>

    </style>
</head>

<body>
    <div id="main1">
        <header class="header" class="mainMenu">

            <nav class="nav">
                <a href="#" class="nav_logo">Studdy Buddy</a>

                <ul class="nav_items">
                    <li class="nav_item">
                        <a href="adminhome.php" class="nav_link">Home</a>
                        <a href="chat.php" class="nav_link">Chat Room</a>
                        <a href="notes.php" class="nav_link">Notes</a>
                        <a href="Schedule.php" class="nav_link">Your_Schedule</a>
                    </li>
                </ul>

                <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
            </nav>
        </header>
        <br><br><br> 
        <img id="bg" src="\images\pro.png">

        <div class="settings-container" id="settings-container">

            <div class="setting-option">
                <!-- <h2>Profile</h2> -->
                <?php
                require 'vendor/autoload.php';
                $m = ("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
                $client = new MongoDB\Client($m);

                $uname = $_SESSION["adminuname"];
                // Select a database
                $database = $client->selectDatabase('Syllabus');

                // Select a collection
                $collection = $database->selectCollection('admin');
                $filter = ['Username' => $uname];
                $document = $collection->findOne($filter);

                if ($document) {
                    $n = $document['Name'];
                    $u = $document['Username'];
                    $e = $document['Email'];
                    $p = $document['Phone_Number'];
                    $ee = $document['Subject'];


                    $_SESSION['Name'] = $n;
                    $_SESSION['Username'] = $u;
                    $_SESSION['Email'] = $e;
                    $_SESSION['Phone_Number'] = $p;
                    $_SESSION['Subject'] = $ee;
                }

                ?>
            </div><br>

            <div id="profile-container">

                <div id="user-details">
                    <h1>
                        <?php
                        echo " " . $_SESSION['name'] . " ";
                        ?>
                    </h1>
                    <p>Username: <?php
                                    echo " " . $_SESSION['Username'] . " ";
                                    ?></p>
                </div>

                <div id="contact-details">
                    <p>Email: <?php
                                echo " " . $_SESSION['email'] . " ";
                                ?></p>
                    <p>Phone: <?php
                                echo " " . $_SESSION['phonenumber'] . " ";
                                ?></p>
                    <p>Subject: <?php
                                echo " " . $_SESSION['Subject'] . " ";
                                ?></p>
                </div>
                <!-- <script>
                        function signout() {
                            // Add logic to sign out the user here

                            alert('You have been signed out.');
                            window.location.href = "logout.php";
                        }
                    </script> -->
            </div>
        </div>
    </div>
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