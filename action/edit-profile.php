<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
} else {

    //this for requirq fill or mongodriver to connect to php
    require_once '../vendor/autoload.php';

    //conect to mongoDb database
    $databaseConnection = new MongoDB\Client;

    //connect specific data base to my data base collection
    $mydatabase = $databaseConnection->mydb;

    //connect to db collection
    $useraccount = $mydatabase->account;

    $userEmail = $_SESSION['email'];

    $data = array(
        "Email" => $userEmail,
    );
    //fetch user from mongo user collection
    $fetch = $useraccount->findOne($data);
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

            :root {
                --first-color: hsl(228, 81%, 49%);
                --title-color: hsl(228, 12%, 15%);
                --text-color: hsl(228, 8%, 50%);
                --body-color: hsl(228, 100%, 99%);
                --container-color: #fff;

                --body-font: 'Poppins', sans-serif;
                --normal-font-size: .938rem;
            }

            /* Responsive typography */
            @media screen and (min-width: 968px) {
                :root {
                    --normal-font-size: 1rem;
                }
            }

            * {
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }

            body {
                position: relative;
                font-family: var(--body-font);
                font-size: var(--normal-font-size);
                background-color: var(--body-color);
                color: var(--text-color);
                background: linear-gradient(to right, #ffffff, #b3e7e2);

            }

            h1 {
                color: var(--title-color);
            }

            a {
                text-decoration: none;
            }

            .container {
                margin-left: 1rem;
                margin-right: 1rem;
            }

            .section {
                padding: 2rem 0;
            }

            @media screen and (max-width: 767px) {

                .nav__logo,
                .nav__toggle,
                .nav__name {
                    display: none;
                }

                .nav__list {
                    position: fixed;
                    bottom: 2rem;
                    background-color: var(--container-color);
                    box-shadow: 0 8px 24px hsla(228, 81%, 24%, .15);
                    width: 90%;
                    padding: 30px 40px;
                    border-radius: 1rem;
                    left: 0;
                    right: 0;
                    margin: 0 auto;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    column-gap: 36px;
                    transition: .4s;
                }
            }

            .nav__link {
                display: flex;
                color: var(--text-color);
                font-weight: 500;
                transition: .3s;
            }

            .nav__link i {
                font-size: 1.25rem;
            }


            .nav__namee {
                font-size: 0.9rem;
            }

            .nav__link:hover {
                color: lightgreen;

            }

            .active-link {
                color: lightgreen;
            }

            @media screen and (max-width: 320px) {
                .nav__list {
                    column-gap: 20px;
                }
            }

            @media screen and (min-width: 576px) {
                .nav__list {
                    width: 332px;
                }
            }

            @media screen and (min-width: 767px) {
                .container {
                    margin-left: 7rem;
                    margin-right: 1.5rem;
                }

                .nav {
                    position: fixed;
                    left: 0;
                    background-color: var(--container-color);
                    box-shadow: 1px 0 4px hsla(228, 81%, 49%, .15);
                    width: 84px;
                    height: 100vh;
                    padding: 2rem;
                    transition: .3s;
                }

                .nav__logo {
                    display: flex;
                }

                .nav__logo i {
                    font-size: 1.25rem;
                    color: lightgreen;
                }

                .nav__logo-name {
                    color: var(--title-color);
                    font-weight: 600;
                }

                .nav__logo,
                .nav__link {
                    align-items: center;
                    column-gap: 1rem;

                }

                .nav__list {
                    display: grid;
                    row-gap: 4.5rem;
                    margin-top: 3rem;
                }


                .nav__content {
                    overflow: hidden;
                    height: 100%;
                }

                .nav__toggle {
                    position: absolute;
                    width: 20px;
                    height: 20px;
                    background-color: var(--title-color);
                    color: #fff;
                    border-radius: 50%;
                    font-size: 1.20rem;
                    display: grid;
                    place-items: center;
                    top: 2rem;
                    right: -10px;
                    cursor: pointer;
                    transition: .4s;
                }
            }


            .min_con1 {
                border: 1px solid black;
                text-align: center;
                width: 25%;
                height: 30%;
            }

            #searchInput {
                width: 20%;
                padding: 5px 5px;

            }




            /* Show menu */
            .show-menu {
                width: 255px;
            }

            /* Rotate toggle icon */
            .rotate-icon {
                transform: rotate(180deg);
            }

            /* For 2K & 4K resolutions */
            @media screen and (min-width: 2048px) {
                body {
                    zoom: 1.7;
                }
            }

            @media screen and (min-width: 3840px) {
                body {
                    zoom: 2.5;
                }
            }

            /* styles.css */
            .profile-form {
                text-align: center;
                margin: 20px;
                padding: 20px;
                background-color: #f2f2f2;
                border: 1px solid #ccc;
                border-radius: 10px;
            }

            .input-field {
                width: 100%;
                padding: 10px;
                margin: 5px 0;
                border: 1px solid #ccc;
                border-radius: 5px;
            }

            .submit-button {
                background-color: #007BFF;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }

            .previous-page-button {
                background-color: #ccc;
                color: #333;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
            }

            /* Add any additional styling as needed */

            /* ====================================================== */
        </style>

        <title>Responsive sidebar menu - Bedimcode</title>
    </head>

    <body>
        <!--=============== NAV ===============-->
        <div class="nav" id="nav">
            <nav class="nav__content">
                <div class="nav__toggle" id="nav-toggle">
                    <i class='bx bx-chevron-right'></i>
                </div>


                <a href="#" class="nav__logo">
                    <i class='bx bxs-heart'></i>
                    <span class="nav__logo-name">Healthy</span>
                </a>




                <div class="nav__list">
                    <a href="../profile.php" class="nav__link active-link">
                        <i class='bx bx-user'></i>
                        <span class="nav__name">User</span>
                    </a>
                    <a href="../home.php" class="nav__link active-link">
                        <i class='bx bx-home-alt-2' href="../home.php"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>

                    <a href="../agent.php" class="nav__link">
                        <i class='bx bxs-factory'></i>
                        <span class="nav__name">Manufacturer</span>
                    </a>

                    <a href="../category.php" class="nav__link">
                        <i class='bx bx-category'></i>
                        <span class="nav__name">Category</span>
                    </a>

                    <a href="../medicine.php" class="nav__link">
                        <i class='bx bx-capsule'></i>
                        <span class="nav__name">Medicine</span>
                    </a>
                    <a href="../logout.php" class="nav__link">
                        <i class='bx bx-log-out'></i>
                        <span class="nav__name">Log-out</span>
                    </a>
                </div>
            </nav>
        </div>

        <main class="container section">
            <?php
            require_once '../vendor/autoload.php';

            $databaseConnection = new MongoDB\Client;

            // Connect to a specific database
            $mydatabase = $databaseConnection->mydb;

            // Select the "manu" collection
            $collection = $mydatabase->account;


            // Execute the query and get the result cursor
            $result = $collection->find([]);

            // Convert the cursor to an array
            $resultArray = iterator_to_array($result);

            // Get the total number of documents in the array using count()
            $totalDocuments = count($resultArray);
            ?>
            <?php foreach ($resultArray as $document) { ?>
                <div class="profile-form">
                    <p>First Name: <?php echo $document['Firstname']; ?></p>
                    <p>Last Name: <?php echo $document['Lastname']; ?></p>
                    <p>Email: <?php echo $document['Email']; ?></p>
                    <p>Phone Number: <?php echo $document['Phone Number']; ?></p>
                    <form action="edit-profile-action.php" method="post">
                        <input type="hidden" name="updateRecordId" value="<?php echo $document['_id']; ?>">
                        <input type="text" name="firstname" class="input-field" id="fname" placeholder="First Name" value="<?php echo $document['Firstname']; ?>" required>
                        <br><br>
                        <input type="text" name="lastname" class="input-field" id="lname" placeholder="Last Name" value="<?php echo $document['Lastname']; ?>" required>
                        <br><br>
                        <input type="text" name="phonenumber" class="input-field" id="phonenumber" placeholder="Phone Number" value="<?php echo $document['Phone Number']; ?>" required>
                        <br><br>
                        <input type="email" name="email" class="input-field" id="email" placeholder="Email" value="<?php echo $document['Email']; ?>" required>
                        <br><br>
                        <button type="submit" class="submit-button">Update</button>
                        <button class="previous-page-button" onclick="goBack()">Previous Page</button>
                    </form>
                </div>

            <?php } ?>
        </main>
        <script>
            // JavaScript function to go back to the previous page
            function goBack() {
                window.history.back();
            }
        </Script>
        <script>
            function validateForm() {
                // ...

                // Show the loading screen and hide the form
                document.getElementById("loading").style.display = "block";
                document.getElementById("signup").style.display = "none";

                return !errorsExist;
            }
        </script>

        <script src="cdnjs.cloudflare.com_ajax_libs_jquery_3.5.1_jquery.min.js"></script>
        <script>
            const linkColor = document.querySelectorAll('.nav__link')

            function colorLink() {
                linkColor.forEach(l => l.classList.remove('active-link'))
                this.classList.add('active-link')
            }

            linkColor.forEach(l => l.addEventListener('click', colorLink))

            /*=============== SHOW HIDDEN MENU ===============*/
            const showMenu = (toggleId, navbarId) => {
                const toggle = document.getElementById(toggleId),
                    navbar = document.getElementById(navbarId)

                if (toggle && navbar) {
                    toggle.addEventListener('click', () => {
                        /* Show menu */
                        navbar.classList.toggle('show-menu')
                        /* Rotate toggle icon */
                        toggle.classList.toggle('rotate-icon')
                    })
                }
            }
            showMenu('nav-toggle', 'nav')
        </script>
    </body>

    </html>


<?php
}
?>