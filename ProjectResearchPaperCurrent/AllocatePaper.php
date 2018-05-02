<?php include_once("connectdb.php"); ?>

<?php include_once("session.php"); ?>


<?php
$msg ='';
global $db;

//TO CREATE A NEW TEAM WHEN SUBMIT BUTTON IS CLICKED
if (isset($_REQUEST['Submit'])) {
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

// papers
// removes backslashes
    $Paper1 = stripslashes($_REQUEST['SelectPaper1']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Paper1 = mysqli_real_escape_string($db, $Paper1);

// removes backslashes
    $Paper2 = stripslashes($_REQUEST['SelectPaper2']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Paper2 = mysqli_real_escape_string($db, $Paper2);

// removes backslashes
    $Paper3 = stripslashes($_REQUEST['SelectPaper3']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Paper3 = mysqli_real_escape_string($db, $Paper3);

// removes backslashes
    $Paper4 = stripslashes($_REQUEST['SelectPaper4']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Paper4 = mysqli_real_escape_string($db, $Paper4);

// removes backslashes
    $Paper5 = stripslashes($_REQUEST['SelectPaper5']);
//NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Paper5 = mysqli_real_escape_string($db, $Paper5);


    $AdminName = $_SESSION['username'];


    if ($TeamName="") {
        $msg = 'The Team Name cannot be empty';
    }
    else {


        $stmt = mysqli_prepare($db, "INSERT INTO teams (allocatedpaper) VALUES ( ?)");
        mysqli_stmt_bind_param($stmt, 's', $paper1);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (allocatedpaper) VALUES ( ?)");
        mysqli_stmt_bind_param($stmt, 's', $paper2);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (allocatedpaper) VALUES ( ?)");
        mysqli_stmt_bind_param($stmt, 's', $paper3);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (allocatedpaper) VALUES ( ?)");
        mysqli_stmt_bind_param($stmt, 's', $paper4);
        $result = mysqli_stmt_execute($stmt);
        $stmt = mysqli_prepare($db, "INSERT INTO teams (allocatedpaper) VALUES ( ?)");
        mysqli_stmt_bind_param($stmt, 's', $paper5);
        $result = mysqli_stmt_execute($stmt);



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
                <li class="nav-item "><a class="nav-link" href = "home_student.php">Dash Board</a></li>
                <li class="nav-item "><a class="nav-link" href = "UploadPapersT.php">Upload Papers</a></li>
                <li class="nav-item"><a class="nav-link" href = "UploadReviewsT.php">Upload Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href = "ViewProjectT.php">Project</a></li>
                <li class="nav-item active"><a class="nav-link" href = "AllocatePaper.php">Allocate Paper</a></li>
                <li class="nav-item"><a class="nav-link" href = "index.html">log Out</a></li>

            </ul>
        </div>

    </nav>
<br>
    <main class="col-md-12">


        <h2>Allocate Papers</h2>
        <div>
            <form action="AllocatePaper.php" method="post" enctype="multipart/form-data">
                <fieldset>
<br>
                    <div class="form-group">

                        <!--Getting all the  paper records from the database to form rows on the table. -->



                        <div class="form-group">
                            <label for="teamname"><span class="FieldInfo">Team Name:</span></label>
                            <input class="form-control" type="text" name="TeamName" id="teamname" placeholder="Team Name">
                        </div>

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
                        <label for="Paper"><span class="FieldInfo">Paper:</span></label>
                        <select class="" name="SelectPaper1">
                            <?php
                            global $db;
                            $ViewPapers = "SELECT * FROM papers";
                            $result = mysqli_query($db,  $ViewPapers);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $PaperName = $rows["paperfilename"];
                                ?>

                                <option><?php echo htmlentities($PaperName); ?></option>
                            <?php   }  ?>
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
                        <label for="Paper"><span class="FieldInfo">Paper:</span></label>
                        <select class="" name="SelectPaper2">
                            <?php
                            global $db;
                            $ViewPapers = "SELECT * FROM papers";
                            $result = mysqli_query($db,  $ViewPapers);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $PaperName = $rows["paperfilename"];
                                ?>

                                <option><?php echo htmlentities($PaperName); ?></option>
                            <?php   }  ?>
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
                        <label for="Paper"><span class="FieldInfo">Paper:</span></label>
                        <select class="" name="SelectPaper3">
                            <?php
                            global $db;
                            $ViewPapers = "SELECT * FROM papers";
                            $result = mysqli_query($db,  $ViewPapers);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $PaperName = $rows["paperfilename"];
                                ?>

                                <option><?php echo htmlentities($PaperName); ?></option>
                            <?php   }  ?>
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
                        <label for="Paper"><span class="FieldInfo">Paper:</span></label>
                        <select class="" name="SelectPaper4">
                            <?php
                            global $db;
                            $ViewPapers = "SELECT * FROM papers";
                            $result = mysqli_query($db,  $ViewPapers);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $PaperName = $rows["paperfilename"];
                                ?>

                                <option><?php echo htmlentities($PaperName); ?></option>
                            <?php   }  ?>
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
                        <label for="Paper"><span class="FieldInfo">Paper:</span></label>
                        <select class="" name="SelectPaper5">
                            <?php
                            global $db;
                            $ViewPapers = "SELECT * FROM papers";
                            $result = mysqli_query($db,  $ViewPapers);

                            while ($rows=mysqli_fetch_assoc($result)){
                                $PaperName = $rows["paperfilename"];
                                ?>

                                <option><?php echo htmlentities($PaperName); ?></option>
                            <?php   }  ?>
                        </select>
                    </div>


                    <input class="btn btn-success btn-lg" type="submit" name="Submit" value="Allocate Paper">
                </fieldset>
                <br>
            </form>
        </div>


        <h2> List</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <!-- Header for the table. -->
                <tr>
                    <th>SN.</th>
                    <th>Name</th>
                    <th>Paper</th>

                </tr>

                <!--Getting all the records from the database to form rows on the table. -->
                <?php
                global $db;

                $Viewpapers = "SELECT * FROM teams";
                $result = mysqli_query($db,  $Viewpapers);

                $SrNo = 0;
                while ($rows=mysqli_fetch_assoc($result)){
                    $Team_Name= $rows["teamname"];
                    $PaperName = $rows["allocatedpaper"];



                    $ViewStudents = "SELECT * FROM login";
                    $result = mysqli_query($db,  $ViewStudents);

                    //You can use this to be checking when you have issues with an sql querry
                    if (!$result) {
                        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
                        exit;
                    }

                    while ($DataRows =mysqli_fetch_assoc($result)) {
                        $Name = $rows["name"];


                    }

                    //This will help maintain correct numbering of the SN. field
                    $SrNo++;
                    ?>

                    <!-- New Row -->
                    <tr>
                        <td><?php echo $SrNo; ?> </td>
                        <td><?php echo $PaperName; ?> </td>
                        <td><?php echo $Name; ?> </td>


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
