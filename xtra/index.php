<!doctype html>
<html>
<head>
    <?php
    include("connectdb.php");
    ?>
    <meta charset="utf-8">
    <title>PHP Login Form without Session</title>
    <link rel="stylesheet" href="../ProjectResearchpaper%20current/style.css" type="text/css" />
</head>
<body>
<form action="../ProjectResearchpaper%20current/login.php" method="post">
    <h3>Login to your Account</h3>
    <br><br>
    <form method="post" action="../ProjectResearchpaper%20current/login.php">
        <label>Username:</label><br>
        <input type="text" name="username" placeholder="username"
        /><br><br>
        <label>Password:</label><br>
        <input type="password" name="password" placeholder="password" />
        <br><br>
        <input type="submit" name="submit" value = "login"/>
    </form>
    <div class="error">
        <?php //echo $error;?><?php //echo $username; echo
        // $password;?></div>

</body>
</html>