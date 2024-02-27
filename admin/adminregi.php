<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <style>
        * {
            color: antiquewhite;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "montserrat";
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
            margin: 0;
            max-height: 100%;
        }

        form {
            color: #ddd;
            background-color: rgba(0, 0, 0, 0.85);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-radius: 24px;
            width: 1000px;
            position: fixed;
            left: 200px;
            top:25px;
            height: 600px;
            font-size: 15px;
            margin: 0 auto;
        }

        #first {
            position: relative;
            left: -260px;
            top: 40px;
            text-align: center;
            margin-left: 50px;
        }

        #second {
            position: relative;
            left: 210px;
            top: -314px;
            text-align: center;
            margin-left: 50px;
        }

        h1 {
            margin-bottom: 20px;
            font-size: 30px;
            text-align: center;
            /* Center the heading */
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 10px;
        }

        input {
            width: 400px;
            /* Full width for better responsiveness */
            text-align: center;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            border: 2px solid whitesmoke;
            border-radius: 24px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input:hover {
            background-color: rgba(0, 0, 0, 0.6);
        }

        input[type="submit"] {
            background-color: rgb(150, 126, 70);
            color: #fff;
            width: 100%;
            padding: 13px;
            position: relative;
            top: -220px;
            border: 2px solid black;
            border-radius: 24px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        @media only screen and (max-width: 768px) {
            form {
                font-size: 14px;
                /* Adjusted font size for smaller screens */
            }

            input[type="submit"] {
                font-size: 14px;
                /* Adjusted font size for smaller screens */
            }
        }

        input[type="submit"]:disabled {
            /* Adjust styles when the button is disabled */
            background-color: rgb(150, 126, 70);
            border-color: rgba(0, 0, 0, 0.3);
            cursor: not-allowed;
            opacity: 0.7;
        }

        input[type="submit"]:hover:disabled {
            /* Add animation properties for the disabled state */
            animation: shake 0.3s ease;
        }

        @keyframes shake {

            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(-5px);
            }
        }

        input[type="submit"]:hover {
            background-color: rgb(14, 9, 6);
            border: 1.5px solid white;
        }

        #bg {
            height: 100%;
            width: 100%;
            height: auto;
            object-fit: cover;
            position: fixed;
            top: 0;
            left: 0;
            z-index: -1;
            filter: blur(3px);
        }


        .password-container {
            width: calc(100% - 20px);
            position: relative;
            display: inline-block;
        }

        .password-container i {
            position: absolute;
            right: 250px;
            top: 35%;
            transform: translateY(-50%);
            cursor: pointer;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>

<body>
    <div id="main">
        <form action="reg.php" method="POST">
            <?php

            $_SESSION['first'] = "sixth";
            ?>
            <h1><b>Teacher Registration</b></h1>
            <div id="first">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
                <span id="usernameError"></span>


                <label for="username">Subject:</label>
                <input type="text" id="subject" name="subject" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div id="second">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
                <label for="password">Password:</label>

                <div class="password-container">
                    <input type="password" id="password" name="password" required>
                    <i class="fas fa-eye" id="togglePassword"></i>
                </div>

                <label for="re-enterpassword">Re-Enter Password:</label>
                <div class="password-container">
                    <input type="password" id="reenterpassword" name="reenterpassword" required>
                    <i class="fas fa-eye" id="toggleReenterPassword"></i>
                </div><br>

                <span id="passwordError"></span><br>
            </div>
            <input type="submit" id="submitBtn" disabled>

        </form>
    </div>
    <img src="\images\student_register.png" id="bg" alt="Background Image">
</body>
<script>
    $(document).ready(function() {
        <?php $_SESSION['f'] = 'f' ?>
        // Function to check if username is available
        function checkUsernameAvailability() {
            let username = $("#username").val();
            $.post("usernamecheck1.php", {
                username: username
            }, function(data) {
                $("#usernameError").html(data);
                // Enable or disable the submit button based on validation results
                updateSubmitButtonState();
            });
        }

        // Function to check if passwords match
        function checkPasswordMatch() {
            let password = $("#password").val();
            let confirmPassword = $("#reenterpassword").val();
            if (password !== confirmPassword) {
                $("#passwordError").html("Passwords do not match");
            } else {
                $("#passwordError").html("");
            }
            // Enable or disable the submit button based on validation results
            updateSubmitButtonState();
        }

        // Function to update the submit button state based on validation results
        function updateSubmitButtonState() {
            let passwordMatch = $("#passwordError").text().trim() === "";
            let usernameExists = $("#usernameError").text().includes("exists");
            let disableButton = usernameExists || !passwordMatch;
            $("#submitBtn").prop("disabled", disableButton);
        }

        // Event listeners for input fields
        $("#username").on("input", checkUsernameAvailability);
        $("#reenterpassword, #password").on("input", checkPasswordMatch);

        // Initial button state check
        updateSubmitButtonState();
    });
</script>
<script>
    $(document).ready(function() {
        // Toggle password visibility
        $("#togglePassword").click(function() {
            togglePasswordVisibility("password");
        });

        $("#toggleReenterPassword").click(function() {
            togglePasswordVisibility("reenterpassword");
        });

        function togglePasswordVisibility(inputId) {
            var inputType = $("#" + inputId).attr("type");
            if (inputType === "password") {
                $("#" + inputId).attr("type", "text");
            } else {
                $("#" + inputId).attr("type", "password");
            }
        }
    });
</script>

</html>