<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: /admin/firstpage.php');
}

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="homedesign.css">

<div id="google_translate_element"></div>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
        }, 'google_translate_element');
    }
</script>



<link rel="preconnect" href="https://fonts.googleapis.com">
<style>
    body {
        font-family: "Poppins", sans-serif;
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
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" style="display: inline;"></script>

<body>

    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="#main-container" class="nav_link">Home</a>
                    <!-- <a href="Schedule.php" class="nav_link">Your_Schedule</a> -->
                    <a href="#updates" class="nav_link">JEE Updates</a>
                    <a href="#jee" class="nav_link">What is JEE Mains</a>
                    <a href="profile.php" class="nav_link">Profile</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <div id="main">

        <div id="main-container" class="main-container">
            <div CLASS="page1">

                <?php
                $uname = $_SESSION["uname"];
                $_SESSION['first'] = "third";
                // $_SESSION['person'] = "student";
                $_SESSION['premium'] = "p";
                echo "<h1>Welcome <span style=' color:rgb(132,153,167);  padding:5px; margine:10px'>$uname</span> to Your Personalize <span>Studdy Buddy!</span></h1>"
                ?>
                <br><br>

                <p id="details">
                    Study Buddy is an educational companion designed to enhance your learning experiences. It offers
                    prepare study plans, exam preparation support, and many more features to help students excel in
                    their academic journey.
                </p>
                <br><br>

                <form action="premium.php" action="POST">
                    <div class="wrapper">
                        <button class="a">Lets Start</button>
                    </div>
                </form>
            </div>
        </div><br>
        <div id="jee"><br>
            <div class="main-container1">
                <div class="page2">
                    <h2><span> What is JEE MAINS?</span></h2><br>
                    <p id="details1">JEE Main or JEE Main 2024 is the first phase of the IIT Joint Entrance Exam (IIT JEE).
                        It is a
                        computer-based online test conducted by the National Testing Agency for students aspiring to pursue
                        undergraduate courses in India in top engineering institutes, such as IITs, NITs, etc. Thus,
                        students are granted admission to IITs, CFTIs, NITs, and other Government funded technical
                        institutes based on the marks obtained in the JEE Main. The exam conducting authority considers the
                        best NTA score in preparing the ranks/merit list. Candidates could further opt to appear for one
                        exam or all the exams. Also, the top 2,50</p>

                </div>
            </div>
        </div><br>
        <div id="updates"><br>
            <div class="main-container2">
                <div class="page2">
                    <h2><span> JEE MAINS Updates</span></h2><br>
                    <div>

                        <br>
                        <li>JEE Main 2024 January Session: NTA released the JEE Main 2024 session 1 will be conducted
                            between 24th January and 1st February, 2024.</li>
                        <br>
                        <li>JEE Main 2024 April Session: NTA released the JEE Main 2024 session 1 will be conducted between
                            1st April, 2024 and 15th April, 2024.</li>
                        <br>
                        <li>JEE Main 2024 Session 1 Application Form: To be Updated</li>
                        <br>
                        <li>NTA reopened JEE Main 2024 Session Online Application Window for corrections: To be Updateds</li>
                        <br>
                        <li>JEE Main 2024 Session 1 Application Form: To be Updated</li>


                    </div><br><br><br><br>
                    <h4 class="update"><a href="https://jeemain.nta.ac.in/" class="u" target="_blank">Click here to go to the official website of jee mains for updates</a></h4>
                </div>
            </div>
        </div>
            <br><br><br><br><br><br><br>
            <div class="container">
                <div class="slideshow-container">

                    <div class="mySlides fade">
                        <div class="numbertext">1 / 3</div>
                        <img src="/images/1.png" style="width:100%">
                        <div class="text">Caption Text</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">2 / 3</div>
                        <img src="/images/2.png" style="width:100%">
                        <div class="text">Caption Two</div>
                    </div>

                    <div class="mySlides fade">
                        <div class="numbertext">3 / 3</div>
                        <img src="/images/3.png" style="width:100%">
                        <div class="text">Caption Three</div>
                    </div>
                    <!-- <div class="mySlides fade">
                    <div class="numbertext">4 / 3</div>
                    <img src="/images/4.png" style="width:100%">
                    <div class="text">Caption Three</div>
                </div> -->

                </div>
                <div style="text-align:center">
                    <span class="dot"></span>
                    <span class="dot"></span>
                    <span class="dot"></span>
                </div>
            </div>
        </div>

        <script>
            let slideIndex = 0;
            showSlides();

            function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";
                }
                slideIndex++;
                if (slideIndex > slides.length) {
                    slideIndex = 1
                }
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex - 1].style.display = "block";
                dots[slideIndex - 1].className += " active";
                setTimeout(showSlides, 2000); // Change image every 2 seconds
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="script.js"></script>
        <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
        <script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer>
        </script>

</body>

</html>