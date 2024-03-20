<!DOCTYPE html>
<html lang="en">


<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Madimi+One&display=swap" rel="stylesheet">
    <!-- <style>
        body {
            font-family: "Kanit", sans-serif;
        }
    </style> -->
    <script>
        // Smooth scroll animation using GSAP
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();

                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });

            // GSAP ScrollTrigger for the animation
            gsap.registerPlugin(ScrollTrigger);

            gsap.to("#todays-topic", {
                opacity: 100, // Initial opacity
                scrollTrigger: {
                    trigger: "#todays-topic",
                    start: "top bottom", // Trigger animation when the top of the element reaches the bottom of the viewport
                    end: "center center", // End the animation when the center of the element reaches the center of the viewport
                    scrub: true, // Smooth scrubbing effect
                },
            });
        });
    </script>
</head>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $query = $_POST['query'];
    require 'vendor/autoload.php';
    $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
    $database = $client->selectDatabase('Syllabus');
    $collection = $database->selectCollection('query');
    date_default_timezone_set("Asia/Kolkata");
    $t = date("m/d/Y h:i:s a", time());
    $document = [
        'Query' => $query,
        'Time' => $t,
    ];
    $result = $collection->insertOne($document);
    if ($result->getInsertedCount() > 0) {
        echo "Document inserted successfully!";
        header("Location:firstpage.php");
    } else {
        echo  "<script>alert('error');</script>";
        echo "Failed to insert document.";
    }
}
?>

<body>

    <header class="header" class="mainMenu">
        <nav class="nav">
            <a href="" class="nav_logo">Studdy Buddy</a>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="#m" class="nav_link">Studdy Buddy</a>
                    <a href="#student" class="nav_link">Student</a>
                    <a href="#teacher" class="nav_link">Teacher</a>
                    <!-- <a href="#" class="nav_link">Profile</a> -->
                    <!-- <a href="/admin/request.php" class="nav_link">Request</a> -->
                </li>
            </ul>
            <a href="/admin/adminlogin.php"><button class="button" id="form-open">Teacher Login</button></a>
            <a href="/frontend/login.php"><button class="button1" id="form-open">Student Login</button></a>
        </nav>
    </header>
    <img id="bg" src="\images\first1.jpg">
    <div id="main">
        <div id="m">
            <div class="main-container">
                <div class="Welcome" id="Welcome"><br>
                    <h1><span class='kk' style=' color:rgb(255, 92, 0)'><b>Studdy Buddy</b></span></h1><br>
                    <h2>Welcome to the most advance Exam Preparation System </h2><br>
                    <p>
                        Start your learning journey today and experience a studdy buddy like never before!
                    </p><br><br>
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="input-div one">
                            <div><br><br>
                                <h5>Any Query? contact Us!</h5>
                                <input class="input" name="query" id='query' type="text">
                            </div>
                        </div>
                        <input type="button" class="btnn" value="Submit">
                    </form>
                </div>
                <div><img id="logo" src="\images\logo.svg" alt="Logo"></div>
            </div>
        </div>
        <div class="sub-container" id="teacher">
            <div>
                <h2>For Teacher</h2>
                <p>Teachers on our website play a multifaceted and essential role in guiding students towards academic
                    success. Through group chat sessions, they actively address and resolve students' doubts, fostering
                    a collaborative learning environment. Additionally, teachers provide personalized support by
                    engaging in one-on-one chats, tailoring their assistance to individual student needs. Live group
                    meetings are organized to comprehensively address doubts, ensuring a thorough understanding of the
                    subjects. These educators curate a repository of important books, previous year question papers, and
                    other essential study materials. The meticulously crafted 300-day schedule serves as a roadmap for
                    students, aiding in effective time management and structured preparation. Join us now to benefit
                    from these diverse roles as our dedicated teachers are committed to supporting your academic journey
                    and helping you achieve your goals.</p>
                <br> <button class="aa"><a class="a" href="adminregi.php">Teacher Registration</a></button>
            </div>
        </div>

        <div class="sub-container1" id="student">
            <div>
                <h2>For Students</h2>
                <p>By registering on our website, students unlock a wealth of benefits tailored for their academic
                    success. Our meticulously designed 300-day schedule provides a structured roadmap for comprehensive
                    exam preparation. Engage in public classrooms, daily MCQ exams, and video explanations, fostering a
                    collaborative learning environment. With an AI-based chatbot, multi-language support, and detailed
                    topic explanations, students receive personalized assistance. Enjoy a weekly rest day, access three
                    resource websites for each topic, and tackle 99+ previous year questions. Additionally, our platform
                    ensures easy contact for technical support, making learning an enriching and supported journey for
                    every student. Join us to embark on a path of effective and enjoyable learning!our platform
                    encourages collaborative learning through live group meetings, creating a supportive environment for
                    knowledge exchange. </p>
                <br> <button class="aa"><a class="a" href="/frontend/register.php">Student Registration</a></button>
            </div>
        </div>    <br><br>
    </div>

</body>
<script src="script.js"></script>
<script type="text/javascript" src="main.js"></script>

</html>