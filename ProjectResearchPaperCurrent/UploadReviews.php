<?php include_once("connectdb.php"); ?>

<?php include_once("session.php"); ?>

<!-- Add New Project Submit button processing. -->
<?php

$msg ='';

if (isset($_REQUEST['Submit'])) {
    // removes backslashes
    $PaperTitle = stripslashes($_REQUEST['PaperTitle']);
    //NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $PaperTitle = mysqli_real_escape_string($db, $PaperTitle);


    // removes backslashes
    $Course = stripslashes($_REQUEST['Course']);
    //NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $Course = mysqli_real_escape_string($db, $Course);

    $UploadedReview = $_FILES['UploadedReview']['name'];
    $PaperFileLocation = "assets/uploads/".basename($_FILES['UploadedReview']['name']);

    $CurrentUserName = $_SESSION['username'];

    global $db;

    $stmt = mysqli_prepare($db, "INSERT INTO review (papertitle, reviewfilename, reviewedby, course) VALUES (?, ?,?, ?)");
    mysqli_stmt_bind_param($stmt, 'ssss', $PaperTitle, $UploadedReview, $CurrentUserName, $Course);
    $result = mysqli_stmt_execute($stmt);
    move_uploaded_file($_FILES["UploadedReview"]["tmp_name"], $PaperFileLocation);

    if($result){
        $msg= 'Successful';
    }
    else{
        $msg= 'Failed';
    }
}

?>


<?php
//TO DELETE A POST WHEN DELETE BUTTON IS CLICKED
if(isset($_GET['Id'])) {
    $IdFromURLforDeletingReviews = $_GET['Id'];
    global $db;

    $CurrentUserName = $_SESSION['username'];

    $QueryGetReviews = "SELECT id FROM review WHERE reviewedby='$CurrentUserName'";
    $resultGetReviews = mysqli_query($db, $QueryGetReviews) or die (mysqli_error($db)) ;
    $ReviewsOfCurrentUser = mysqli_fetch_assoc($resultGetReviews);

    //Id of paper to be deleted is in the array of uploads by the current user.
    if (in_array($IdFromURLforDeletingReviews, $ReviewsOfCurrentUser))
    {

        $DeleteQuery = "DELETE FROM `review` WHERE `review`.`id` = $IdFromURLforDeletingReviews ";
        $resultDeleteQuery = mysqli_query($db, $DeleteQuery);
        $msg="Delete Successful.";
    }
    else
    {
        $msg="You are not permitted to delete this upload.".mysqli_error($db) ;
    }


    //When the current user has no uploads, an error is thrown as $ReviewsOfCurrentUser is empty.//
    //We could easily catch this error and display no uploads by current user but this is not implemented.



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
                <li class="nav-item "><a class="nav-link" href = "UploadPapers.php">Upload Papers</a></li>
                <li class="nav-item active"><a class="nav-link" href = "UploadReviews.php">Upload Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href = "ViewProject.php">Project</a></li>
                <li class="nav-item"><a class="nav-link" href = "index.html">log Out</a></li>

            </ul>
        </div>

    </nav>
<br>
    <br>
    <main class="col-md-12">
        <div>


        </div>


        <h2>Upload Reviews</h2>
        <br>
        <div>
            <form action="UploadReviews.php" method="post" enctype="multipart/form-data"><!-- for  uploading a file -->
                <fieldset>
                    <div class="form-group">
                        <label for="papertitile"><span class="FieldInfo">Paper Title:</span></label>
                        <input class="form-control" type="text" name="PaperTitle" id="papertitle" placeholder="Paper Title">
                    </div>

                    <div class="form-group">
                        <label for="course"><span class="FieldInfo">Course:</span></label>
                        <input class="form-control" type="text" name="Course" id="course" placeholder="course">
                    </div>

                    <div class="form-group">
                        <label for="uploadreview"><span class="FieldInfo">Upload Review:</span></label>
                        <input class="form-control" type="file" name="UploadedReview" id="uploadreview" placeholder="Upload Review">
                    </div>

                    <input class="btn btn-success btn-lg" type="submit" name="Submit" value="Add Review">
                </fieldset>
                <br>
            </form>
        </div>
        <div>
            <?php echo htmlentities($msg); ?>
        </div>
<br>
        <h2> Reviews</h2>
        <br>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <!-- Header for the table. -->
                <tr>
                    <th>SN.</th>
                    <th>Paper title</th>
                    <th>Course</th>
                    <th>Uploaded review </th>
                    <th>Reviewed by</th>
                    <th>Actions</th>

                </tr>

                <!--Getting all the records from the database to form rows on the table. -->
                <?php
                global $db;
                $Viewreview = "SELECT*FROM review";
                $result = mysqli_query($db,  $Viewreview);

                $SrNo = 0;
                while ($rows=mysqli_fetch_assoc($result)){
                    $Id = $rows["id"];
                    $PaperTitle = $rows["papertitle"];
                    $Uploadedby = $rows["reviewedby"];
                    $UploadedReview = $rows["reviewfilename"];
                    $Course = $rows["course"];

                    //This will help maintain correct numbering of the SN. field
                    $SrNo++;
                    ?>

                    <!-- New Row -->
                    <tr>
                        <td><?php echo $SrNo; ?> </td>
                        <td><?php echo $PaperTitle; ?> </td>
                        <td><?php echo $Course ;?> </td>
                        <td><?php echo $UploadedReview ;?> </td>
                        <td><?php echo $Uploadedby; ?> </td>
                        <td>
                            <?php
                            ?>
                            <a class="btn btn-primary"  href="assets/uploads/<?php echo $UploadedReview; ?>" target="_blank">View</a>
                            <?php               ?>


                            <?php
                            ?>
                            <a class="btn btn-danger"  href="UploadReviews.php?Id=<?php echo $Id; ?>">Delete</a>
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
