<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    
} else {

    //this for requirq fill or mongodriver to connect to php
    require_once 'vendor/autoload.php';

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
            body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: flex-start;
        }

        .image {
            width: calc(25% - 20px);
            margin-bottom: 20px;
        }

        .image img {
            width: 100%;
            height: auto;
            display: block;
        }

        @media screen and (max-width: 767px) {
            .image {
                width: calc(50% - 20px);
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

            /* Style for the "Make Sales" container */
            .makesales {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin: 20px auto;
                max-width: 800px;
            }

            /* Style for the form heading */
            .makesales h3 {
                font-size: 24px;
                margin-bottom: 20px;
                color: #333;
            }

            /* Style for the form elements */
            .makesales input[type="text"],
            .makesales input[type="number"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                font-size: 16px;
            }

            /* Style for the submit button */
            .makesales input[type="submit"] {
                background-color: #007bff;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 3px;
                font-size: 16px;
                cursor: pointer;
            }

            /* Style for the submit button on hover */
            .makesales input[type="submit"]:hover {
                background-color: #0056b3;
            }


            /* ====================================================== */
            /* Style for the total revenue container */
            .total-revenue-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                margin: 20px auto;
                max-width: 800px;
                text-align: center;
            }

            /* Style for the total revenue text */
            .total-revenue-text {
                font-size: 24px;
                color: #333;
                margin-bottom: 20px;
            }
        </style>

        <title>Home</title>
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
                    <a href="profile.php" class="nav__link active-link">
                        <i class='bx bx-user'></i>
                        <span class="nav__name">User</span>
                    </a>
                    <a href="home.php" class="nav__link active-link">
                        <i class='bx bx-home-alt-2' href="../home.php"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>

                    <a href="manufacturer.php" class="nav__link">
                        <i class='bx bxs-factory'></i>
                        <span class="nav__name">Manufacturer</span>
                    </a>

                    <a href="category.php" class="nav__link">
                        <i class='bx bx-category'></i>
                        <span class="nav__name">Category</span>
                    </a>

                    <a href="medicine.php" class="nav__link">
                        <i class='bx bx-capsule'></i>
                        <span class="nav__name">Medicine</span>
                    </a>
                    <a href="logout.php" class="nav__link">
                        <i class='bx bx-log-out'></i>
                        <span class="nav__name">Log-out</span>
                    </a>
                </div>
            </nav>
        </div>

        <main class="container section">
            <h1>WELCOME</h1>
            <div class="makesales">
                <h3>Make sales</h3>
                <form action="action/sales.php" method="post">
                    <input type="text" name="Medicinename" id="medicinename" class="medicinename" placeholder="Medicine Name">
                    <input type="number" name="numberofmedicine" class="numberofmedicine" placeholder="Number of Medicine">
                    <input type="number" name="price" class="price" placeholder="Medicine Price">
                    <input type="submit" value="Submit">
                </form>
            </div>
            <!-- Display the total revenue -->
            <div class="total-revenue-container">
                <h3 class="total-revenue-text">Total Revenue</h3>
                <?php
                // Connect to MongoDB
                require_once 'vendor/autoload.php';
                $databaseConnection = new MongoDB\Client;

                // Select your database and collection
                $myDatabase = $databaseConnection->mydb;
                $salesCollection = $myDatabase->sales;

                // Find all documents in the sales collection
                $salesCursor = $salesCollection->find();

                // Initialize total revenue to 0
                $totalRevenue = 0;

                // Iterate through each sales record and calculate total revenue
                foreach ($salesCursor as $salesRecord) {
                    $numberOfMedicine = $salesRecord['Number of Medicine'];
                    $medicinePrice = $salesRecord['Medicine Price'];

                    // Calculate revenue for the current record
                    $revenue = $numberOfMedicine * $medicinePrice;

                    // Add the revenue to the total
                    $totalRevenue += $revenue;
                }

                // Output the total revenue
                echo "<p>Total Revenue: ₹ " . number_format($totalRevenue, 2) . "</p>"; // Format as currency
                ?>
            </div>


        </main>

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