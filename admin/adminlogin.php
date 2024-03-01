<?php

session_start();
$_SESSION['first'] = "seventh";
?>

<?php
if (isset($_SESSION['login_error'])) {
    echo '<script>alert("' . $_SESSION['login_error'] . '");</script>';
    unset($_SESSION['login_error']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link rel="stylesheet" type="text/css" href="\frontend\logindesign.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Teacher Login Page</title>

</head>
<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>

<body>
    <!-- <img id="bg" src="\images\login_student.png"> -->
    <img class="wave" src="\images\wave.png">
    <div class="container">
        <div class="img">
            <img src="\images\bg.svg">
        </div>
        <div class="login-content">
            <br><br>
            <form class="login-form" action="reg.php" method="post">
                <img src="\images\avatar.svg">
                <h2 class="title"> Teacher Login</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" id="username" class="input" name="username" required>
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" id="password" class="input" name="password" required>
                    </div>
                </div>
                <input type="submit" class="btn" value="Login"><br>
                <div class="a">Don't have an account?<a href="adminregi.php">  Click Here!!</a></div>
            </form>
        </div>
    </div>
</body>
<script type="text/javascript" src="\frontend\main.js"></script>

</html>