<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}




$uname = $_SESSION['adminuname'];
$name = $_SESSION['studentuname'];
$msg = $_POST['text'];


require 'vendor/autoload.php';

// Create a MongoDB client
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

// Select a database
$database = $client->selectDatabase('Syllabus');

// Select a collection

    $collection = $database->selectCollection('Chat');
    date_default_timezone_set("Asia/Kolkata");
    $t = date("m/d/Y h:i:s a", time());
    // $t = new MongoDB\BSON\UTCDateTime(time() * 1000); 
    // Create a document to insert
    $document = [
        'Username' => $uname,
        'Message' => $msg,
        'Time' => $t,
    ];




// Insert the document into the collection
$result = $collection->insertOne($document);

// Check if the insertion was successful
if ($result->getInsertedCount() > 0) {
    // echo "Document inserted successfully!";
        header("Location:chat.php");
    
} else {
    echo  "<script>alert('error');</script>";
    echo "Failed to insert";
}
