<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: /admin/firstpage.php');
}
?>
<?php
require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
$database = $client->selectDatabase('Syllabus');
$uname = $_SESSION['uname'];
$collection = $database->selectCollection('premium');
$document = [
    'Username' => $uname,
    'payment' => "done",
];

$result = $collection->insertOne($document);

if ($result->getInsertedCount() > 0) {
    echo '<script>alert("Pyment Suceessfull");</script>';
    header("Location: countdown.php");
} else {

    die("Error inserting document into MongoDB");
    header("Location: errorpage.php");
}

?>
