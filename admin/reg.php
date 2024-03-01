<?php
session_start();
$f = $_SESSION["first"];
if ($f == "sixth") {

    $uname = $_POST['username'];
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $experience = $_POST['exp'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $repassword = $_POST['reenterpassword'];

    $experience = $experience . 'yrs';

    $_SESSION['adminuname'] = $uname;
    $_SESSION['adminname'] = $name;
    $_SESSION['experience'] = $experience;
    $_SESSION['adminsubject'] = $subject;
    $_SESSION['adminemail'] = $email;
    $_SESSION['adminphone'] = $phone;
    $_SESSION['adminpassword'] = $password;
    $_SESSION['adminreenterpassword'] = $repassword;

    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('admin');
    $u = $_SESSION['adminuname'];
    $filter = ['Username' => $u];
    $count = $collection->countDocuments($filter);

    if ($count > 0) {
        echo "<script>alert('Username already exists.');</script>";
        sleep(2);
        header("Location: adminregi.php");
    } else {
        // Retrieve session variables
        $r = $_SESSION['adminreenterpassword'];
        $p = $_SESSION['adminpassword'];
        $passhash = sha1($password);
        if ($p == $r) {
            $_SESSION['login'] = true;
            require 'vendor/autoload.php';
            $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
            $database = $client->selectDatabase('Syllabus');
            $collection = $database->selectCollection('admin');
            
            $document = [
                'Name' => $name,
                'Username' => $uname,
                'Email' => $email,
                'Password' => $passhash,
                'Phone_Number' => $phone,
                'Subject' => $subject,
                'Experience'=>$experience
            ];

            // Insert the document into the collection
            $result = $collection->insertOne($document);
            if ($result->getInsertedCount() > 0) {
                $_SESSION['adminlogin'] = true;
                echo "Document inserted successfully!";
                header("Location:adminhome.php");
            } else {
                echo  "<script>alert('error');</script>";
                echo "Failed to insert document.";
            }
        } else {
            echo "<script>alert('Passwords do not match. Please re-enter.');</script>";
            header("Location: adminregi.php");
        }
    }



    // second registration page with student details
} elseif ($f == "seventh") {
    // echo  "<script>alert('second');</script>";
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
}
