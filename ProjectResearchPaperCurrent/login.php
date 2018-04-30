<?php include_once("connectdb.php"); ?>

<?php include_once("session.php"); ?>

<?php
$username ='';
$password ='';


if(isset($_REQUEST['Submit'])) {
    $username = $_REQUEST['UserName'];
    $password = $_REQUEST['Password'];

    if (empty($username) || empty($password)) {
      echo "Username/Password cannot be empty";

    } else {
        global $db;

        $sql = "SELECT*FROM login WHERE username='$username' and password='$password'";

        $result = mysqli_query($db, $sql);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $row = mysqli_fetch_assoc($result);
            $role = $row['role'];
            if ($role == "lecturer") {
                header("Location:home_lecturer.php");

            } elseif ($role == "student") {
                header("Location:home_student.php");

            } elseif ($role == "teamleader") {
                header("Location:home_teamleader.php");

            }


        }
            else {

                echo "Incorrect username or password.";
            }

        }

    }

else {
    echo "Incorrect username or password.";

}


$db->close();
?>







