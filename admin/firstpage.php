
<!DOCTYPE html>
<html>

<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "montserrat";
        }

        body {
            font-size:10px;
            margin: 0;
            max-height: 100%;
            padding: 0;
        }

        #bg {
            height: 100%;
            width: 100%;
            object-fit: cover;
            z-index: -1;
            position: fixed;
        }

        #form {
            border-radius: 30px;
            text-align: center;
            position: fixed;
            background-color: rgba(0, 0, 0, 0.8);
            color: antiquewhite;
            top: 8px;
            left: 420px;
            transform: translateX(-50%);
            z-index: 10;
            width: 780px;
           
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        #logo {
            width: 45%;
            height: auto;
            display: block;
            margin: -50px auto -45px;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        h2 {
            margin-bottom: 40px;
        }

        .login-section {
            border: 1px solid #c59479;
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 20px;
            display: flex;
            justify-content: space-evenly;
        }

        .login-section label {
            font-size: 18px;
            margin-bottom: 10px;
            display: block;
        }
        a{
            text-decoration: none;
            color: #ddd;
        }
        .login-section button {
            font-size: 17px;
            padding: 10px 22px;
            border-radius: 20px;
            background: transparent;
            color: antiquewhite;
            border: 2px solid #9D6648;
            cursor: pointer;
            transition: background 0.3s ease, padding 0.3s ease, border 0.3s ease;
        }

        .login-section button:hover {
            background: black;
            padding: 10px 24px;
            border: 2px solid #c59479;
        }

   

        #google_translate_element {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 9999;
        }
    </style>
</head>

<body>
    <img id="bg" src="\images\first.png">
    <div id="form">
        <br>
        <img id="logo" src="\images\Blue_Simple_Modern_Graphic_Design_Studio_Logo-removebg-preview.png">
        <form>
            <h1>Get With Us And</h1>
            <h2>Start your learning journey today and experience a study buddy like never before!</h2>

            <div class='login-section' id='student'>
                <label>Student Login</label>
                <button><a href="\frontend\login.php">Login</a></button>
                <button><a href="\frontend\register.php">Register</a></button>
            </div>

            <div class='login-section' id='teacher'>
                <label>Teacher Login</label>
                <button><a href="adminlogin.php">Login</a></button>
                <button><a href="adminregi.php">Register</a></button>
            </div>
        </form>
    </div>
</body>

</html>