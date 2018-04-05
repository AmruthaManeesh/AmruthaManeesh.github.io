<?php
/**
 * Created by PhpStorm.
 * User: 1715757
 * Date: 23/03/2018
 * Time: 15:20
 */

include('connectdb.php');
session_start();


$username="";
$password="";


if(empty($_POST["username"]) || empty($_POST["password"]))
{
    echo "Both fields are required.";
}else {
    $username = $_POST['username'];
    $password = $_POST['password'];
 }
echo $username. $password;
$sql="SELECT*FROM login WHERE username='$username' and password='$password'";

    $result = mysqli_query($db,$sql);
    echo mysqli_num_rows($result);
if(mysqli_num_rows($result)==1) {
    $row = mysqli_fetch_assoc($result);



    $role = $row['role'];


    if ($role == "lecturer") {
        header("Location:home_lecturer.php");

    } elseif ($role == "student") {
        header("Location:home_student.php");

    }

}
else {
        echo "Incorrect username or password.";

}
$db->close();
?>


