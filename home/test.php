<?php

$adminuname = $_POST['username'];
$password = $_POST['password'];
require 'vendor/autoload.php';

// Create a MongoDB client
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

// Select a database
$database = $client->selectDatabase('Syllabus');
$_SESSION['adminuname'] = $adminuname;
// Select a collection
$collection = $database->selectCollection('admin');
$filter = ['Username' => $adminuname];
$document = $collection->findOne($filter);


if ($document) {
    $storedPassword = $document['Password'];

    if (sha1($password) === $storedPassword) {
        $_SESSION['login'] = true;
        header("Location: adminhome.php");
      } else {
        $_SESSION['login_error'] = "Invalid Username or Password";
        header("Location: adminlogin.php");
      }
} else {
    $_SESSION['login_error'] = "Invalid Username or Password";
    header("Location: adminlogin.php");
}


?>