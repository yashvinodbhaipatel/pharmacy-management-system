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

        .updatee {
            margin-left: 25%;
            background-color: gold;
            padding-left: 15%;
        }

        .deletee {
            margin-left: 25%;
            background-color: gold;
            padding-left: 15%;
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

        .category {
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

        .category:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);

        }

        .med {
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

        .med:hover {
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

        .findcategory {
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

        .findcategory:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);

        }

        .findmed {
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

        .findmed:hover {
            box-shadow: 0 6px 10px 0 rgba(0, 0, 0, .1);

        }

        .findsubmit {
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

        .findsubmit:hover {
            background-color: lightgreen;
            border-top-right-radius: 8px;
            border-bottom-left-radius: 8px;
            border-top-left-radius: 0px;
            border-bottom-right-radius: 0px;
        }


        .anm {
            margin-left: 20%;
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
    </style>

    <title>Category</title>
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
        <h1>CATEGORY</h1>

        <form action="action/category.php" method="post">

            <br><br>
            <h3 class="anm">Add New Category</h3>
            <div class="con">
                <center>
                    <input type="text" class="category" name="category" placeholder="CATEGORY NAME">
                    <input type="text" class="med" name="med" id="med" placeholder="MEDICINE NAME">

                    <br><br>
                    <input type="submit" name="submit" class="submit"><br><br>
                </center>
                <h3 class="anm">Find A Category And Medicine</h3>
        </form>

        <center>
            <form action="action/findcategory.php" method="post">
                <input type="text" class="findcategory" name="findcategory" placeholder="CATEGORY NAME">
                <input type="text" class="findmed" name="findmed" id="findMedInput" placeholder="MEDICINE NAME">
                <br><br>
                <input type="submit" name="findsubmit" class="findsubmit" value="Find" id="findButton"><br><br>

            </form>
        </center>
        </div>
        <div class="con2">
            <h2 class="md">CATEGORY DETAILS</h2>
            <br><br>
            <?php
            require_once 'vendor/autoload.php';
            $databaseConnection = new MongoDB\Client;
            // Connect to a specific database
            $mydatabase = $databaseConnection->mydb;
            // Select the "manu" collection
            $collection = $mydatabase->category;
            // Execute the query and get the result cursor
            $result = $collection->find([]);
            // Convert the cursor to an array
            $resultArray = iterator_to_array($result);
            // Get the total number of documents in the array using count()
            $totalDocuments = count($resultArray);
            // Check if there are any documents in the result set before proceeding with the table
            if ($totalDocuments > 0) {
                echo "<table>";
                echo "<tr>";
                echo "<th>Medicine Category</th>";
                echo "<th>Medicine Name</th>";
                echo "<th>Update</th>";
                echo "<th>delete</th>";
                echo "</tr>";
                // Display the data in a table
                foreach ($resultArray as $document) {

                    echo "<tr>";
                    echo "<td>" . $document['Category'] . "</td>";
                    echo "<td>" . $document['Medicine Name'] . "</td>";
                    echo "<td> 
                        
                        <form id='updateFrom' action='action/category-update.php' method='post'>
                          
                        <input type='hidden' name='updateRecordId' id='update' value='" . $document['_id'] . "'>
                        <button type='submit' class='updatee'>Update</button>
                        </form> 
                        </td>";
                    echo "<td>
                                  <form id='deleteForm' action='action/category-delete.php' method='post'>
                                      <input type='hidden' name='deleteRecordId' value='" . $document['_id'] . "'>
                                      <button type='submit' class='deletee'>Delete</button>
                                  </form>
                              </td>";
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "No documents found.";
            }
            ?>
            </table>

        </div>
        <div id="searchResults"></div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function(){
        const findMedInput = $('#findMedInputt');
        const searchResults = $('#searchResults');

        findMedInput.on('keyup', function() {
            const searchTerm = $(this).val();

            $.ajax({
                url: 'action/findcategory.php', // Replace with the correct URL
                method: 'POST',
                data: {
                    findmed: searchTerm
                },
                dataType: 'json',
                success: function(data) {
                    searchResults.empty();

                    data.forEach(function(medicine) {
                        const resultItem = $('<div class="search-result-item"></div>');
                        resultItem.text(medicine.Name);
                        searchResults.append(resultItem);
                    });
                },
                
            });
        });
    });
</script>


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