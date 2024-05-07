<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <script></script>
    <link rel="stylesheet" href="css/signup.css">
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
            margin-top: 5%;
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

        #signup {
            width: 100%;
            padding: 12px;
            background-color: black;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }

        #signup:hover {
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
    <form action="action/signup.php" method="post" onsubmit="return validateForm()">
        <div class="con">
            <input type="text" placeholder="FIRST NAME" name="fname" id="fname">
            <span id="fnameError" class="error"></span><br><br>
            <input type="text" placeholder="LAST NAME" name="lname" id="lname">
            <span id="lnameError" class="error"></span><br><br>
            <input type="text" placeholder="PHONE NUMBER" name="phonenum" id="phonenum">
            <span id="phonenumError" class="error"></span><br><br>
            <input type="email" placeholder="EMAIL" name="email" id="email">
            <span id="emailError" class="error"></span><br><br>
            <input type="password" placeholder="PASSWORD" name="password" id="password">
            <span id="passwordError" class="error"></span><br><br>
            <a href="index.php" class="a">already have an account ?</a>
            <br><br>
            <input type="submit" value="signup" name="signup" id="signup" class="button"><br><br>

        </div>
    </form>

    <script>
        function validateForm() {
            var fname = document.getElementById("fname").value.trim();
            var lname = document.getElementById("lname").value.trim();
            var phonenum = document.getElementById("phonenum").value.trim();
            var email = document.getElementById("email").value.trim();
            var password = document.getElementById("password").value;
            var errorsExist = false;

            // Clear previous error messages
            document.querySelectorAll(".error").forEach(errorSpan => errorSpan.textContent = "");

            if (phonenum === "") {

                document.getElementById("phonenumError").textContent = "phone number cannot be empty";
                errorsExist = true;
            } else if (!/^\d{10}$/.test(phonenum)) {
                document.getElementById("phonenumError").textContent = "Invalid Phone Number. Please enter a 10-digit numeric phone number.";
                errorsExist = true;
            }

            if (email === "") {
                document.getElementById("emailError").textContent = "Email cannot be empty.";
                errorsExist = true;
            } else if (!/^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/.test(email)) {
                document.getElementById("emailError").textContent = "Invalid Email Address.";
                errorsExist = true;
            }

            if (password === "") {
                document.getElementById("passwordError").textContent = "Password cannot be empty.";
                errorsExist = true;
            } else if (password.length < 8) {
                document.getElementById("passwordError").textContent = "Password must be at least 8 characters long.";
                errorsExist = true;
            } else if (!/[a-z]/.test(password) || !/[A-Z]/.test(password) || !/\d/.test(password)) {
                document.getElementById("passwordError").textContent = "Password must contain at least one uppercase letter, one lowercase letter, and one numeric digit.";
                errorsExist = true;
            }

            return !errorsExist; // If errorsExist is false, the form will be submitted
        }
    </script>
</body>

</html>