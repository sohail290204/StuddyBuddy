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
  <title>Countdown</title>
  <link rel="stylesheet" href="countdowndesign.css">

  <div id="google_translate_element"></div>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({
        pageLanguage: 'en'
      }, 'google_translate_element');
    }
  </script>

  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
<!-- <div id="nav">
  <a href="home.php">
    <h4>Home</h4>
  </a>
  <h4><a href="Schedule.php">Schedule</a></h4>
  <h4><a href="#video">Video</a></h4>
  <h4><a href="notes.php">Notes</a></h4>
  <h4><a href="chat.php">Chat_Room</a></h4>
</div> -->
<header class="header" class="mainMenu">

  <nav class="nav">
    <a href="#" class="nav_logo">Studdy Buddy</a>

    <ul class="nav_items">
      <li class="nav_item">
        <a href="home.php" class="nav_link">Home</a>
        <a href="#video" class="nav_link">Video</a>
        <a href="#topic" class="nav_link">Todays Topic</a>
        <a href="chat.php" class="nav_link">Chat Room</a>
        <a href="notes.php" class="nav_link">Notes</a>
        <a href="Schedule.php" class="nav_link">Your_Schedule</a>
      </li>
    </ul>

    <a href="logout.php"> <button class="button" id="form-open">SignOut</button></a>
  </nav>
</header>
<img id="bg" src="\images\countdown1.png">

<body>
  <div id="main">
    <div id="welcome-text">
    </div>
    <!-- time calculation -->
    <div id="countdown">

      <?php
      $uname = $_SESSION["uname"];
      // $currentDate = new DateTime();
      // echo $currentDate->format('Y-m-d');
      require 'vendor/autoload.php';
      // Create a MongoDB client
      $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
      // Select a database
      $database = $client->selectDatabase('Syllabus');
      $collection = $database->selectCollection('Dates');
      // Query the MongoDB collection for the user's date
      $filter = ['Username' => $uname];
      $document = $collection->findOne($filter);
      if ($document) {
        $n = $document['Date'];
        $currentDate = new DateTime();
        $n = $currentDate->format('Y-m-d');
        echo "<div id='welcome-text'><b> Welcome $uname, Today's date is: $n </b></div>";
        echo "<div id='welcome-text1'> You started on  " . $document['Date'] . " </div>";
      } else {
        // $currentDate = new DateTime();
        // $c = $currentDate->format('Y-m-d');
        // $document = [
        //   'Username' => $uname,
        //   'Date' => $c,
        // ];
        echo "No data found for the given date $sc";
      }
      ?>

    </div>

    <hr>
    <!-- Todays topic -->
    <div id="todays-topic">

      <?php

      $collection = $database->selectCollection('Dates');
      $filter = ['Username' => $uname];
      $document = $collection->findOne($filter);
      if ($document) {
        $dd = $document['Date'];
        $_SESSION['time'] = $dd;
      } else {
        echo "error occured";
      }

      $currentDate = new DateTime();
      $t = $_SESSION['time'];
      $startDate = new DateTime($t);

      $timeDifference = $currentDate->getTimestamp() - $startDate->getTimestamp();
      $daysRemaining = ceil($timeDifference / (60 * 60 * 24));

      if ($daysRemaining <= 0) {
        echo 'Countdown complete!';
      } else {
        $aaa = 300 - $daysRemaining;
        echo "<br><br> <DIV ID='countdown'> Day: $daysRemaining, Day Remaining: $aaa </DIV>";
      }


      // $sc = $daysRemaining;
      $sc =29;

      $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
      $database = $client->selectDatabase('Syllabus');
      $_SESSION['date'] = $sc;
      $collection = $database->selectCollection('Timetable');
      $filter = ['Days ' => $sc];
      $document = $collection->findOne($filter);

      if ($document) {
        $nn = $document['Subject'];
        echo "<h3><div id='topic'>Your Today's topic is: $nn<div></h3>";
        $_SESSION['date'] = $sc;
      } else {
        echo "Marvelous achievement! Your dedication and effort have led you to the completion of this course, unlocking new horizons of knowledge and accomplishment.";
      }


      require 'vendor/autoload.php';
      $m = ("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
      $client = new MongoDB\Client($m);
      $database = $client->selectDatabase('Syllabus');
      $collection = $database->selectCollection('Timetable');
      $cursor = $collection->find();

      foreach ($cursor as $document) {
        $scc = $_SESSION['date'];
        $Day = $document['Days '];
        $Subject = $document['Subject'];
        $Explaination = $document['Explaination'];
        $Link = $document['Link'];

        if ($Day == $scc) {
          echo " <pre><br> Name: $Subject<br><br> </pre> ";
          echo "<hr style='background-color: white; margin: 20px 0;'>";
          if ($scc == 24 || $scc == 25 || $scc == 26 || $scc == 27 || $scc == 28 || $scc == 30 || $scc == 54 || $scc == 56 || $scc == 57 || $scc == 58 ||  $scc == 84 || $scc == 85 || $scc == 86 || $scc == 87 || $scc == 88 ||  $scc == 114 || $scc == 115 || $scc == 116 || $scc == 117 || $scc == 118 ||  $scc == 146 || $scc == 147 || $scc == 148 || $scc == 149 || $scc == 150 || $scc == 151  || $scc == 177 || $scc == 178 || $scc == 179 || $scc == 180 || $scc == 181 ||  $scc == 200 || $scc == 201 || $scc == 202 || $scc == 203 || $scc == 204 || $scc == 205 || $scc >= 291 && $scc <= 299) {
            echo "";
          } elseif ($scc == 29 || $scc == 59 || $scc == 89 || $scc == 119 || $scc == 152 || $scc == 182 || $scc == 206) {
            echo "<br><br><br><br><input type='button' id='b' value='Click here to give exam' onclick='redirectToExample()'> <br><br>  <br><br>  <hr><br><br>    ";
          } elseif ($scc >= 275 && $scc <= 290) {
            if ($scc >= 275 && $scc <= 280) {
              echo  '<table><tr><td> JEE Main 2021 February 24 Shift 1 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1ypV3rEnPYnXUF29nommhgKPORW2x-lij/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 February 24 Shift 2 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1v8lgUChwNxlO5yPnLqWmd75yU8n2f7qf/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 February 25 Shift 1 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1WwKlMRj4AoThD5i4o-Tw2w7gmJs3AeNz/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 February 25 Shift 2 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1dEb01EYrPfOd4BLAtWCYXo6JrIuzUftI/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 February 26 Shift 1 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/12a4rgUz2IlgSpLRmH4Nk0iOAwUAptB-k/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 February 26 Shift 2 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1QJcWrfUw187uNxCmm8VsLTgw5iF9ylWy/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 March 16 Shift 1 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1xC5qSzVTh5GY43vyTT84M-uibMXG6AeY/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 March 16 Shift 2 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1ib5UuZrinMID-rqm1Sk9hIgCK6fbFOcG/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 March 17 Shift 1 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1T43vI1UufKGkKWN0YeK9VjIZDIqPzkUV/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 March 17 Shift 2 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1cw4TRnWhQfNnHSI3sr6573bM-HFnRk1w/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 March 18 Shift 1 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1Nnnws9ePXHbZOvVTWywD8hHznPf0aOSh/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2021 March 18 Shift 2 Question Paper with Answer Key</td><td><a href="https://drive.google.com/file/d/1bbBDnyTbHPcgllk7X3Dh2DcWnwTXs5EO/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
            } elseif ($scc >= 281 && $scc <= 285) {
              echo  '<table><tr><td> JEE Main 2022 June 24 Shift 1 Question Paper with Answer Key.pdf</td><td><a href="https://drive.google.com/file/d/1T2AGxAcveRpjqBFr1km8xziYJKPbTgDo/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 24 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1vRaCdAka0Dqj7wA1bTSyD3h-5FnLIX4d/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 25 Shift 1 Question Paper with Answer Key Key </td><td><a href="https://drive.google.com/file/d/1zz63S8jUuvx-hOQCpziuFYdN5Hl4Znti/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 25 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1b8Olbnm83sAb0lGFWxOwg3YhII_q3MN8/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 26 Shift 1 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1E7zpZKv_VTKL97Np4wt30YFHH-Shd18Y/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 26 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/16L1khhuUlYgUB5Ar9z4oXVADAImzA0fh/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 27 Shift 1 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1PuVPQqMwDDNE7ICXKr1E5pAbC9OX83lJ/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 27 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1K_AhfgB2pP-WFXq32u68wil98oE2i-oz/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 28 Shift 1 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1eJg5CXPQj00ETIxCVuaOKcs-sxckYjV5/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 28 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1vRYDtQJW-ORWbe0vHzKX23BlMTxbTa0k/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 29 Shift 1 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1ZYu7b4YahFCcldhEPX79AlMZFPuf_hWC/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2022 June 29 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1x_PoWgmgBsZN9G3Ta7Jhnon9Be3dL-rD/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
            } elseif ($scc >= 286 && $scc <= 290) {
              echo  '<table><tr><td> JEE Main 2023 (April 6th Shift 1) Chemistry Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1PbmYu0AlJOMzWK2DyPDZ-5hdsmFwr0iU/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 (April 6th Shift 1) Maths Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1Zv_coJBpFXhdJQJPAarudecDtpAlnyez/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 (April 6th Shift 1) Physics Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/14yko3upRDhB-xF6ei9xGwn8AOlcXlr4e/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 (January 31 Evening Shift) Question Paper with Solutions </td><td><a href="https://drive.google.com/file/d/168bXsNSkK8f1O3ZAbGpp2amuCyocTmep/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 January 24 Shift 1 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1SBmpHKGeRjq_BcoBJ8CU0B81_Prmk-Gc/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 January 24 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1Grcc4ZKr8tasNKSWfrBnLlmxlp3zgO-Y/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 January 25 Shift 1 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1l-Iggpn2aLrinQ1iSZRLGjjfhAP3lpb3/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 January 25 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1QJI0DirG_wA93iw9i7j-gfMu3bloulTA/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 January 29 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1xJ8ZPsd6nphxFvfIH5jD-fW8bjU-fFKw/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 January 30 Shift 1 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1CPOZROpxl_EmCSr5AK0F9j_QsJzEMZDX/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
              echo  '<table><tr><td> JEE Main 2023 January 30 Shift 2 Question Paper with Answer Key </td><td><a href="https://drive.google.com/file/d/1kvkxu6FpIY2o1yZywcT30w5sEMTbs_jB/view?usp=sharing" target="_blank" Open><div id="open">Open</div></a></td></tr></table> ';
            }
          } elseif ($scc == 300) {
            echo " <pre ><br><div id='ex' > $Explaination\n</div> <br> </pre> ";
          }elseif($scc > 300){
            echo " <pre ><br><div id='ex' > Congratulations to all the dedicated students who have successfully completed our JEE Mains course! Your hard work and commitment are truly commendable. As you embark on the exam, we extend our heartfelt best wishes for your success. May you excel in the upcoming JEE Mains with flying colors!</div> <br> </pre> ";
          } else {
            echo "<pre><br><div class='name'><b> $Subject </b></div><div class='ex'>$Explaination\n</div><br><br></pre>";

            echo "<hr style='background-color: white; margin: 20px 0;'>";
            echo "<pre><div id='video'> <h4 id='watch' > Watch Videos for better understanding</h4> <iframe height='650px'width='70%' src='$Link' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe> </div> </pre>";
          }
        }
      }


      $collection1 = $database->selectCollection('Links');
      $cursor1 = $collection1->find();

      if ($scc == 24 || $scc == 25 || $scc == 26 || $scc == 27 || $scc == 28 || $scc == 30 || $scc == 54 || $scc == 56 || $scc == 57 || $scc == 58 ||  $scc == 84 || $scc == 85 || $scc == 86 || $scc == 87 || $scc == 88 ||  $scc == 114 || $scc == 115 || $scc == 116 || $scc == 117 || $scc == 118 ||  $scc == 146 || $scc == 147 || $scc == 148 || $scc == 149 || $scc == 150 || $scc == 151  || $scc == 177 || $scc == 178 || $scc == 179 || $scc == 180 || $scc == 181 ||  $scc == 200 || $scc == 201 || $scc == 202 || $scc == 203 || $scc == 204 || $scc == 205 || $scc >= 291 && $scc <= 299) {

        require 'vendor/autoload.php';
        $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
        $database = $client->selectDatabase('Syllabus');
        $collection = $database->selectCollection('Timetable');
        $cursor = $collection->find();
        $subjects = [];
        foreach ($cursor as $document) {
          $subjects[] = $document['Subject'];
        }

        // Check if form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
          $selectedSubject = $_POST['contentDropdown'];

          // Query MongoDB based on the selected subject
          $filter = ['Subject' => $selectedSubject];
          $selectedDocument = $collection->findOne($filter);

          // Display the data for the selected subject

          if ($selectedDocument) {
            echo "<pre><h2>Details for $selectedSubject</h2></pre>";
            echo "<div class='ex'><pre> <p>Explanation: " . $selectedDocument['Explaination'] . "</p> </pre></div>";
            // echo "<pre><p>Link: " . $selectedDocument['Link'] . "</p></pre>";
            echo "<pre><div id='video'> <h4 id='watch' > Watch Videos for better understanding</h4> <iframe height='650px'width='70%' src=" . $selectedDocument['Link'] . " title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' allowfullscreen></iframe> </div> </pre>";
          } else {
            echo "<p>No data found for the selected subject.</p>";
          }
        }

        echo "<br><br><form method='post'>";
        echo " <label for='contentDropdown' >Select Content:</label> <br><br>";
        echo "<select id='contentDropdown' name='contentDropdown'>";

        foreach ($subjects as $subject) {
          echo "<option id='v' class='v' value='$subject'>$subject</option>";
        }

        echo " </select><br><br> <button id='b' type='submit'>Submit</button></form>";
        echo "<br><br><hr>";
      } elseif ($scc == 29 || $scc == 59 || $scc == 89 || $scc == 119 || $scc == 152 || $scc == 182 || $scc == 206) {
      } elseif ($scc >= 275 && $scc <= 290) {
      } elseif ($scc == 300) {
      } else {
        foreach ($cursor1 as $document1) {

          $Day = $document1['Days'];
          $Link1 = $document1['Link1 '];
          $Link2 = $document1['Link2'];
          $Link3 = $document1['Link3'];

          if ($Day == $sc) {

            require 'vendor/autoload.php';
            $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
            $database = $client->selectDatabase('Syllabus');
            $collection = $database->selectCollection('Timetable');
            $subjectToCheck = 'REST';
            $filter = ['Days ' => $Day];
            $document = $collection->findOne($filter);
            if ($document) {
              $Subject = $document['Subject'];

              if ($Subject == $subjectToCheck) {
                // Subject exists for the given day, do something
                echo "";
              } else {
                // Subject does not exist for the given day, display resources
                echo "<hr style='background-color: white; margin: 20px 0;'>";
                echo "<br>";
                echo "<div id='resource-button'><pre><a href='$Link1'><button class='resource-button'>Resource 1</button></a></pre></div> <br>";
                echo "<div id='resource-button'><pre><a href='$Link2'><button class='resource-button'>Resource 2</button></a></pre></div> <br>";
                echo "<div id='resource-button'><pre><a href='$Link3' ><button class='resource-button'>Resource 3</button></a></pre></div> <br>";
                echo "<hr style='background-color: white; margin: 20px 0;'>";
              }
            } else {
              echo "Some thing wnet wrong";
            }
          }
        }
      }
      if ($scc >= 300) {
        $uname = $_SESSION["uname"];
        // echo " <pre ><br> Name: $Subject,<br><br><div id='ex' > $Explaination\n</div> <br><br> </pre> ";
        require 'vendor/autoload.php';
        $client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");
        $database = $client->selectDatabase('Syllabus');
        $collection = $database->selectCollection('Score');
        $usernameToSearch = $uname;
        $filter = ['username' => $usernameToSearch];
        $userDocument = $collection->findOne($filter);
        echo "<br>";
        echo "<b>Your Average Report: </b>";
        // Check if the document was found
        if ($userDocument) {
          // Access the data from the document
          $username = $userDocument['username'];
          $score = $userDocument['score'];

          if ($score < 500) {
            echo "You need some serious progress!<br>";
          } elseif ($score < 800)
            echo "You are an average student!<br>";
        } elseif ($score < 1000) {
          echo "You are doing a good progress!<br>";
        } elseif ($score < 1100) {
          echo "You are an excellent student";
        } else {
          echo "You have not appeared for any exam!<br>";
        }
        echo "<br><hr>";
      } else {
        $_SESSION['submit'] = "done";
        echo "<br>";
        echo "<br><label>Ready for your daily Exam??</label>";
        echo "<br>";

        echo "<br><form action='exam.php' method='post'><button id='exbt' type='submit'>Go for it!</button> </form>";
      } ?>
    </div>
  </div>
</body>
<!-- <script>
  var p = document.getElementById("ex").innerText;

  p = p.match(/(\S+ ){1,10}/g).join("<br>");

  document.getElementById("ex").innerHTML = p;
</script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/gsap.min.js" integrity="sha512-qF6akR/fsZAB4Co1QDDnUXWnaQseLGXoniuSuSlPQK6+aWhlMZcHzkasCSlnWoe+TJuudlka1/IQ01Dnhgq95g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.1/ScrollTrigger.min.js" integrity="sha512-IHDCHrefnBT3vOCsvdkMvJF/MCPz/nBauQLzJkupa4Gn4tYg5a6VGyzIrjo6QAUy3We5HFOZUlkUpP0dkgE60A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="script.js"></script>
<script src="https://cdn.botpress.cloud/webchat/v1/inject.js"></script>
<script src="https://mediafiles.botpress.cloud/38628bbc-dceb-422d-8790-bab1ef048274/webchat/config.js" defer></script>
<script>
  function redirectToExample() {
    // Redirect using JavaScript
    window.location.href = "dailyexam.php";
  }
</script>
<br><br><br>

</html>