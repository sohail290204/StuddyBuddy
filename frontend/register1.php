<?php
session_start();
$f = $_SESSION["first"];
if ($f == "first") {

  $uname = $_POST['username'];
  $name = $_POST['name'];
  // $age = $_POST['age'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $repassword = $_POST['reenterpassword'];

  $_SESSION['uname'] = $uname;
  $_SESSION['name'] = $name;
  // $_SESSION['age'] = $age;
  $_SESSION['email'] = $email;
  $_SESSION['phone'] = $phone;
  $_SESSION['password'] = $password;
  $_SESSION['reenterpassword'] = $repassword;

  require 'vendor/autoload.php';
  $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
  $database = $client->selectDatabase('Syllabus');
  $collection = $database->selectCollection('UserDetails');
  $u = $_SESSION['uname'];
  $filter = ['Username' => $u];
  $count = $collection->countDocuments($filter);

  if ($count > 0) {
    echo "<script>alert('Username already exists.');</script>";
    header("Location: register.php");
  } else {
    // Retrieve session variables
    $r = $_SESSION['reenterpassword'];
    $p = $_SESSION['password'];

    if ($p == $r) {
      $_SESSION['login'] = true;
      header("Location: details.php");
    } else {
      echo "<script>alert('Passwords do not match. Please re-enter.');</script>";
      header("Location: register.php");
    }
  }



  // second registration page with student details
} elseif ($f == "second") {
  // echo  "<script>alert('second');</script>";
  $board = $_POST['board'];
  $standard = $_POST['standard'];
  $exam = $_POST['exam'];

  $name = $_SESSION['name'];
  $uname = $_SESSION['uname'];
  // $age = $_SESSION['age'];
  $email = $_SESSION['email'];
  $phone = $_SESSION['phone'];
  $password = $_SESSION['password'];

  $passhash = sha1($password);


  require 'vendor/autoload.php';
  $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
  $database = $client->selectDatabase('Syllabus');
  $collection = $database->selectCollection('UserDetails');
  $document = [
    'Name' => $name,
    'Username' => $uname,
    'Email' => $email,
    // 'Age' => $age,
    'Password' => $passhash,
    'Phone_Number' => $phone,
    'Board' => $board,
    'Standard' => $standard,
    'Exam' => $exam,
  ];

  // Insert the document into the collection
  $result = $collection->insertOne($document);
  if ($result->getInsertedCount() > 0) {
    $_SESSION['login'] = true;
    echo "Document inserted successfully!";
    header("Location:home.php");
  } else {
    echo  "<script>alert('error');</script>";
    echo "Failed to insert document.";
  }
} elseif ($f == "third") {


  $uname = $_SESSION["uname"];
  require 'vendor/autoload.php';
  $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
  $database = $client->selectDatabase('Syllabus');
  $collection = $database->selectCollection('Dates');
  $filter = ['Username' => $uname];
  $existingDocument = $collection->findOne($filter);

  if ($existingDocument) {
    echo '<script>alert("Connection");</script>';
    header("Location: countdown.php");
  } else {
    date_default_timezone_set('UTC'); // Set your desired timezone

    // Get the current date in the format 'Y-m-d H:i:s'
    $currentDate = date('Y-m-d');
    // Insert a new document with the username
    $document = [
      'Username' => $uname,
      'Date' => $currentDate,
    ];

    $result = $collection->insertOne($document);

    if ($result->getInsertedCount() > 0) {
      echo '<script>alert("Registration successful!");</script>';
      header("Location: countdown.php");
    } else {
      echo '<script>alert("Error");</script>';
      die("Error inserting document into MongoDB");
    }
  }
} elseif ($f == "fourth") {

  $uname = $_POST['username'];
  $password = $_POST['password'];
  require 'vendor/autoload.php';

  // Create a MongoDB client
  $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

  // Select a database
  $database = $client->selectDatabase('Syllabus');
  $_SESSION['uname'] = $uname;
  // Select a collection
  $collection = $database->selectCollection('UserDetails');
  $filter = ['Username' => $uname];
  $document = $collection->findOne($filter);

  if ($document) {
    $storedPassword = $document['Password'];

    // if ($password == $storedPassword) {
    //   $_SESSION['login'] = true;
    //   header("Location: home.php");
    // } else {
    //   $_SESSION['login_error'] = "Invalid Username or Password";
    //   header("Location: login.php");
    // }
    if (sha1($password) === $storedPassword) {
      $_SESSION['login'] = true;
      header("Location: home.php");
    } else {
      $_SESSION['login_error'] = "Invalid Username or Password";
      header("Location: login.php");
    }
  } else {
    $_SESSION['login_error'] = "Invalid Username or Password";
    header("Location: login.php");
  }
} elseif ($f == "fifth") {

  $topic = $_POST['topic'];
  $uname = $_SESSION["uname"];
  $date = $_SESSION['date'];

  require 'vendor/autoload.php';

  // Create a MongoDB client
  $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

  // Select a database
  $database = $client->selectDatabase('Syllabus');

  $timetableCollection = $database->selectCollection('Timetable');
  $examCollection = $database->selectCollection('Daily_exam');

  $filterTimetable = ['Days ' => $date];
  $timetableDocument = $timetableCollection->findOne($filterTimetable);

  if ($timetableDocument) {
    $subject = $timetableDocument['Subjects'];
    $_SESSION['sub'] = $subject;

    $collection = $database->selectCollection('Score');
    $updatedScore = 10;  // Replace this with your actual updated score

    // Fetch the current score for the given username
    $filter = ['username' => $uname];
    $existingDocument = $collection->findOne($filter);

    if ($existingDocument) {
      // Get the current score
      $currentScore = $existingDocument['score'];
    } else {
      // If username not found, set default score to 0
      $currentScore = 0;
    }

    // Add the updated score to the current score
    $newScore = $currentScore + $updatedScore;

    // Update the record with the new score
    $updateResult = $collection->updateOne(
      ['username' => $uname],
      ['$set' => ['score' => $newScore]],
      ['upsert' => true] // Create a new document if the username doesn't exist
    );

    if ($updateResult->getModifiedCount() > 0 || $updateResult->getUpsertedCount() > 0) {
      echo "Score updated successfully!";
    } else {
      echo "Failed to update score.";
    }



    $documentExam = [
      'Topic' => $topic,
      'username' => $uname,
      // 'Score' => $p,
    ];

    $resultInsertExam = $examCollection->insertOne($documentExam);

    if ($resultInsertExam->getInsertedCount() > 0) {
      echo '<script>alert("Exam submitted successfully");</script>';
      header("Location: countdown.php");
    } else {
      echo '<script>alert("Error");</script>';
      die("Error inserting document into MongoDB");
    }
  } else {
    echo '<script>alert("No subject found for the given date");</script>';
    // (removed unnecessary code)
  }
} elseif ($f == "eight") {
  $usernames = $_POST['username'];
  $topic = $_POST['topic'];
  $uname = $_SESSION['uname'];

  require 'vendor/autoload.php';
  $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
  $database = $client->selectDatabase('Syllabus');
  $collection = $database->selectCollection('request');
  $t = date("m/d/Y h:i:s a", time());
  $document = [

    'Teachers_Username' => $usernames,
    'Doubt_Topic' => $topic,
    'Students_request' => $uname,
    'Time' => $t,
  ];

  // Insert the document into the collection
  $result = $collection->insertOne($document);
  if ($result->getInsertedCount() > 0) {
    $_SESSION['login'] = true;
    echo  "<script>alert('Document inserted successfully!');</script>";
    echo "Document inserted successfully!";
    header("Location:chat.php");
  } else {
    echo  "<script>alert('error');</script>";
    echo "Failed to insert document.";
  }
} 