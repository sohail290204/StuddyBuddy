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

<body>

    <header class="header mainMenu">
        <nav class="nav">
            <a href="" class="nav_logo">Studdy Buddy</a>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="#m" class="nav_link">Studdy Buddy</a>
                    <a href="#studnet" class="nav_link">Student</a>
                    <a href="#teacher" class="nav_link">Teacher</a>
                    <!-- <a href="#" class="nav_link">Profile</a> -->
                    <!-- <a href="/admin/request.php" class="nav_link">Request</a> -->
                </li>
            </ul>
            <a href="/admin/adminlogin.php"><button class="button1" id="form-open">Teacher Login</button></a>
            <a href="/frontend/login.php"><button class="button" id="form-open">Student Login</button></a>
        </nav>
    </header>
    <div id="main">
        <div id="m">
            <div class="main-container">
                <div class="Welcome" id="Welcome">
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

        <div class="sub-container1" id="studnet">
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
        </div>
    </div>
</body>
<script src="script.js"></script>
<script type="text/javascript" src="main.js"></script>

</html>