<?php
session_set_cookie_params(0);
session_start();

if (!isset($_SESSION['login']) || ($_SESSION['login'] !== true)) {
  header('Location: /admin/firstpage.php');
}
if (!isset($_SESSION['inc'])) {
  $_SESSION['inc'] = 1;
}


$q[] = '';
$answer[] = '';
require 'vendor/autoload.php';

// Create a MongoDB client
$client = new MongoDB\Client("mongodb+srv://Sohail2902:Soh%40il290204@studdy-buddy.ctaliif.mongodb.net/");

// Select a database
$database = $client->selectDatabase('Syllabus');
$scc = $_SESSION['date'];
$collection = $database->selectCollection('exam1');
$filter = ['Day' => $scc];

$mcqs = $collection->find();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Handle form submission
  $correctoption = $_SESSION['answer'];
  $selectedOption = $_POST['fav_language'];

  // echo "$selectedOption ,$correctoption";
  $document = $collection->findOne($filter);

  if ($correctoption == $selectedOption) {
    $uname = $_SESSION["uname"];
    $collection = $database->selectCollection('Score');

    // Assuming you have the username and updated score

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
    // echo "<script>alert('Right Answer');</script>";
  } else {
    $correctoption = $_SESSION['answer'];
    $q[] = $_SESSION['question'];
    $answer[] = $correctoption;
    echo "<script>alert('Wrong Answer, Right Answer was $correctoption');</script>";
  }
  exit; // Ensure no further content is sent
}
?>

<!DOCTYPE html>
<html lang="en">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>MCQ Quiz</title>
<style>
  #quiz-container {
    font-family: Arial, sans-serif;
    color: #fff;
    position: relative;
    max-width: 600px;
    height: 550px;
    font-size: 20px;
    margin: 50px;
    background-color: transparent;
    background: rgba(0, 0, 0, 0.8);
    padding-right: 80px;
    padding-left: 80px;
    border: 2px solid #fff;
    top: 20px;
    left: 10px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  .question {
    margin-bottom: 20px;
  }

  /* .options {
    margin-top: 10px;
  }

  .option {
    margin-bottom: 10px;
  } */

  button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }

  #bg {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: fixed;
    top: 0;
    left: 0;
    z-index: -1;
    filter: blur(3px);
  }


  .container {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .container input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark {
    position: absolute;
    top: 3px;
    left: 5px;
    height: 20px;
    width: 20px;
    background-color: #eee;
    border-radius: 50%;
  }

  .container:hover input~.checkmark {
    background-color: #ccc;
    height: 22px;
    width: 22px;
  }

  .container input:checked~.checkmark {
    background-color: #C5652B;
  }
  .container .checkmark:after {
    top: 9px;
    left: 9px;
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: white;
  }

  .open {
    display: inline-block;
    padding: 8px 15px;
    margin: 5px;
    width: 30%;
    border: 2px solid #AF5626;
    border-radius: 10px;
    background: rgba(0, 0, 0, 0.5);
    background-color: transparent;
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    transition: all 0.3s ease;
  }

  .open:hover {
    width: calc(30% + 10px);
    color: #fff;
    margin: 0 5px;
    border: 3px solid #D7A176;
    border-radius: 10px;
    background-color: transparent;
    text-decoration: none;
    font-size: 16px;
  }
</style>
</head>

<body>
  <img id="bg" src="\images\dailyexam.png">
  <div id="quiz-container">
    <br>
    <h2>MCQ Quiz</h2>
    <?php
    foreach ($mcqs as $mcq) {
      $d = $mcq['Day'];
      $e = $mcq['no'];
      echo '<div id="ref">';
      $incc = $_SESSION['inc'];

      if ($d == $scc && $incc == $e) {
        if ($incc >= 9) {
          echo "<div> You have Successfully Completed your exam</div>";
          $_SESSION['inc'] = 1;
          echo "<br><br>";
          echo "<input type='button' class='open' value='Click here to go back' onclick='redirectToExample()'>         ";
        } else {
          $_SESSION['question'] = $mcq['Question 1'];

          echo '<div class="question">' . $mcq['Question 1'] . '</div>';
          echo '<div class="options">';
          echo "<form onsubmit='inc(); ' method='post'>";
          $a = $mcq['a'];
          $b = $mcq['b'];
          $c = $mcq['c'];
          $d = $mcq['d'];
          $ans = $mcq['ans'];
          $_SESSION['answer'] = $ans;
          echo "<label class='container'> <input type='radio' class='option'  name='fav_language' value='$a'>a) $a <span class='checkmark'></span> </label> <br>";
          echo "<label class='container'> <input type='radio' class='option'  name='fav_language' value='$b'>b) $b <span class='checkmark'></span> </label> <br>";
          echo "<label class='container'> <input type='radio' class='option'  name='fav_language' value='$c'>c) $c <span class='checkmark'></span> </label><br>";
          echo "<label class='container'> <input type='radio' class='option'  name='fav_language' value='$d'>d) $d <span class='checkmark'></span> </label><br><br>";
          echo "<div id='i'> </div>";
          echo "</div>";
          echo ' <button class="open" type="submit">Submit</button> <br> <br><br><br>';
          echo "</form>";
        }
      }
      echo '</div>';
    }
    ?>
  </div>
  <script>
    function inc() {
      // Increment the session variable using AJAX
      $.ajax({
        type: "POST",
        url: "test.php", // Create a separate PHP file to handle the increment
        success: function(response) {
          console.log(response);
          // Refresh the entire page after successful increment
          location.reload(true);
        }
      });
    }
  </script>

  <script>
    function redirectToExample() {
      // Redirect using JavaScript
      window.location.href = "countdown.php";
    }
  </script>
</body>

</html>