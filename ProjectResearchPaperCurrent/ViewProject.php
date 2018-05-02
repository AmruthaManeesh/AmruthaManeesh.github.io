<?php include_once("session.php"); ?>

<?php include_once("connectdb.php");

?>


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
                <li class="nav-item active"><a class="nav-link" href = "home_student.php">Dash Board</a></li>
                <li class="nav-item "><a class="nav-link" href = "UploadPapers.php">Upload Papers</a></li>
                <li class="nav-item"><a class="nav-link" href = "UploadReviews.php">Upload Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href = "ViewProject.php">Project</a></li>
                <li class="nav-item"><a class="nav-link" href = "index.html">log Out</a></li>
            </ul>
        </div>

    </nav>
<br>
    <br>
    <main class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <!-- Header for the table. -->
                <tr>
                    <th>SN.</th>
                    <th>Team Members</th>
                    <th>Role</th>
                </tr>

                <?php
                global $db;

                $currentuser = $_SESSION['username'];

                $getName = "SELECT * FROM login WHERE username='$currentuser'";
                $Result = mysqli_query($db, $getName);
                $DataRows = mysqli_fetch_assoc($Result);
                $Name = $DataRows['name'];

                $getTeamName = "SELECT * FROM teams WHERE teammembers='$Name'";
                $ResultTeamName = mysqli_query($db, $getTeamName);
                $TeamDataRow = mysqli_fetch_assoc($ResultTeamName);
                $TeamName = $TeamDataRow['teamname'];

                $ViewTeamMembers = "SELECT * FROM teams WHERE teamname='$TeamName'";
                $ResultTeamMembers = mysqli_query($db,   $ViewTeamMembers );



                $SrNo = 0;
                while ($TeamMemberRows=mysqli_fetch_assoc( $ResultTeamMembers)) {

                    $Team_Name = $TeamMemberRows["teamname"];
                    $GLOBALS['Team_Name'] = $Team_Name;

                        //We will use the Team_Name to get details of the project from the project table.
                        $viewProjects = "SELECT * FROM projects WHERE TeamName='$Team_Name'";
                        $viewProjectsResult = mysqli_query($db, $viewProjects);
                        $DataRows =mysqli_fetch_assoc($viewProjectsResult);
                        $title = $DataRows["title"];
                        $GLOBALS['title'] = $title;
                        $course = $DataRows["course"];
                        $GLOBALS['course'] = $course;

                    $TeamMember = $TeamMemberRows["teammembers"];
                    $Teamleader = $TeamMemberRows["teamleader"];
                //This will help maintain correct numbering of the SN. field
                $SrNo++;
                ?>

                <!-- New Row -->
                <tr>
                    <td><?php echo $SrNo; ?> </td>
                    <td><?php echo $TeamMember; ?> </td>
                    <td><?php echo $Teamleader; ?> </td>
                </tr>

                <?php } ?>

                <h3>Team Name: <?php echo htmlentities($Team_Name) ?> </h3>
                <h3>Project Title: <?php echo htmlentities($title) ?> </h3>
                <h3>Course: <?php echo htmlentities($course) ?> </h3>

            </table>


        </div>
    </main>





    <footer>
        <div id="thirdcontainer" >
            <h4> Connect with us
                <a target="_blank" title="find us on Facebook" href="http://www.facebook.com/Research Paper Share group"><img alt="follow me on facebook" src="//login.create.net/images/icons/user/facebook_30x30.png" border=0></a></h4>

        </div>
    </footer>
</div>
</body>
