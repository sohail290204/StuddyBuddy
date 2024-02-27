<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}
?>

<?php
// $uname = $_POST['uname'];
$uname = $_SESSION['uname'];
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
$database = $client->selectDatabase('Syllabus');
$collection = $database->selectCollection('UserDetails');
$filter = ['Username' => $uname];
$document = $collection->findOne($filter);

if ($document) {
    $name = $document['Name'];
    $phonenumber = $document['Phone_Number'];
    $email = $document['Email'];
    $exam = $document['Exam'];
    $board = $document['Board'];
    $standard = $document['Standard'];

    $_SESSION['studentuname'] = $uname;
    $_SESSION['name'] = $name;
    $_SESSION['phonenumber'] = $phonenumber;
    $_SESSION['email'] = $email;
    $_SESSION['board'] = $board;
    $_SESSION['exam'] = $exam;
    $_SESSION['standard'] = $standard;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="profiledesign.css">
    <title>Social Media Profile</title>
    <style>

    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<img id="bg" src="\images\pro.png">

<body>

    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="home.php" class="nav_link">Home</a>
                    <a href="Schedule.php" class="nav_link">Your_Schedule</a>
                    <a href="notes.php" class="nav_link">Notes</a>
                    <a href="chat.php" class="nav_link">Chat Room</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <div id="main1">
        <div id="profile-container">
            <!-- <img id="profile-picture" src="profile-picture.jpg" alt="Profile Picture"> -->
            <br>
            <div id="user-details">
                <h1>
                    <?php
                    echo "$uname";
                    ?>
                </h1>
                <p>Name: <?php
                            echo " " . $_SESSION['name'] . " ";
                            ?></p>
            </div>

            <div id="contact-details">
                <p>Email: <?php
                            echo " " . $_SESSION['email'] . " ";
                            ?></p>
                <p>Phone: <?php
                            echo " " . $_SESSION['phonenumber'] . " ";
                            ?></p>
            </div>


            <?php
            // Check if the form is submitted echo isset($_SESSION['stu']) ? $_SESSION['stu'] : ''; 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST["username"];
                $_SESSION['stu'] = $username;
            }
            ?>
            <form id="chatForm">
                <label>Search for the username of the teacher you want to message</label><br><br>
                <input type="text" id="username" name="username" required><br>
                <span id='usernameError'></span><br>
                <input type="button" id='submitBtn' value="Submit" onclick="toggleDiv()">
            </form>
            <br><br>


            <div id="chat-box" style="display: none;">
                <h2>Chat with <?php echo isset($_SESSION['stu']) ? $_SESSION['stu'] : ''; ?></h2>
                <div class="container">
                    <div class="con"></div>
                    <form method="post" action="">
                        <textarea placeholder="Type your message..." id="msg" required></textarea>
                        <!-- <input type="text" placeholder="Type your message..." id="msg" required> -->
                        <span id='m'></span><br><br>
                        <button type="button" id="sub" disabled>Send</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</body>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var scrollableDiv = document.getElementById("con"); // corrected ID to "con"
        scrollableDiv.scrollTop = scrollableDiv.scrollHeight;
    });
</script>
<script>
    function checkDataAndEnableButton() {
        try {
            const updateButtonStatus = async () => {
                const response = await fetch('checkmsg.php');
                const status = await response.text();

                if (status === 'enabled') {
                    document.getElementById('sub').removeAttribute('disabled');
                }
            };

            // Run initially
            updateButtonStatus();

            // Check every 1 second
            setInterval(updateButtonStatus, 1000);
        } catch (error) {
            console.error(error);
        }
    }

    checkDataAndEnableButton();
</script>
<script>
    function toggleDiv() {
        var inputValue = document.getElementById("username").value;
        var div = document.getElementById("chat-box");

        if (inputValue !== "") {
            // Use AJAX to send the username to the server
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Update the chat box and disable the input
                    div.style.display = "block";
                    document.getElementById("username").disabled = true;
                    setTimeout(scrollToChatBox, 300);
                }
            };
            xhr.send("username=" + inputValue);

        }
        scrollToChatBox();
    }

    function scrollToChatBox() {
        var element = document.getElementById("chat-box");
        element.scrollIntoView({
            behavior: "smooth"
        });
    }
</script>
<script type="text/javascript">
    var input = document.getElementById("username");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("submitBtn").click();
        }
    });

    $("#sub").click(function() {
        var chat = $("#msg").val();
        <?php $_SESSION['check'] = 'h' ?>
        $.post("meet2.php", {
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
        <?php $_SESSION['check'] = 'h' ?>
        $.post("meet1.php",
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
<script>
    $(document).ready(function() {
        <?php $_SESSION['f'] = 'hello' ?>
        // Function to check if username is available
        function checkUsernameAvailability() {
            let username = $("#username").val();
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>

</html>