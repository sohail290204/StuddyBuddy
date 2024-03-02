<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
  header('Location: /admin/firstpage.php');
}

?>
<?php

// $p = $_SESSION['premium'];
// if ($p == 'p') {
    // $_SESSION['premium'] = 'o';
    require 'vendor/autoload.php';

    // Create a MongoDB client
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

    // Select a database
    $database = $client->selectDatabase('Syllabus');

    $uname = $_SESSION['uname'];
    // Select a collection
    $collection = $database->selectCollection('premium');

    $filter = ['Username' => $uname];
    $document = $collection->findOne($filter);

    if ($document) {
        $payment = $document['payment'];

        if ($payment == 'done') {
            // $_SESSION['login'] = true;
            header("Location: insertdate.php");
        } else {
            header("Location: features.php");
            // echo '<script>alert("Invalid Username Or Password");</script>';
        }
    } else {
        header("Location: features.php");
        // echo '<script>alert("Invalid Username Or Password");</script>';
    }
