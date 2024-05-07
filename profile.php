<?php
session_start();

if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
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
        <title>home page</title>
    </head>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <!--=============== CSS ===============-->
    <style>
        /*=============== GOOGLE FONTS ===============*/



        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap");

        :root {
            /*========== Colors ==========*/
            --first-color: hsl(228, 81%, 49%);
            --title-color: hsl(228, 12%, 15%);
            --text-color: hsl(228, 8%, 50%);
            --body-color: hsl(228, 100%, 99%);
            --container-color: #fff;

            /*========== Font and typo ==========*/
            --body-font: 'Poppins', sans-serif;
            --normal-font-size: .938rem;
        }

        /* Responsive typo */
        @media screen and (min-width: 968px) {
            :root {
                --normal-font-size: 1rem;
            }
        }

        /*=============== BASE ===============*/
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

        /*=============== NAV ===============*/
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

        /* Active link */
        .active-link {
            color: lightgreen;
        }





        /* For small d */
        @media screen and (max-width: 320px) {
            .nav__list {
                column-gap: 20px;
            }
        }

        /* For medium d */
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




        .show-menu {
            width: 255px;
        }

        .rotate-icon {
            transform: rotate(180deg);
        }

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

        /* =============================== */
        .agentname {
            width: 15%;
            background: #fff;
            font: inherit;
            border: 0;
            border: 1px solid #dddddd;
            outline: 0;
            padding: 5px 5px;
            border-top-left-radius: 8px;
            border-bottom-right-radius: 8px;

        }

        .agentname:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);
        }

        .med {
            width: 15%;
            background: #fff;
            font: inherit;
            border: 0;
            border: 1px solid #dddddd;
            outline: 0;
            padding: 5px 5px;
            border-top-left-radius: 8px;
            border-bottom-right-radius: 8px;

        }

        .med:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);
        }

        .email {
            width: 30%;
            background: #fff;
            font: inherit;
            border: 0;
            border: 1px solid #dddddd;
            outline: 0;
            padding: 5px 5px;
            border-top-left-radius: 8px;
            border-bottom-right-radius: 8px;

        }

        .email:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);

        }

        .phonenum {
            width: 23%;
            background: #fff;
            font: inherit;
            border: 0;
            border: 1px solid #dddddd;
            outline: 0;
            padding: 5px 5px;
            border-top-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .phonenum:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);
        }


        .submit {
            width: 20%;
            padding: 10px;
            background-color: black;
            color: #ffffff;
            border: none;
            cursor: pointer;
            content: center;
            border-top-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        .submit:hover {
            background-color: lightgreen;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;
            border-top-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }

        .anm {
            margin-left: 8%;
            padding: 10px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            
        }
        .updatee {
            margin-left: 33%;
            background-color: gold;
            padding-left: 8%;
        }

        .logout {
            margin-left: 40%;
            background-color: gold;
            padding-left: 8%;
        }

        button {
            width: 50%;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            background: red;
            border: none;
            border-radius: 5px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
            background: #e62222;
        }
        button:hover {
            background: #ff3636;
        }
        button .text {
            transform: translateX(35px);
            color: white;
            font-weight: bold;
        }

        /* ************************** */
        button {
            width: 150px;
            height: 50px;
            cursor: pointer;
            display: flex;
            align-items: center;
            background: red;
            border: none;
            border-radius: 5px;
            box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.15);
            background: #e62222;
        }

        button,
        button span {
            transition: 200ms;
        }

        button .text {
            transform: translateX(35px);
            color: white;
            font-weight: bold;
        }

        button .icon {
            position: absolute;
            border-left: 1px solid #c41b1b;
            transform: translateX(110px);
            height: 40px;
            width: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        button svg {
            width: 15px;
            fill: #eee;
        }

        button:hover {
            background: #ff3636;
        }

        button:hover .text {
            color: transparent;
        }

        button:hover .icon {
            width: 150px;
            border-left: none;
            transform: translateX(0);
        }

        button:focus {
            outline: none;
        }

        button:active .icon svg {
            transform: scale(0.8);
        }

        /* ****************************** */
        .con2 {
            width: 100%;
        }
    </style>

    <title>Manufacturer Page</title>
    </head>

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
                <a href="profile.php" class="nav__link">
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
        <h1>PROFILE</h1><br><br>
        <div>
            <table>
                <tr>
                    <td>First Name : </td>
                    <td><?php echo $fetch['Firstname']; ?></td>
                </tr>
                <tr>
                    <td>Last Name : </td>
                    <td><?php echo $fetch['Lastname']; ?></td>
                </tr>
                <tr>
                    <td>Email : </td>
                    <td><?php echo $fetch['Email']; ?></td>
                </tr>
                <tr>
                    <td>Phone Number : </td>
                    <td><?php echo $fetch['Phone Number']; ?></td>
                </tr>
                <tr>
                    <td><form id='updateFrom' action='action/edit-profile.php' method='post'>
                          
                          <input type='hidden' name='updateRecordId' id='update' value='" . $document['_id'] . "'>
                          <button type='submit' class='updatee'>Update</button>
                          </form></td>
                    <td><form id='deleteForm' action='logout.php' method='post'>
                                      <input type='hidden' name='logout' value='" . $document['_id'] . "'>
                                      <button type='submit' class='logout'>Logout</button>
                                  </form></td>
                </tr>
            </table>

        </div>
    </main>
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