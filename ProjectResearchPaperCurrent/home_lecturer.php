<?php include_once("connectdb.php"); ?>
<?php include_once("session.php"); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Research Paper</title>

    <link rel="stylesheet" href="assets/CSS/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="https://www.facebook.com/Research Paper Share group" rel="nofollow">

</head>

<!-- Connecting to BootStrap CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<body>

<div id="page">

    <header class="col-md-12"  >
        <div class="container"  >
            <h1>E4U</h1>

        </div>
    </header>


    <nav  class="col-md-12 navbar navbar-expand-sm bg-info navbar-dark" >
        <div class="container-fluid">
            <ul class="navbar-nav">
                <li class="nav-item "><a class="nav-link" href = "index.html">Home</a></li>
                <li class="nav-item active"><a class="nav-link" href = "home_lecturer.php">Dash Board</a></li>
                <li class="nav-item "><a class="nav-link" href = "projects.php">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href = "papers.php">Papers</a></li>
                <li class="nav-item"><a class="nav-link" href = "ManageStudents.php">Manage Students</a></li>
                <li class="nav-item"><a class="nav-link" href = "reviews.php">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href = "index.html">log Out</a></li>

            </ul>
        </div>

    </nav>
<br>
    <br>
    <main class="col-md-12">

<div>
        <h2>Welcome  <?php echo htmlentities( $_SESSION['username']); ?></h2>
<?php
$msg ='';
global $db;

$CurrentUserName = $_SESSION['username'];
$getName = "SELECT * FROM login WHERE username='$CurrentUserName'";
$Result = mysqli_query($db, $getName);
$DataRows = mysqli_fetch_assoc($Result);
$Name = $DataRows['name'];


?>
</div>
    </main>
<br>
    <br>

    <footer>
        <div id="thirdcontainer" >
            <h4> Connect with us
                <a target="_blank" title="find us on Facebook" href="http://www.facebook.com/Research Paper Share group"><img alt="follow me on facebook" src="//login.create.net/images/icons/user/facebook_30x30.png" border=0></a></h4>

        </div>
    </footer>
</div>
</body>
</html>