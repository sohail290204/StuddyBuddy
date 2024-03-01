<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <link href="https://fonts.googleapis.com/css2?family=Anta&family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Madimi+One&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Kanit", sans-serif;
        }
    </style>
</head>

<body>
    <header class="header mainMenu">
        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="/admin/adminhome.php" class="nav_link">Home</a>
                    <a href="/admin/Schedule.php" class="nav_link">Schedule</a>
                    <a href="/admin/notes.php" class="nav_link">Notes</a>
                    <a href="/admin/setting.php" class="nav_link">Profile</a>
                    <a href="/admin/request.php" class="nav_link">Request</a>
                </li>
            </ul>
            <a href="/admin/logout.php"><button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <div id="main">
        <div class="main-container">
            <div class="Welcome">
                <h1>Studdy Buddy</h1><br>
                <h2>Welcome to the most advance Exam Preparation System </h2>
                <p>
                    Start your learning journey today and experience a studdy buddy like never before!
                </p>
                <form>
                    <div class="input-div one">
                        <div><br><br><br>
                            <h5>Any Query? contact Us!</h5>
                            <input class="input" type="text">
                        </div>
                    </div>
                    <input type="button" class="btnn" value="Submit">
                </form>
            </div>
            <div><img id="logo" src="\images\Blue_Simple_Modern_Graphic_Design_Studio_Logo-removebg-preview (1).png" alt="Logo"></div>
        </div>

        <div class="sub-container">
            <div>
                <h2>For Teacher</h2>
                <p>Teachers on our website play a multifaceted and essential role in guiding students towards academic success. Through group chat sessions, they actively address and resolve students' doubts, fostering a collaborative learning environment. Additionally, teachers provide personalized support by engaging in one-on-one chats, tailoring their assistance to individual student needs. Live group meetings are organized to comprehensively address doubts, ensuring a thorough understanding of the subjects. These educators curate a repository of important books, previous year question papers, and other essential study materials. The meticulously crafted 300-day schedule serves as a roadmap for students, aiding in effective time management and structured preparation. Join us now to benefit from these diverse roles as our dedicated teachers are committed to supporting your academic journey and helping you achieve your goals.</p>
                <br> <button class="aa"><a class="a" href="adminlogin.php">Teacher Login</a></button>
            </div>
        </div>

        <div class="sub-container1">
            <div>
                <h2>For Students</h2>
                <p>By registering on our website, students unlock a wealth of benefits tailored for their academic success. Our meticulously designed 300-day schedule provides a structured roadmap for comprehensive exam preparation. Engage in public classrooms, daily MCQ exams, and video explanations, fostering a collaborative learning environment. With an AI-based chatbot, multi-language support, and detailed topic explanations, students receive personalized assistance. Enjoy a weekly rest day, access three resource websites for each topic, and tackle 99+ previous year questions. Additionally, our platform ensures easy contact for technical support, making learning an enriching and supported journey for every student. Join us to embark on a path of effective and enjoyable learning!our platform encourages collaborative learning through live group meetings, creating a supportive environment for knowledge exchange. </p>
                <br> <button class="aa"><a class="a" href="adminlogin.php">Student Login</a></button>
            </div>
        </div>
    </div>
</body>
<script src="script.js"></script>
<script type="text/javascript" src="main.js"></script>

</html>