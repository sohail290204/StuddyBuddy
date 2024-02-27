<?php
session_start();
$uname = $_SESSION["uname"];

// Validate and sanitize $uname to prevent injection attacks if needed

require 'vendor/autoload.php';

// Create a MongoDB client
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

// Select a database
$database = $client->selectDatabase('Syllabus');
$collection = $database->selectCollection('Dates');

// Query the MongoDB collection for the user's date
$filter = ['Username' => $uname];
$document = $collection->findOne($filter);

if ($document) {
    // Redirect if the document is found
    header("Location: countdown.php");
    exit(); // Ensure script termination after redirection
} else {
    // Insert a new document if not found
    $currentDate = new DateTime();
    $c = $currentDate->format('Y-m-d');
    
    $newDocument = [
        'Username' => $uname,
        'Date' => $c,
    ];
    
    $collection->insertOne($newDocument);
    
    // Redirect to countdown.php or display a message as needed
    header("Location: countdown.php");
    exit(); // Ensure script termination after redirection
}
?>
