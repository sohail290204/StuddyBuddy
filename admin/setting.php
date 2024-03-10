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
    <link rel="stylesheet" href="/frontend/profiledesign.css">
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
                        <a href="request.php" class="nav_link">Request</a>
                        <a href="Schedule.php" class="nav_link">Your_Schedule</a>
                    </li>
                </ul>

                <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
            </nav>
        </header>
        <!-- <br><br><br> -->
        <img id="bg" src="\images\profile.png">

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
                    $ex = $document['Experience'];


                    $_SESSION['Name'] = $n;
                    $_SESSION['Username'] = $u;
                    $_SESSION['Email'] = $e;
                    $_SESSION['Phone_Number'] = $p;
                    $_SESSION['Subject'] = $ee;
                    $_SESSION['Experience'] = $ex;
                }

                ?>
            </div><br>
            <div id="main1">
                <div id="profile-container1">
                    <!-- <img id="profile-picture" src="profile-picture.jpg" alt="Profile Picture"> -->
                    <br>
                    <div id="user-detail">
                        <h1><?php
                            echo "<span style='color:rgb(230, 114, 33)'> " . $_SESSION['Name'] . "</span> ";
                            ?></h1>
                        <p class="uname">@
                            <?php
                            echo "$uname";
                            ?>
                        </p>

                    </div>

                    <div id="contact-detail" class="contact-detail">
                        <p>Email: <?php
                                    echo " " . $_SESSION['Email'] . " ";
                                    ?></p>
                        <p>Phone: <?php
                                    echo " " . $_SESSION['Phone_Number'] . " ";
                                    ?></p>
                        <p>Subject: <?php
                                    echo " " . $_SESSION['Subject'] . " ";
                                    ?></p>
                        <p>
                            Experience: <?php
                                        echo " " . $_SESSION['Experience'] . " ";
                                        ?></p>
                    </div>


                    <?php
                    // Check if the form is submitted echo isset($_SESSION['stu']) ? $_SESSION['stu'] : ''; 
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $username = $_POST["username"];
                        $_SESSION['stu'] = $username;
                    }
                    ?>
                    <!-- <form id="chatForm" class="chatForm">
                        <label>Search for the username of the teacher you want to message</label><br><br>
                        <input type="text" id="username" name="username" required><br>
                        <span id='usernameError'></span><br>
                        <input type="button" id='submitBtn' value="Submit" onclick="toggleDiv()" disabled>
                    </form>
                    <br><br> -->

                </div>

                <!-- <div id="icon">

            </div> -->
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