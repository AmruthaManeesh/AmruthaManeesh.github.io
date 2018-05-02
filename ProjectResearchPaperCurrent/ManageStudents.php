<?php include_once("connectdb.php"); ?>

<?php include_once("session.php"); ?>

<?php
$msg ='';
global $db;

//TO CREATE A NEW TEAM WHEN SUBMIT BUTTON IS CLICKED
if (isset($_REQUEST['Submit'])) {
// removes backslashes
    $ProjectName = stripslashes($_REQUEST['SelectProject']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $ProjectName = mysqli_real_escape_string($db, $ProjectName);

// removes backslashes
    $TeamName = stripslashes($_REQUEST['TeamName']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $TeamName = mysqli_real_escape_string($db, $TeamName);
//name
// removes backslashes
    $Name1 = stripslashes($_REQUEST['TeamMember1']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Name1 = mysqli_real_escape_string($db, $Name1);

// removes backslashes
    $Name2 = stripslashes($_REQUEST['TeamMember2']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Name2 = mysqli_real_escape_string($db, $Name2);

// removes backslashes
    $Name3 = stripslashes($_REQUEST['TeamMember3']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Name3 = mysqli_real_escape_string($db, $Name3);

// removes backslashes
    $Name4 = stripslashes($_REQUEST['TeamMember4']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Name4 = mysqli_real_escape_string($db, $Name4);

// removes backslashes
    $Name5 = stripslashes($_REQUEST['TeamMember5']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Name5 = mysqli_real_escape_string($db, $Name5);

// role
// removes backslashes
    $Role1 = stripslashes($_REQUEST['SelectTeamLeader1']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Role1 = mysqli_real_escape_string($db, $Role1);

// removes backslashes
    $Role2 = stripslashes($_REQUEST['SelectTeamLeader2']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Role2 = mysqli_real_escape_string($db, $Role2);

// removes backslashes
    $Role3 = stripslashes($_REQUEST['SelectTeamLeader3']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Role3 = mysqli_real_escape_string($db, $Role3);

// removes backslashes
    $Role4 = stripslashes($_REQUEST['SelectTeamLeader4']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Role4 = mysqli_real_escape_string($db, $Role4);

// removes backslashes
    $Role5 = stripslashes($_REQUEST['SelectTeamLeader5']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Role5 = mysqli_real_escape_string($db, $Role5);


    $AdminName = $_SESSION['username'];


    if ($TeamName=="") {
        $msg = 'The Team Name cannot be empty';
    }
    else {
        $stmt = mysqli_prepare($db, "INSERT INTO teams (teamname, teammembers, teamleader) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $TeamName, $Name1, $Role1);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (teamname, teammembers, teamleader) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $TeamName, $Name2, $Role2);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (teamname, teammembers, teamleader) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $TeamName, $Name3, $Role3);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (teamname, teammembers, teamleader) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $TeamName, $Name4, $Role4);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (teamname, teammembers, teamleader) VALUES (?, ?, ?)");
        mysqli_stmt_bind_param($stmt, 'sss', $TeamName, $Name5, $Role5);
        $result = mysqli_stmt_execute($stmt);

        $QueryUpdateProjectTeamName = "UPDATE projects SET TeamName='$TeamName' WHERE title = '$ProjectName'";
        $ExecuteQueryUpdateProjectTeamName = mysqli_query($db, $QueryUpdateProjectTeamName);
    }



}


//TO DELETE A POST WHEN DELETE BUTTON IS CLICKED
if(isset($_GET['Id'])) {
    $IdFromURLforDeletingteams = $_GET['Id'];
    global $db;

    $Query = "DELETE FROM teams WHERE id = '$IdFromURLforDeletingteams'";
    $result = mysqli_query($db, $Query);

    if($result){
        $msg = 'Deleted Successfully';
    }
    else{
        $msg = 'Delete not successful. Please try again.';


    }

}


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
                <li class="nav-item "><a class="nav-link" href = "home_lecturer.php">Dash Board</a></li>
                <li class="nav-item "><a class="nav-link" href = "projects.php">Projects</a></li>
                <li class="nav-item"><a class="nav-link" href = "papers.php">Papers</a></li>
                <li class="nav-item active"><a class="nav-link" href = "ManageStudents.php">Manage Students</a></li>
                <li class="nav-item"><a class="nav-link" href = "reviews.php">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href = "index.html">log Out</a></li>

            </ul>
        </div>

    </nav>
<br>
    <br>
    <main class="col-md-12">


        <h2>Create Team</h2>
        <br>
        <div>
            <form action="ManageStudents.php" method="post" enctype="multipart/form-data">
                <fieldset>

                    <div class="form-group">

                        <!--Getting all the  project records from the database to form rows on the table. -->

                        <label for="projects"><span class="FieldInfo">Projects:</span></label>

                        <select class="form-control" name="SelectProject">
                            <?php
                            global $db;
                            $ViewProjects = "SELECT * FROM projects";
                            $result = mysqli_query($db,  $ViewProjects);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $ProjectTitle = $rows["title"];
                                ?>

                            <option><?php echo htmlentities($ProjectTitle); ?></option>
                            <?php   }  ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="teamname"><span class="FieldInfo">Team Name:</span></label>
                        <input class="form-control" type="text" name="TeamName" id="teamname" placeholder="Team Name">
                    </div>

                    <div class="form-group">
                        <label for="teammember"><span class="FieldInfo">Team Members:</span></label><br>
                        <label for="teammember"><span class="FieldInfo">Name:</span></label>
                        <select class="" name="TeamMember1">
                        <?php
                        global $db;
                        $ViewStudents = "SELECT * FROM login";
                        $result = mysqli_query($db,  $ViewStudents);

                        while ($rows=mysqli_fetch_assoc($result)){
                            $Name = $rows["name"];
                            ?>

                            <option><?php echo htmlentities($Name); ?></option>
                        <?php   }  ?>
                        </select>
                        <label for="role"><span class="FieldInfo">Role:</span></label>
                        <select class="" name="SelectTeamLeader1">
                            <option>Member</option>
                            <option>Team Leader</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="teammember"><span class="FieldInfo">Name:</span></label>
                        <select class="" name="TeamMember2">
                            <?php
                            global $db;
                            $ViewStudents = "SELECT * FROM login";
                            $result = mysqli_query($db,  $ViewStudents);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $Name = $rows["name"];
                                ?>

                                <option><?php echo htmlentities($Name); ?></option>
                            <?php   }  ?>
                        </select>
                        <label for="role"><span class="FieldInfo">Role:</span></label>
                        <select class="" name="SelectTeamLeader2">
                            <option>Member</option>
                            <option>Team Leader</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="teammember"><span class="FieldInfo">Name:</span></label>
                        <select class="" name="TeamMember3">
                            <?php
                            global $db;
                            $ViewStudents = "SELECT * FROM login";
                            $result = mysqli_query($db,  $ViewStudents);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $Name = $rows["name"];
                                ?>

                                <option><?php echo htmlentities($Name); ?></option>
                            <?php   }  ?>
                        </select>
                        <label for="role"><span class="FieldInfo">Role:</span></label>
                        <select class="" name="SelectTeamLeader3">
                            <option>Member</option>
                            <option>Team Leader</option>
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="teammember"><span class="FieldInfo">Name:</span></label>
                        <select class="" name="TeamMember4">
                            <?php
                            global $db;
                            $ViewStudents = "SELECT * FROM login";
                            $result = mysqli_query($db,  $ViewStudents);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $Name = $rows["name"];
                                ?>

                                <option><?php echo htmlentities($Name); ?></option>
                            <?php   }  ?>
                        </select>
                        <label for="role"><span class="FieldInfo">Role:</span></label>
                        <select class="" name="SelectTeamLeader4">
                            <option>Member</option>
                            <option>Team Leader</option>

                        </select>
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="teammember"><span class="FieldInfo">Name:</span></label>
                        <select class="" name="TeamMember5">
                            <?php
                            global $db;
                            $ViewStudents = "SELECT * FROM login";
                            $result = mysqli_query($db,  $ViewStudents);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $Name = $rows["name"];
                                ?>

                                <option><?php echo htmlentities($Name); ?></option>
                            <?php   }  ?>
                        </select>

                        </select>
                        <label for="role"><span class="FieldInfo">Role:</span></label>
                        <select class="" name="SelectTeamLeader5">
                            <option>Member</option>
                            <option>Team Leader</option>

                        </select>
                    </div>


                    <input class="btn btn-success btn-lg" type="submit" name="Submit" value="Create Team">
                </fieldset>
                <br>
            </form>
        </div>
        <div>
            <?php echo htmlentities($msg); ?>
        </div>
<br>
        <h2> Teams</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <!-- Header for the table. -->
                <tr>
                    <th>SN.</th>
                    <th>Projects</th>
                    <th>Team Name</th>
                    <th>Team Members</th>
                    <th>Team Leader</th>
                    <th>Course</th>
                    <th>Action</th>
                </tr>

                <!--Getting all the records from the database to form rows on the table. -->
                <?php
                global $db;

                $Viewteams = "SELECT * FROM teams";
                $result = mysqli_query($db,  $Viewteams);

                $SrNo = 0;
                while ($rows=mysqli_fetch_assoc($result)){
                    $Id = $rows["Id"];
                    $Team_Name= $rows["teamname"];
                    $TeamMember = $rows["teammembers"];
                    $Teamleader = $rows["teamleader"];
                    $AllocatedPaper=$rows["allocatedpaper"];


                    $viewProjects = "SELECT * FROM projects WHERE TeamName='$Team_Name'";
                    $viewProjectsResult = mysqli_query($db, $viewProjects);

                    //You can use this to be checking when you have issues with an sql querry
                    if (!$viewProjectsResult) {
                        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
                        exit;
                    }

                   while ($DataRows =mysqli_fetch_assoc($viewProjectsResult)) {
                       $title = $DataRows["title"];
                       $course = $DataRows["course"];
                   }

                    //This will help maintain correct numbering of the SN. field
                    $SrNo++;
                    ?>

                    <!-- New Row -->
                    <tr>
                        <td><?php echo $SrNo; ?> </td>
                        <td><?php echo $title; ?> </td>
                        <td><?php echo $Team_Name; ?> </td>
                        <td><?php echo $TeamMember; ?> </td>
                        <td><?php echo $Teamleader; ?> </td>
                        <td><?php echo $course; ?> </td>

                        <td>



                            <?php
                            ?>
                            <a class="btn btn-danger"  href="ManageStudents.php?Id=<?php echo $Id; ?>">Delete</a>
                            <?php               ?>
                        </td>

                    </tr>

                <?php } ?>
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
</html>