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
                    <a href="chat.php" class="nav_link">Chat Room</a>
                    <a href="Schedule.php" class="nav_link">Your_Schedule</a>
                    <a href="setting.php" class="nav_link">Profile</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <br> <br> <br> <br>
    <div style="text-align: center;">
        <div class="container">
            <label><b>Request Notifications</b></label>
            <div class="con"></div>
        </div>
    </div>
    <div style="text-align: center;">
        <div class="container">
            <form action='meet.php' method='post'>

                <label>Kindly choose the username of the student whose doubt you wish to answer</label><br><br>
                <input type="text" id="username" name="username" required><br>
                <span id='usernameError'></span><br>
                <input type="submit" id="submitBtn" disabled>
            </form>

        </div>
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

        // Initial button state check
        updateSubmitButtonState();
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>

</html>