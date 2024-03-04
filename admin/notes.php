<?php
session_set_cookie_params(0);
session_start();
if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
    header('Location: firstpage.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PCM Books</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;

        }

        h1 {
            color: #030303;
            /* font-family: "montserrat"; */
        }

        #main1 {
            position: relative;
            background-color: rgba(0, 0, 0, 0.5);

        }

        a {
            text-decoration: none;
            color: antiquewhite;
        }

        .header {
            position: fixed;
            height: 80px;
            width: 100%;
            z-index: 100;
            padding: 0 20px;
            margin: 0px -20px;
            justify-content: flex-start;
        }

        .nav {
            padding: 0 120px;
            z-index: 999;
            width: 105%;

        }

        .nav,
        .nav_item {
            display: flex;
            height: 100%;
            align-items: center;
            justify-content: space-between;
        }

        .nav_logo,
        .nav_link,
        .button {
            color: #fff;
        }

        .nav_logo {
            font-size: 25px;
        }

        .nav_item {
            column-gap: 25px;
        }

        .nav_link:hover {
            color: #d9d9d9;
        }

        .button {
            padding: 6px 24px;
            border: 2px solid #fff;
            background: transparent;
            border-radius: 6px;
            cursor: pointer;
        }

        .button:active {
            transform: scale(0.98);
        }

        body {
            font-family: "montserrat";
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: rgb(222, 134, 35);
            color: #f4f4f4;
        }

        table {

            -webkit-text-stroke: 0.1px black;
            border-radius: 24px;
            width: 80%;
            border-collapse: separate;
            border-spacing: 5px;
            margin: 20px auto;
            color: black;
        }

        th,
        td {
            color: black;
            padding: 12px;
            margin: 10px;
            text-align: center;
        }

        td {
            background-color: #E0E0E8;
            margin-bottom: 20px;
            border-radius: 30px;
        }

        th {
            color: black;
            padding: 15px;
            border-radius: 30px;
            background-color: rgb(251, 213, 132);

        }

        #open {
            display: inline-block;
            padding: 8px 28px;
            width: 100px;
            margin: 5px;
            border: 2px solid #030303;
            border-radius: 10px;
            background-color: rgb(222, 134, 35);
            color: #030303;
            text-decoration: none;
            font-size: 16px;
        }

        #open:hover {
            display: inline-block;
            border-radius: 10px;
            background-color: rgb(249, 194, 78);
            color: #030303;
            text-decoration: none;
            font-size: 16px;
        }

        #google_translate_element {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;


        }

        #bg {
            width: 100%;
            object-fit: cover;
            position: fixed;
            left: 0px;
            height: 100%;
            z-index: -3;
            /* filter: blur(3px); */
        }

        .container {
            margin-left: 80px;

            padding-top: 50px;
            border-radius: 30px;
            margin-right: 80px;
            background-color: white;
        }

        @media only screen and (max-width: 768px) {
            body {
                font-size: 14px;
            }

            .nav {
                padding: 0 20px;
            }

            .nav_item {
                column-gap: 10px;
            }

            .button {
                padding: 8px 18px;
            }

            table {
                width: 100%;
            }
        }

        @media only screen and (max-width: 480px) {
            body {
                font-size: 12px;
            }

            .nav {
                padding: 0 10px;
            }

            .nav_item {
                column-gap: 5px;
            }

            .button {
                padding: 6px 16px;
            }

            table {
                font-size: 14px;
            }
        }
    </style>
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>
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

        });
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>

<body>
    <header class="header" class="mainMenu">

        <nav class="nav">
            <a href="#" class="nav_logo">Studdy Buddy</a>

            <ul class="nav_items">
                <li class="nav_item">
                    <a href="adminhome.php" class="nav_link">Home</a>
                    <a href="chat.php" class="nav_link">Chat Room</a>
                    <a href="Schedule.php" class="nav_link">Your_Schedule</a>
                    <a href="setting.php" class="nav_link">Profile</a>
                    <a href="#papers" class="nav_link">PYQS</a>
                    <a href="#books" class="nav_link">Books</a>
                </li>
            </ul>

            <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
        </nav>
    </header>
    <div id="main11">
        <!-- <img id="bg" src="\images\notes.png" /> -->
        <br><br> <br><br> <br><br>
        <div class="container">
            <div id="books"><br><br><br><br>
                <h1>Physics - Chemistry - Mathematics Books</h1>

                <table>
                    <thead>
                        <tr>
                            <th>Subject</th>
                            <th>Book Title</th>
                            <th>Open Link</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td rowspan="11">Physics</td>
                            <td> Concepts of Physics HC Verma Volume1 1992 </td>
                            <td><a href="http://ebooks.tau.edu.ng/read/3472/pdf" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Concepts of Physics HC Verma Volume2 1992 </td>
                            <td><a href="http://ebooks.tau.edu.ng/read/3478/pdf" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>NCRT Physics Part 1</td>
                            <td><a href="https://ncert.nic.in/textbook.php?leph1=0-8" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>NCRT Physics Part 2</td>
                            <td><a href="https://ncert.nic.in/textbook.php?leph2=0-6" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>DC Pandey Mechanics 1</td>
                            <td><a href="https://drive.google.com/file/d/1GL-Ta1OvKqRdogbVjPW3GujdnfuoDqx3/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>DC Pandey Mechanics 2</td>
                            <td><a href="https://drive.google.com/file/d/17SH46oRRGWrtquadjYeEOVgySeE_k0WY/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Dc Pandey Electricity magnetis, problems</td>
                            <td><a href="https://drive.google.com/file/d/12KI99rkOkWAjBXi0d1HD0RPc9gg19fQz/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>DC Pandey Optics And Modern Physics </td>
                            <td><a href="https://drive.google.com/file/d/1JrkRe6qQA6LCGd3rEDIi3J01EVbP-JWS/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>DC Pandey Waves And Thermodynamics</td>
                            <td><a href="https://drive.google.com/file/d/1QEuqM-rh0yP5PmkaCoCp4j384MOA5eJ8/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Fundamentals of Physics by Halliday, Resnick & Walker</td>
                            <td><a href="https://drive.google.com/file/d/1blZeaH_efGK8VuaY0Lq4fGOaq-gEO2WI/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Problems in General Physics by IE Irodov</td>
                            <td><a href="https://drive.google.com/file/d/1UvMmsbCbBIrzVxrvE8AHxpZaVzFi_EC8/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>



                        <!-- Chemistry -->
                        <tr>
                            <td rowspan="8">Chemistry</td>
                            <td>Organic Chemistry by Morrison & Boyd</td>
                            <td><a href="https://drive.google.com/file/d/1RVNO6lXnVrL_N3BNlYIKMpm8yivlxhyh/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>NCRT Chemistry Part 1</td>
                            <td><a href="https://ncert.nic.in/textbook.php?lech1=0-5" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>NCRT Chemistry Part 2</td>
                            <td><a href="https://ncert.nic.in/textbook.php?lech2=0-5" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>A Guidebook to Mechanism in Organic Chemistry by Peter Sykes</td>
                            <td><a href="https://drive.google.com/file/d/1E3yN3WuX6IgKTlVG2mxwTu45KReLU7Vy/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Concise Inorganic Chemistry, J. D. Lee</td>
                            <td><a href="https://drive.google.com/file/d/1-6z3Wmc_GciVcWvkYo2Cw1-uLXmsf-oK/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Inorganic Chemistry by O.P. Tandon</td>
                            <td><a href="https://drive.google.com/file/d/1n6hKsQGaNvg4wup3EHfFz6m9wS_45-MS/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Organic Chemistry 6e By R.T. Morrison and R.N. Boyd</td>
                            <td><a href="https://drive.google.com/file/d/1F706Fa_NZlClKsVHoAU_TJxY0bqtrq9Y/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>GRB Physical Chemistry IIT JEE</td>
                            <td><a href="https://drive.google.com/file/d/156dsnaFXCYlwwq7x5ISrMcT2raf0xAgt/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>


                        <!-- Maths -->

                        <tr>
                            <td rowspan="8">Mathematics</td>

                            <td>NCRT Maths Part 1</td>
                            <td><a href="https://ncert.nic.in/textbook.php?lemh1=0-6" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>NCRT Maths Part 2</td>
                            <td><a href="https://ncert.nic.in/textbook.php?lemh2=0-7" target="_blank" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>RD Sharma Objective Mathematics For JEE Main & Advance Vol1 </td>
                            <td><a href="https://drive.google.com/file/d/1aUbkw6QCN8SAvTseZP5q-DqodOJCc1yg/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>RD Sharma Objective Mathematics For JEE Main & Advance Vol2 </td>
                            <td><a href="https://drive.google.com/file/d/1n5uZkhVHq7x4KRD7zR_1dT1icZUx0eB3/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Complete Mathematics for JEE Main</td>
                            <td><a href="https://drive.google.com/file/d/1Kar9arCi4OIp6XDA_k-rKsGNE4GVOZ7x/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Plane Trigonometry by S L Loney</td>
                            <td><a href="https://drive.google.com/file/d/1IPLWl4xa0bige2vIBshQvBOPdI6dEpdX/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Differential Calculus by Amit M Agarwal</td>
                            <td><a href="https://drive.google.com/file/d/1B4ez_5cHCX82ydxsPuRvhmTwslnDfcbk/view?usp=sharing" target="_blank" Open>
                                    <div id="open">Open</div>
                                </a></td>
                        </tr>
                        <tr>
                            <td>Algebra by Dr. S K Goyal</td>
                            <td><a href="https://drive.google.com/file/d/1OpGbCZjM9tx2Xp_r7XcTeRHYlCTxNOBr/view?usp=sharing" target="_blank" Open>

                                    <div id="open">Open</div>

                                </a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="papers"><br><br>
                <?php

                require 'vendor/autoload.php';

                // Create a MongoDB client
                $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

                // Select a database
                $database = $client->selectDatabase('Syllabus');

                // Select a collection
                $collection = $database->selectCollection('pyqs');
                $cursor = $collection->find();

                // Flag to check if there are any documents
                $foundDocuments = false;
                echo "<br><br><h1>PYQPs</h1>";

                // Output specific field names as table headers
                echo "<table> <tbody>  <thead><tr>";
                echo "<th>Paper Year</th>";
                echo "<th>Open Link</th>";
                echo "</tr></thead>";

                // Output specific data from documents using foreach directly on the cursor
                foreach ($cursor as $document) {
                    $foundDocuments = true;
                    $d = $document['Link'];
                    echo "<tr>";
                    echo "<td>" . $document['Papers'] . "</td>";
                    echo "<td><a href='$d' target='_blank' Open> <div id='open'>Open</div></a></td>";
                    echo "</tr>";
                }

                echo " </tbody></table>";

                // Check if there were no documents
                if (!$foundDocuments) {
                    echo "<p>No results found</p>";
                }


                ?>

            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="script.js"></script>
        <script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
        <script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>
    </div>
</body>

</html>