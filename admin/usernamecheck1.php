<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    $username = $_POST["username"];
    session_start();
    $f = $_SESSION['f'];

    // Perform MongoDB check for username availability (replace with your MongoDB logic)
    if ($f == 'h') {
        $usernameExists1 = checkUsernameExists1($username);
        if ($usernameExists1) {
        } else {
            echo "<span style='color: red;'>NO teacher exists with this username</span>";
        }
    } else {
        $usernameExists = checkUsernameExists($username);
        if ($f == 'hello') {
            if ($usernameExists) {
            } else {
                echo "<span style='color: red;'>NO student exists with this username</span>";
            }
        } else {
            if ($usernameExists) {
                echo "<span style='color: red;'>Username already exists.</span>";
            } else {
                echo "<span style='color: green;'>Username available.</span>";
            }
        }
    }
}

// Replace this function with your MongoDB logic to check username availability
function checkUsernameExists($username)
{

    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('admin');
    // $u = $_SESSION['uname'];
    $filter = ['Username' => $username];
    $count = $collection->countDocuments($filter);
    return $count > 0;
}
function checkUsernameExists1($username)
{

    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('UserDetails');
    // $u = $_SESSION['uname'];
    $filter = ['Username' => $username];
    $count = $collection->countDocuments($filter);
    return $count > 0;
}
