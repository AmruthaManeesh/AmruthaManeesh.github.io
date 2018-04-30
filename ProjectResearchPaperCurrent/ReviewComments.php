<?php include_once("connectdb.php"); ?>
<?php include_once("session.php"); ?>

<?php
$msg="";
if(isset($_REQUEST['Id'])) {
    $ReviewIDFromURLToUpdateComment = $_GET['Id'];


    echo "Test";
    echo "$ReviewIDFromURLToUpdateComment";
    echo $ReviewIDFromURLToUpdateComment;
}

if(isset($_REQUEST['Submit'])) {
    global $db;

    $ReviewIDFromURLToUpdateComment = $_REQUEST['Id'];
    // removes backslashes
    $ReviewComment = stripslashes($_REQUEST['reviewcomment']);
    //NB, that if no conn is open, mysqli_real_escape_string() will return an empty string!.Triggering Validation 1
    $ReviewComment = mysqli_real_escape_string($db,  $ReviewComment);

    $AddReviewComment = "UPDATE reviews SET comment='$ReviewComment' WHERE id=$ReviewIDFromURLToUpdateComment";
    $ResultAddReviewComment = mysqli_query($db, $AddReviewComment);

    if($ResultAddReviewComment){
        $msg= 'Successful';
    }
    else{
        echo "Could not successfully run query  from DB: " . mysqli_error();
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
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
        <h2>Welcome </h2>
        <div>
            <?php echo htmlentities($msg) ?>
        </div>

        <form action="ReviewComments.php" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label for="reviewcomment"><span class="FieldInfo">Comment:</span></label>
                </div>

                <div class="form-group">
                        <textarea rows="4" cols="50"  name="reviewcomment"></textarea>
                </div>




                <input class="btn btn-success btn-lg" type="submit" name="Submit" value="Send">
            </fieldset>
            <br>
        </form>


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