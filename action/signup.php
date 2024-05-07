<?php
require_once '../vendor/autoload.php';

$mongoClient = new MongoDB\Client("mongodb://localhost:27017");
$db = $mongoClient->mydb;
$useraccount = $db->account;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   // Retrieve form data
   $fname = $_POST["fname"];
   $lname = $_POST["lname"];
   $phonenum = $_POST["phonenum"];
   $email = $_POST["email"];
   $password = $_POST["password"];

   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Invalid email format.";
      exit;
   }

   $existingUser = $useraccount->findOne(['Email' => $email]);
   
   if ($existingUser) {
      echo "Email already registered. Please use a different email address.";
      exit;
   } else {
      // Hash the password securely
      $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

      // Insert user data into the MongoDB collection "account"
      $data = array(
         "Firstname" => $fname,
         "Lastname" => $lname,
         "Phone Number" => $phonenum,
         "Email" => $email,
         "Password" => $hashedPassword
      );

      $insert = $useraccount->insertOne($data);
      if ($insert) {
?>
         <center>
            <h4>Registration Successful!</h4>
         </center>
         <center>
            <a href="../index.php">Login</a>
            <?php
            header('Location: ../index.php');
            ?>
         </center>
      <?php
      } else {
      ?>
         <center>
            <h4>Registration failed. Please try again.</h4>
         </center>
         <center>
            <a href="../signup.php">Try Again</a>
         </center>
<?php
      }
   }
}
?>