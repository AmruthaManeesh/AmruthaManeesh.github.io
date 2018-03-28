<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Login Form without Session</title>
    <link rel="stylesheet" href="../week8/style.css" type="text/css" />
</head>
<body>
<h1>Different marvel movies</h1>
<div class="SelectBox">
    <h3>categories</h3>
    <br><br>
    <form method="post" action="displayall.php">
        <label>marvelMovieID:</label><br>
        <input type="ID" name="marvelMovieID" placeholder="marvelMovieID"
        /><br><br>
        <label>YearReleased:</label><br>
        <input type="year" name="YearReleased" placeholder="YearReleased" />
        <br><br>
        <label>title:</label><br>
        <input type="title" name="title" placeholder="title"
        /><br><br>
        <label>productionStudio:</label><br>
        <input type="Studio" name="productionStudio" placeholder="productionStudio" />
        <br><br>
        <label>notes:</label><br>
        <input type="notes" name="notes" placeholder="notes"
        /><br><br>

        <input type="submit" name="submit" value = "submit"/>
    </form>
    <div class="error">
        <?php //echo $error;?><?php //echo $username; echo
        // $password;?></div>
</div>
</body>
</html>