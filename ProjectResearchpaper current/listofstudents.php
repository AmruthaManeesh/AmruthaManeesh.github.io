<?php
/**
 * Created by PhpStorm.
 * User: amrut
 * Date: 31/03/2018
 * Time: 23:07
 */

include("connectdb.php");

$sql="SELECT*FROM studentpaper";
$result=$db->query($sql);
if($result->num_rows>0) {
    while ($row = $result->fetch_assoc()) {
        echo "name:".$row["studentname"] ."<br>";
    }
}else{
    echo"0 results";
}
$db->close();

?>