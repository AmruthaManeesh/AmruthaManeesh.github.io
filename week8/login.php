<?php
/**
 * Created by PhpStorm.
 * User: 1715757
 * Date: 23/03/2018
 * Time: 15:20
 */
echo "hello<br><br>";

include('connectdb.php');



if(empty($_POST["username"]) || empty($_POST["password"])){
    echo "Both fields are required.";
}else
    {
    $username = $_POST['username'];
    $password = $_POST['password'];

    echo "YESSSSSSSSSSSSS";

    $sql="SELECT uid FROM users WHERE username='$username' AND passwrd='$password'";
    $result = mysqli_query($db,$sql);



    $result=mysqli_query($db,$sql);

    if(mysqli_num_rows($result)==1)
    {
        header("location:home.html");
    }else
    {
        echo "Incorrect username or password.";
    }

}
?>