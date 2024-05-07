<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $firstName = trim($_POST["fname"]);
        $lastName = trim($_POST["lname"]);
        $phoneNumber = trim($_POST["phonenum"]);
        $email = trim($_POST["email"]);
        $password = $_POST["password"];

        $namePattern = '/^[A-Za-z]{2,}$/';
        $phonePattern = '/^\d{8,}$/';
        $emailPattern = '/^\S+@\S+\.\S+$/';
        $passwordPattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/';

        $errors = [];

        if (!preg_match($namePattern, $firstName) || !preg_match($namePattern, $lastName)) {
            
        }

        if (!preg_match($phonePattern, $phoneNumber)) {
            $errors[] = "Invalid phone number. It should contain only digits and be at least 8 characters long.";
        }

        if (!preg_match($emailPattern, $email)) {
            $errors[] = "Invalid email address.";
        }

        if (!preg_match($passwordPattern, $password)) {
            $errors[] = "Invalid password. It should be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.";
        }

        if (count($errors) > 0) {
            foreach ($errors as $error) {
                echo "<p>Error: $error</p>";
            }
        } else {
            // All validations passed, do something with the data (e.g., store it in a database)
            // In a real-world application, don't forget to use proper security measures like hashing the password.
            header('Location: ../home.php');

        }
    }
    ?>