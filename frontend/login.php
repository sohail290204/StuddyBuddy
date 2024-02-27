<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login Page</title>
    <!-- <link rel="stylesheet" href="design.css"> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
            /* Change from center to flex-start */
            min-height: 100vh;
        }

        .login-container {
            position: fixed;
            color: #ddd;
            background-color: rgba(0, 0, 0, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 60px;
            border-radius: 24px;
            width: 450px;
            height:400px;
            max-width: 480px;
            max-height:420px;
            text-align: center;
            margin-left: 50px;
            /* Add margin-left for spacing */
        }

        #bg {
            width: 100%;
            height: auto;
            object-fit: cover;
            position: fixed;
            z-index: -1;
            filter: blur(3px);
        }

        .login-container h2 {
            color: #ddd;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            color: #ddd;
            margin-bottom: 5px;
        }

        .form-group input {
            border: 2px solid #9D6648;
            text-align: center;
            padding: 10px;
            color: #ddd;
            background-color: rgba(0, 0, 0, 1);
            border-radius: 24px;
            width: 100%;
        }

        .form-group button {
            font-size: 17px;
            padding: 10px 22px;
            width: 100%;
            border-radius: 20px;
            background: transparent;
            color: antiquewhite;
            border: 2px solid #9D6648;
            cursor: pointer;
            transition: background 0.3s ease, padding 0.3s ease, border 0.3s ease;
        }

        .form-group button:hover {
            background: black;  
            padding: 10px 30px;
            border: 2px solid #c59479;
        }

        a {
            text-decoration: none;
            color: antiquewhite;
        }

        #google_translate_element {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
        }

        @media (max-width: 768px) {
            .login-container {
                width: 80%;
            }
        }
    </style>
</head>
<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

<body>
    <?php
    session_start();
    $_SESSION['first'] = "fourth";
    ?>

    <?php
    if (isset($_SESSION['login_error'])) {
        echo '<script>alert("' . $_SESSION['login_error'] . '");</script>';
        unset($_SESSION['login_error']);
    }
    ?>
    <img id="bg" src="\images\login_student.png">
    <div class="login-container">
        <h2> Student Login</h2>
        <br><br>
        <form class="login-form" action="register1.php" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div><br>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <div>Don't have an account? <a href="register.php">Click Here!!</a></div>
        </form>
    </div>

</body>

</html>