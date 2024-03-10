<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

?>
<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
$database = $client->selectDatabase('Syllabus');
$collection = $database->selectCollection('request');
$uname = $_SESSION['adminuname'];
$filter=['Teachers_Username' => $uname];
// $cursor = $collection->find();
$cursor = $collection->find($filter, ['sort' => ['Time' => -1], 'limit' => 50]);
$documents = $cursor->toArray();
$res = "";
// Check if there are any documents
if (count($documents) > 0) {
    foreach ($documents as $document) {
        $res = $res . '<div class="container">';
        $res = $res . '<b> Student: ' . $document['Students_request'] . '</b>';
        $res = $res . '<p> <b>Doubt:</b> ' . $document['Doubt_Topic'] . '</b>'; 
        $res = $res . '<span class="time-right">' . $document['Time'] . '</div>';
    }
    echo $res;
} else {
    echo "<p>No messages are found </p>";
}
?>