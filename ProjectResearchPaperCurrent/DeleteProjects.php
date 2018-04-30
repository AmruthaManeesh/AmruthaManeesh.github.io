<?php include_once("connectdb.php"); ?>

<?php include_once("session.php"); ?>

<?php
/**
 * Created by PhpStorm.
 * User: amrut
 * Date: 10/04/2018
 * Time: 13:14
 */

$msg= '';

if(isset($_GET['Id'])) {
    $IdFromURLforDeletingProjects = $_GET['Id'];
    global $db;

    $Query = "DELETE FROM projects WHERE id = '$IdFromURLforDeletingProjects'";
    $result = mysqli_query($db, $Query);

    if($result){
        $msg = 'Deleted Successfully';


    }
    else{
        $msg = 'Delete not successful. Please try again.';


    }

}

?>