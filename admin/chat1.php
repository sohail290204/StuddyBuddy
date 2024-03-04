<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

?>
<!-- <script>
    var myVariable = sessionStorage.getItem('h');
    // var myVariable = "Hello from JavaScript!";

    $.ajax({
        type: "POST",
        url: "your_php_script.php",
        data: {
            jsVariable: myVariable
        },
        success: function(response) {
            console.log(response); // Handle the response from the PHP script
        }
    });
</script> -->

<?php
// // Your PHP code here (assuming it's in the same file)
// if (isset($_POST['jsVariable'])) {
//     $s = $_POST['jsVariable'];
// //     // echo "Received value in PHP: " . $phpVariable;
// // } else {
// //     // echo "No value received from JavaScript.";
// }



session_start();
$uname = $_SESSION['adminuname'];
$name = $_SESSION['studentuname'];
$msg = $_POST['text'];


require 'vendor/autoload.php';

// Create a MongoDB client
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

// Select a database
$database = $client->selectDatabase('Syllabus');

// Select a collection
$s = $_SESSION['check'];
if ($s == 'h') {
    $collection = $database->selectCollection('meet');
    date_default_timezone_set("Asia/Kolkata");
    $t = date("m/d/Y h:i:s a", time());
    // Create a document to insert
    $document = [
        'Sender' => $uname,
        'Recever' => $name,
        'Message' => $msg,
        'Time' => $t,
    ];
} elseif ($s == 'f') {
    $collection = $database->selectCollection('Chat');
    date_default_timezone_set("Asia/Kolkata");
    $t = date("m/d/Y h:i:s a", time());
    // Create a document to insert
    $document = [
        'Username' => $uname,
        'Message' => $msg,
        'Time' => $t,
    ];
}




// Insert the document into the collection
$result = $collection->insertOne($document);

// Check if the insertion was successful
if ($result->getInsertedCount() > 0) {
    // echo "Document inserted successfully!";
    if ($s == 'h') {
        $_SESSION['check'] = "";
        header("Location:request.php");
    } elseif ($s == 'f') {
        $_SESSION['check'] = "";
        header("Location:chat.php");
    }
} else {
    echo  "<script>alert('error');</script>";
    echo "Failed to insert";
}
