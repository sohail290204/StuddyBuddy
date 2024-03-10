<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

?><?php
    $uname = $_SESSION['adminuname'];
    // $name = $_SESSION['studentuname'];
    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');

    $collection = $database->selectCollection('Chat');
    $cursor = $collection->find([], ['sort' => ['Time' => -1], 'limit' => 50]);
    $documents = $cursor->toArray();
    $res = "";

    if (count($documents) > 0) {
        foreach ($documents as $document) {
            $res .= '<div class="container">';
            $res .= '<b><span style="color:rgb(230, 114, 33)"> ' . $document['Username'] . '</span></b>'; // Assuming 'Student' is the field you want to display
            $res .= '<p>' . $document['Message'];
            $res .= '<span class="time-right">' . $document['Time'] . '</span></div>';
        }

        echo $res;
    } else {
        echo "<p>No messages are found </p>";
        echo  "<script>alert('error');</script>";
    }


    ?>
