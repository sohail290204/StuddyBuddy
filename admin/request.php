<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

?>
<!DOCTYPE html>
<html>
<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<head>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="requestdesign.css">
</head>

<body>
    <img id="bg" src="\images\request.png">
    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="adminhome.php" class="nav_link">Home</a>
                    <a href="#main-container" class="nav_link">Request</a>
                    <a href="#container1" class="nav_link">Search Students</a>
                    <a href="Schedule.php" class="nav_link">Schedule</a>
                    <a href="setting.php" class="nav_link">Profile</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <div id="main">
        <br> <br> <br> <br>
        <div style="text-align: center;">
            <div id="containerr" class="containerr">
                <label><b>Request Notifications</b></label><br>
                <div class="con"></div>
            </div>
        </div>
        <div style="text-align: center;">
            <div id="container1" class="container1">
                <div class="login-content">
                    <form action='meet.php' class="login-form" method='post'>
                        <div class="input-div one">
                            <div class="div">
                                <h5>Kindly choose the username of the student whose doubt you wish to answer</h5>
                                <input type="text" id="username" class="input" name="username" required><br>
                            </div>
                        </div>
                        <span id='usernameError'></span><br><br>
                        <input type="submit" id="submitBtn" disabled>
                    </form>

                </div>
            </div>
        </div><br> <br>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<script>
    $(document).ready(function() {

        // Function to check if username is available
        function checkUsernameAvailability() {
            let username = $("#username").val();

            <?php $_SESSION['f'] = 'h' ?>
            $.post("usernamecheck1.php", {

                username: username
            }, function(data) {

                $("#usernameError").html(data);
                // Enable or disable the submit button based on validation results
                updateSubmitButtonState();

            });
           

        }

        // Function to check if passwords match

        // Function to update the submit button state based on validation results
        function updateSubmitButtonState() {
            // let passwordMatch = $("#passwordError").text().trim() === "";
            let usernameExists = $("#usernameError").text().includes("exists");
            let disableButton = usernameExists;
            $("#submitBtn").prop("disabled", disableButton);
          
        }

        // Event listeners for input fields
        $("#username").on("input", checkUsernameAvailability);
        // $("#reenterpassword").on("input", checkPasswordMatch);
        // emplty();
        // Initial button state check
        updateSubmitButtonState();
   
        // function emplty() {
        //     $("#username").val("");
        // }
    });
</script>

<script type="text/javascript">
    setInterval(runFunction, 1000);

    function runFunction() {
        $.post("fetchNotifications.php",
            function(data, status) {
                document.getElementsByClassName('con')[0].innerHTML = data;
            });
    }
</script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script type="text/javascript" src="main.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>

</html>