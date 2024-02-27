<?php
session_start();

    $uname = $_SESSION['stu'];
    $name = $_SESSION['studentuname'];
    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('meet');

    $filter = [
        '$or' => [
            [
                '$and' => [
                    ['Sender' => $name],
                    ['Recever' => $uname]
                ]
            ],
            [
                '$and' => [
                    ['Recever' => $name],
                    ['Sender' => $uname]
                ]
            ]
        ]
    ];

    $count = $collection->countDocuments($filter);
    if ($count) {
        echo 'enabled';
    } else {
        echo 'disabled';
    }
// }
?>
