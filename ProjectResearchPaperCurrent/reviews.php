<?php include_once("connectdb.php"); ?>

<?php include_once("session.php"); ?>


<?php

$msg ='';
//TO DELETE A POST WHEN DELETE BUTTON IS CLICKED
if(isset($_GET['Id'])) {
    $IdFromURLforDeletingReviews = $_GET['Id'];
    global $db;

    $Query = "DELETE FROM review WHERE id = '$IdFromURLforDeletingReviews'";
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
                <li class="nav-item"><a class="nav-link" href = "ManageStudents.php">Manage Students</a></li>
                <li class="nav-item active"><a class="nav-link" href = "reviews.php">Reviews</a></li>
                <li class="nav-item"><a class="nav-link" href = "index.html">log Out</a></li>

            </ul>
        </div>

    </nav>

    <main class="col-md-12">

        <div>
            <?php echo htmlentities($msg); ?>
        </div>

<h2> Reviews</h2>
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
                    <a class="btn btn-small btn-success"  href="ReviewComments.php?Id=<?php echo $Id; ?>">Comments</a>
                    <?php               ?>

                    <?php
                    ?>
                    <a class="btn btn-danger"  href="reviews.php?Id=<?php echo $Id; ?>">Delete</a>
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
    </html><?php
/**
 * Created by PhpStorm.
 * User: amrut
 * Date: 10/04/2018
 * Time: 10:00
 */