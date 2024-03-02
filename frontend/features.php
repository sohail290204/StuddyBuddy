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
    <title>Premium Plan Features</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            text-align: center;
            padding: 0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        #main {
           
            background-color: rgba(0, 0, 0, 0.45);
        }

        #h {
            /* background-color: #333; */
            color: black;
            position: relative;
            top: 50px;
            text-align: center;
            padding: 20px;
        }

        section {
            max-width: 800px;
            margin: 20px auto;
            position: relative;
            top:20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        li {
            margin-bottom: 10px;
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
            color: black;
        }

        .nav_logo {
            font-size: 25px;
        }

        .nav_item {
            column-gap: 25px;
        }

        .nav_link:hover {
            color: blue;
        }

        .button {
            padding: 6px 24px;
            border: 2px solid black;
            background: transparent;
            border-radius: 6px;
            cursor: pointer;
        }

        .button:active {
            transform: scale(0.98);
        }

        .premium-btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .premium-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <!-- <div id="nav" class="mainMenu">
        <h4><a href="home.php">Home</a></h4>
        <h4><a href="logout.php">Sign Out</a></h4>
        <h4><a href="setting.php">Profile</a></h4>
    </div> -->
    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="home.php" class="nav_link">Home</a>
                    <a href="profile.php" class="nav_link">Profile</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>

    <div id='h'>
        <h1>Premium Plan Features</h1>
    </div>



    <section>
        <h2>Unlock Amazing Features with Premium</h2><br>
        <ul>
            <li>300 Days schedule for your preparation</li>
            <li>Public classsroom for chating and solving doubts with others</li>
            <li>Books from which you can prepare </li>
            <li>Daily mcq exams for preparation</li>
            <li>Ai based chatbot for doubt solving</li>
            <li>Multi-language support </li>
            <li>Detailed explaination of each topic</li>
            <li> A full Rest day on every 7th day of your schedule</li>
            <li>3 resource websites available for each topics</li>
            <li>Video explaination for each topic</li>
            <li>99+ PYQs</li>
            <li>Easy contact feature by which you can contact us for any technical difficulties</li>
            <!-- Add more features as needed -->
        </ul>

        <p>Upgrade now to enjoy these premium features!</p><br>
        <a href="https://rzp.io/l/RFKZMcZ99" class="premium-btn">Get Premium</a>
    </section>
    <br><br>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="script.js"></script>
    <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
    <script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>
</html>