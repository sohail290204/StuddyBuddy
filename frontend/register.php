<!DOCTYPE html>
<html lang="en">
<meta name="google-signin-client_id" content="793066271845-lrbrmbuksp85427pojtpmqo56ogtjjre.apps.googleusercontent.com">
<?php session_start(); ?>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="register.css">
<title>Registration Form</title>
</head>

<body>
    <?php
    $_SESSION['first'] = "first";
    ?>
    <div class="container">
        <div class="form-container">
            <div class="login-content">
                <form action="register1.php" method="post">

                    <div class="form-group">
                        <h2 class="title">Student Registration Form</h2>
                        <div class="first">
                            <br>
                            <div class="input-div one">
                                <div class="div">
                                    <h5>Username</h5>
                                    <input type="text" id="username" class="input" name="username" required>
                                </div>

                            </div>
                            <br>
                            <div class="input-div one">
                                <div class="div">
                                    <h5>Phone Number</h5>
                                    <input type="tel" id="phone" class="input" name="phone" required>
                                </div>
                            </div>
                            <br>
                            <div class="input-div one">
                                <div class="div">
                                    <h5>Password</h5>
                                    <input type="password" id="password" class="input" name="password" required>
                                    <!-- <i class="fas fa-eye" id="togglePassword"></i> -->
                                </div>
                            </div>


                        </div>
                        <div class="second">
                            <div class="input-div one">
                                <div class="div">
                                    <h5>Name</h5>
                                    <input type="text" id="name" class="input" name="name" required>
                                </div>
                            </div>

                            <br>

                            <div class="input-div one">
                                <div class="div">
                                    <h5>Email</h5>
                                    <input type="text" id="email" class="input" name="email" required>
                                </div>
                            </div> <br>
                            <div class="input-div one">
                                <div class="div">
                                    <h5>Re-Enter Password</h5>
                                    <input type="password" id="reenterpassword" class="input" name="reenterpassword" required>
                                    <!-- <i class="fas fa-eye" id="toggleReenterPassword"></i> -->
                                </div>
                            </div>
                        </div>
                        <div class="usernameError"><span id="usernameError"> </span><br><br><span id="passwordError"></span></div>
                    </div>
                    <input type="submit" id="submitBtn" class="btn" value="Register">


                    <div class="a">Already have an account? <br><a href="LOGIN.php"> Click Here!!</a></div>
                    <br>
                </form>
            </div>
        </div>
        <div class="image-container"></div>
    </div>

    <script>
        $(document).ready(function() {
            // Function to check if username is available
            function checkUsernameAvailability() {
                let username = $("#username").val();
                $.post("usernamecheck.php", {
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

    <script type="text/javascript" src="main.js"></script>
</body>

</html>