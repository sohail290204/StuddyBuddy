<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}
?>
<?php
$uname = $_POST['username'];
$adminuname = $_SESSION['adminuname'];
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Social Media Profile</title>
    <style>

    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="meetdesign.css">
</head>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
} ?>

<body><img id="bg" src="\images\pro.png">
    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="adminhome.php" class="nav_link">Home</a>
                    <a href="Schedule.php" class="nav_link">Your_Schedule</a>
                    <a href="notes.php" class="nav_link">Notes</a>
                    <a href="setting.php" class="nav_link">Profile</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <div id="main1">
        <div id="profile-container">
            <!-- <img id="profile-picture" src="profile-picture.jpg" alt="Profile Picture"> -->

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

            <div id="chat-box">

                <h2>Chat with <?php echo "$uname"; ?></h2>
                <div class="container">
                    <div class="con"></div>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <textarea placeholder="Type your message..." id="msg"></textarea><br>
                        <button type="button" id="sub" >Send</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    var input = document.getElementById("msg");
    input.addEventListener("keypress", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("sub").click();
        }
    });

    $("#sub").click(function() {
        var chat = $("#msg").val();
        <?php $_SESSION['check'] = 'h' ?>
        $.post("chat1.php", {
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
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>

</html>