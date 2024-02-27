<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

?><?php
    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('Chat');


    $cursor = $collection->find([], ['sort' => ['Time' => -1], 'limit' => 50]);
    $documents = $cursor->toArray();
    $res = "";
    // Check if there are any documents
    if (count($documents) > 0) {
        foreach ($documents as $document) {
            $res = $res . '<div class="container">';
            $res = $res . '<b>' . $document['Username'] . '</b>';
            $res = $res . '<p>' . $document['Message'];
            $res = $res . '<span class="time-right">' . $document['Time'] . '</span></div>';
        }
        echo $res;
    } else {
        echo "<p>No messages are found </p>";
        echo  "<script>alert('error');</script>";
    }
    ?>
