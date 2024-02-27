<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

?>

<!DOCTYPE html>
<html>

<head>
   
    <title>Registration 2</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .container {
            max-width: 400px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .form-group button:hover {
            background-color: #45a049;
        }

        /* Additional Styles for Google Translate */
        #google_translate_element {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
        }

        /* Styles for form elements */
        label {
            font-size: 16px;
            color: #333;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<?php

$_SESSION['first'] = "second";
?>
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
    <div class="container">
        <h2>Board and Standard Selection</h2>
        <form action="register1.php" method="POST">

            <label for="board">Board:</label><br>
            <select id="board" name='board' required>
                <option value>Select a board</option>
                <option value="CBSE">CBSE</option>
                <option value="ICSE">ICSE</option>
                <option value="Maharashtra Board">Maharashtra Board</option>
            </select><br><br>


            <label for="standard">Standard:</label><br>
            <select id="standard" name="standard" required>
                <option value>Select a standard</option>
                <option value="7th">7th</option>
                <option value="8th">8th</option>
                <option value="9th">9th</option>
                <option value="10th">10th</option>
                <option value="11th">11th</option>
                <option value="12th">12th</option>
                <option value="Graduation / Btech">Graduation / Btech</option>
                <option value="others">Others</option>
            </select><br><br>


            <label for="exam">Are you preparing for any exam?</label><br>
            <select id="exam" name="exam" required>
                <option value>Select an Exam</option>
                <option value="JEE mains">JEE mains</option>
            </select><br><br>
            <input type="submit" value="REGISTER">
        </form>
    </div>

</html>