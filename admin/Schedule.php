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
    <title>Display SQL Table</title>
    <style>
        * {

            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        a {
            text-decoration: none;
            color: antiquewhite;
        }

        .header {
            position: fixed;
            height: 80px;
            width: 100%;
            z-index: 100;
            padding: 0 20px;
            margin: 0px -20px;
            justify-content: flex-start;
        }

        .nav {
            padding: 0 120px;
            z-index: 999;
            width: 105%;

        }

        .nav,
        .nav_item {
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: space-between;
        }

        .nav_logo,
        .nav_link,
        .button {
            color: #fff;
        }

        .nav_logo {
            font-size: 25px;
        }

        .nav_item {
            column-gap: 25px;
        }

        .nav_link:hover {
            color: #d9d9d9;
        }

        .button {
            padding: 6px 24px;
            border: 2px solid #fff;
            background: transparent;
            border-radius: 6px;
            cursor: pointer;
        }

        .button:active {
            transform: scale(0.98);
        }

        #m {
            color: black;
            /* background-color: rgba(0, 0, 0, 0.8); */
        }

        body {
            background-color: #9440EF;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            text-align: center;
        }

        table {
            -webkit-text-stroke: 0.1px black;
            border-radius: 24px;
            /* border-collapse: collapse; */
            width: 80%;
            border-collapse: separate;
            border-spacing: 5px;
            margin: 20px auto;
            color: black;
            /* background-color: transparent;
            box-shadow: 0 0 10px rgba(2, 0, 0, 0.8); */
        }

        th,
        td {
            color: black;
            /* box-shadow: 0 0 10px rgba(2, 0, 0, 0.8); */
            /* border: 0.5px solid black; */
            padding: 12px;
            margin: 10px;
            text-align: center;

            /* Center the text in table cells */
        }

        th {
            color: black;
            padding: 15px;
            border-radius: 30px;
            background-color: rgb(175,183,227);

        }

        h1 {
            color: black;
            text-align: center;
            -webkit-text-stroke: 0.3px black;
        }

        #google_translate_element {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;


        }

        .container {
            margin-left: 80px;

            padding-top: 50px;
            border-radius: 30px;
            margin-right: 80px;
            background-color: white;
        }

        #bg {
            height: 100%;
            width: 100%;
            /* object-fit: contain; */
            position: fixed;
            left: 0;
            z-index: -1;
            filter: blur(3px);
        }

        .td {

            background-color: #E0E0E8;
            margin-bottom: 20px;
            border-radius: 30px;
        }
    </style>
    </style>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
    <!-- <div id="nav">
    <h4><a href="home.php">Home</a></h4>
    <h4><a href="Schedule.php">Schedule</a></h4>
    <h4><a href="notes.php">Notes</a></h4>
    <h4><a href="logout.php">SignOut</a></h4>
    <h4><a href="setting.php">Profile</a></h4>
    </div> -->

    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="adminhome.php" class="nav_link">Home</a>
                    <a href="chat.php" class="nav_link">Chat Room</a>
                    <a href="notes.php" class="nav_link">Notes</a>
                    <a href="setting.php" class="nav_link">Profile</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header> 
    <div id="main">
        <br><br> <br><br> <br><br>
        <div class="container">
            <h1>300 Days Preparation Timetable</h1>
            <?php

            require 'vendor/autoload.php';
            $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
            $database = $client->selectDatabase('Syllabus');
            $collection = $database->selectCollection('Timetable');
            $cursor = $collection->find();
            $foundDocuments = false;
            echo "<table  class='table'><tr  class='tr'>";
            echo "<th  class='th'>Days</th>";
            echo "<th  class='th'>Subject</th>";
            echo "</tr>";

            // Output specific data from documents using foreach directly on the cursor
            foreach ($cursor as $document) {
                $foundDocuments = true;
                echo "<tr  class='tr'>";
                echo "<td class='td'>" . $document['Days '] . "</td> ";
                echo "<td  class='td'> " . $document['Subject'] . "</td> ";
                echo "</tr> ";
            }

            echo "</table>";

            // Check if there were no documents
            if (!$foundDocuments) {
                echo "<p>No results found</p>";
            }
            ?>
        </div><br><br> <br><br>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>

</html>