<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"])) {
    $username = $_POST["username"];

    // Perform MongoDB check for username availability (replace with your MongoDB logic)
    $usernameExists = checkUsernameExists($username);

    if ($usernameExists) {
        echo "<span style='color: red;'>Username already exists.</span>";
    } else {
        echo "<span style='color: green;'>Username available.</span>";
    }
}

// Replace this function with your MongoDB logic to check username availability
function checkUsernameExists($username)
{

    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('UserDetails');
    // $u = $_SESSION['uname'];
    $filter = ['Username' => $username];
    $count = $collection->countDocuments($filter);
    return $count > 0 ;

}
