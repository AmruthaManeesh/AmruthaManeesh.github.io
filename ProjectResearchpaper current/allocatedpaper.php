<?php
/**
 * Created by PhpStorm.
 * User: amrut
 * Date: 31/03/2018
 * Time: 23:08
 */


include("connectdb.php");
$sql="SELECT*FROM studentpaper";
$result=$db->query($sql);
if($result->num_rows==1) {
    while ($row = $result->fetch_assoc()) {
        echo "name:".$row["studentname"] . ";pname:" . $row["papername"] ."<br>";
    }
}else{
    echo"no paper allocated";
}
$db->close();
?>

