    <?php include_once("connectdb.php"); ?>


    <!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie = edge">

        <!--BootStrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <!--My Style Sheets -->
        <link rel="stylesheet" href="assets/CSS/lecturer.css">
        <link rel="stylesheet" href="../assets/css/adminstyles.css">

        <title>Admin Dashboard</title>

    </head>

    <!-- Connecting to BootStrap CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Unable to save the local library for this link Popper.js-->
    <!-- <script src="https://cdnjs.cloudfare.com/ajax/libs/pooper.js/1.12.9/umd/popper.min.js"></script> -->

    <!-- Had to use this link instead to save the local library for this Popper.js link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <body>

    <!-- The Navigation bar -->
    <div style="height: 5px; background: midnightblue;"></div>

    <nav class="navbar navbar-expand-sm navbar-light #e7e7e7">
        <a class="navbar-brand" href="../index.php"><img src="../assets/images/layout/LearnIT.png" width="230" height="40">
        </a>

        <!-- Collapsing the Navigation bar -->
        <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Here are the items we are collapsing identified by id -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>

            </ul>

        </div>
    </nav>

    <div style="height: 5px;"></div>

    <div class="container-fluid">  <!--Beginning of bootstrap page Container -->
        <div class="row">  <!--Beginning of rows -->

            <!--Beginning of page side panel area -->
            <div class="col-sm-2">

                <ul id="side_menu" class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="home_lecturer.php">Dashboard</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"  href="projects.php">Project </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">Papers</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admins.php">Students</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>

                </ul>

            </div>
            <!--Ending of page side panel area -->

            <!--Beginning of main  area -->
            <div class="col-sm-10">
                <!-- For Error Message Notification when "Add New Category." on the Categories page fails. -->
                <div>

                </div>

                <h1>Dashboard</h1>
                <div class="table-responsive">


                </div>


            </div>
            <!--Ending of page main area -->

        </div>  <!--Ending of rows -->

    </div>  <!--Ending of bootstrap page Container -->

    <!--Footer Begins -->
    <div id="Footer">

        <hr>

        <a style="color: white; text-decoration: none; cursor: pointer; font-weight:bold;" href=="http://www.rgu.ac.uk">
            <p>
                My Project
            </p>
        </a>
        <hr>

    </div>

    <div style="height: 10px; background: #27AAE1; "></div>

    </body>

    </html>