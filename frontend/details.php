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

    <title>Other Details for registration</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            /* padding: 20px; */
            background-color: #E4F4D8;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }


        .container {
            border-radius: 20px;
            text-align: center;
            display: flex;
            width: 85%;
            height: 600px;
            background-color: #FFFFFF;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .image-container {
            border-radius: 20px;
            right: 30px;
            left: -20px;
            flex: 1;
            position: relative;
            top: 20px;
            width: 300px;
            height: 550px;
            background: url('/images/details.png') center/cover no-repeat;
        }

        .form-container {
            flex: 1;
            padding: 50px;
            /* display: flex; */
            flex-direction: column;
            align-items: center;
        }



        .form-container h2 {
            text-align: center;
            color: #333;
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
            padding: 3px;
            border-radius: 5px;
            background-color: transparent;
            text-decoration: bold;
            text-align: center;

        }

        .s {
            width: 55%;
            border-radius: 10px;
            padding: 10px;
            margin-top: 8px;
            background-color: #EEECEC;
            text-align: center;
            /* border: 2px solid black; */
            box-sizing: border-box;
            transition: border 0.3s ease, width 0.3s ease;
            border: none;
        }

        .s:hover {
            border: 2px solid #4980A9;
            width: 57%;
        }



        input[type="submit"] {
            background-color: rgb(245,128,13);
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            cursor: pointer;
            width: 40%;
            font-size: 16px;
            transition: background-color 0.3s ease;
            transition: width 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color:#da8e43;
            width: 44%;
        }

        .d {
            width: 35%;
            padding: 15px;
            border-radius: 10px;
            /* Add border-radius */
        }

        .d:hover {
            background-color: #365D8D;
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
        <div class="form-container">
            <h2>Board and Standard Selection</h2><br><br>
            <form action="register1.php" method="POST">
                <div class="select-container">
                    <label for="board"><b>Board</b></label><br>
                    <select id="board" class='s' name='board' required>
                        <option class="d" value>Select a board</option>
                        <option class="d" value="CBSE">CBSE</option>
                        <option class="d" value="ICSE">ICSE</option>
                        <option class="d" value="Maharashtra Board">Maharashtra Board</option>
                    </select><br><br><br>
                </div>
                <div class="select-container">
                    <label for="standard"><b>Standard</b></label><br>
                    <select id="standard" class='s' name="standard" required>
                        <option class="d" value>Select a standard</option>
                        <option class="d" value="7th">7th</option>
                        <option value="8th">8th</option>
                        <option value="9th">9th</option>
                        <option value="10th">10th</option>
                        <option value="11th">11th</option>
                        <option value="12th">12th</option>
                        <option value="Graduation / Btech">Graduation / Btech</option>
                        <option value="others">Others</option>
                    </select><br><br><br>
                </div>
                <div class="select-container">
                    <label for="exam"><b>Are you preparing for any exam?</b></label><br>
                    <select id="exam" class='s' name="exam" required>
                        <option value>Select an Exam</option>
                        <option value="JEE mains">JEE mains</option>
                    </select><br><br><br>
                </div>
                <input type="submit" value="REGISTER">
            </form>
        </div>
        <div class="image-container"></div>

    </div>

</html>