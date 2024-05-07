<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <style>

    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="AIzaSyD1eQXAddFFd2z9T7dR5KtWLb1HPBhHp_8.googleusercontent.com">
    <title>Document</title>
    <link rel="stylesheet" href="css/index.css">
    <!-- <script src="httsps://accounts.google.com/gsi/client" async></script> -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #ffffff, lightgreen);
        }

        .con {
            max-width: 50%;
            background-color: #ffffff;
            padding: 20px;
            margin: 50px auto;
            margin-top: 15%;
            box-shadow: 0px 0px 50px black;
            border-top-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }


        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
            width: 96.8%;
            padding: 10px;
            padding-right: 10px;
            margin-bottom: 15px;
            border: 1px solid #dddddd;
            border-top-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }


        #fname:hover {
            box-shadow: 0px 0px 10px black;

        }

        #lname:hover {
            box-shadow: 0px 0px 10px black;
        }

        #password:hover {
            box-shadow: 0px 0px 10px black;
        }

        #phonenum:hover {
            box-shadow: 0px 0px 10px black;

        }

        #email:hover {
            box-shadow: 0px 0px 10px black;
        }

        #login {
            width: 100%;
            padding: 12px;
            background-color: black;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        #login:hover {
            background-color: lightgreen;
        }

        .error {
            color: red;
        }

        @media only screen and (max-width: 600px) {
            .con {
                max-width: 90%;
                margin: 30px auto;
            }

            input[type="text"],
            input[type="email"],
            input[type="tel"],
            input[type="password"],
            button {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <form action="action/login.php" method="post" onsubmit="return validateForm()">
        <div class="con">
            <input type="email" placeholder="EMAIL" name="email" id="email">
            <span id="emailError" class="error"></span><br><br>
            <input type="password" placeholder="PASSWORD" name="password" id="password">
            <span id="passwordError" class="error"></span><br><br>
            <a href="signup.php">create an account</a>
            <br><br>
            <input type="submit" value="Login" name="login" id="login"><br><br>
            
            
            <!-- <div class="signBtn">
                <div class="g_id_signin" data-type="standard" data-shape="circle" data-theme="outline" data-text="continue_with" data-size="large" data-logo_alignment="left">
                </div>
                <div id="g_id_onload" data-client_id="CLIENT_ID" data-context="signin" data-ux_mode="popup" data-callback="handle" data-nonce="" data-auto_select="true" data-itp_support="true">
                </div>
            </div>-->

    </form>
    <script>
        function validateForm() {
            var email = document.getElementById("email").value.trim();
            var password = document.getElementById("password").value;
            var errorsExist = false;

            // Clear previous error messages
            document.querySelectorAll(".error").forEach(errorSpan => errorSpan.textContent = "");

            // Regular expression to validate email format
            var emailRegex = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/;

            if (email === "") {
                document.getElementById("emailError").textContent = "Email cannot be empty.";
                errorsExist = true;
            } else if (!emailRegex.test(email)) {
                document.getElementById("emailError").textContent = "Invalid Email Address.";
                errorsExist = true;
            }

            if (password === "") {

                document.getElementById("passwordError").textContent = "Password cannot be empty.";
                errorsExist = true;
            }

            return !errorsExist; // If errorsExist is false, the form will be submitted
        }
    </script>

</body>

</html>