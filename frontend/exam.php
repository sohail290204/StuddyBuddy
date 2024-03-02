<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: /admin/firstpage.php');
}

?>

<!DOCTYPE html>
<html>
<style>
    /* Resetting default margin and padding */
    * {
        margin: 0;
        padding: 0;
        color: #ffffff;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;

        /* Set your desired background color */
    }

    form {
        text-align: center;
        max-width: 600px;
        margin-left: 50px;
        margin-top: 80px;
        padding: 20px;
        background-color: transparent;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        display: block;
        margin-bottom: 10px;
        color: #ffffff;
        margin-top: 50px;
        font-size: 30px;
    }

    input {
        margin: 15px;
        font-weight: bold;
        border: 2px solid #D09367;
        border-radius: 20px;
        font-size: 15px;
        width: 80%;
        padding: 10px;
        text-align: center;
        background-color: transparent;
        color: #D09367;
        transition: background-color 0.3s ease, color 0.3s ease, width 0.3s ease;

    }

    input:hover {
        border: 2px solid #C6A18B;
        width: 85%;
        color: #C6A18B;

    }

    button {
        margin: 15px;
        margin-bottom: 50px;
        display: inline-block;
        font-size: 20px;
        width: 50%;
        color: #C6A18B;
        padding: 10px;
        border-radius: 24px;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s ease, color 0.3s ease, width 0.3s ease;
        /* Added width transition */
        background-color: transparent;
        border: 3px solid #C6A18B;
    }

    button:hover {
        border: 3px solid #d29767;
        width: 60%;
        color: #d29767;
    }

    #bg {
        width: 100%;
        height: 100%;
        object-fit: cover;
        position: fixed;
        z-index: -1;
        left: 0;
        top: 00;
        filter: blur(3px);
    }
</style>
<img id="bg" src="\images\exam.jpg">
<?php


if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

$d = $_SESSION['date'];
// echo "$d";

$done = $_SESSION['submit'];

if ($done == "done") {

    $_SESSION['submit'] = "h";
    header("Location:https://docs.google.com/forms/d/e/1FAIpQLSd-GldvUHxoIZh_wmLfwGUCufX4wuDzNpZGG0AruJ7b9tENJA/viewform?usp=sf_link");
} else {
    $_SESSION['first'] = "fifth";

    echo "<br><form action='register1.php' method='post'><label>Enter the topic of which u have given exam: </label> <input type='text' id='topic' name='topic' ><button id='exbt' type='submit'>Submit</button> </form>";
}
?>