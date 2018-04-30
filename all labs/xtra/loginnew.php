<?php include_once("connectdb.php"); ?>

<?php include_once("session.php"); ?>

<?php
/**
 * Created by PhpStorm.
 * User: 1715757
 * Date: 23/03/2018
 * Time: 15:20
 */

if(isset($_REQUEST['Submit'])) {
    $username = $_REQUEST['UserName'];
    $password = $_REQUEST['Password'];

    if (empty($username) || empty($password)) {
        $msg = 'Username/Password cannot be empty';

    } else {
        global $db;

        $sql = "SELECT * FROM login WHERE username='$username' and password='$password'";

        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];
            if ($role == "lecturer") {
                header("Location:home_lecturer.php");

            } elseif ($role == "student") {
                header("Location:home_student.php");

            }

        } else {
            $msg= "Incorrect username or password.";
        }

    }

}
header("Location:index.html");
$db->close();
?>







