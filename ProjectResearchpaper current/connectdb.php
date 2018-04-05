<?php
/**
 (* Created by PhpStorm.
 * User: 1715757
 * Date: 23/03/2018
 * Time: 14:46
 */
define('DB_SERVER','localhost');
define ('DB_USERNAME','root');
define ('DB_PASSWORD','');
define ('DB_DATABASE','cmm004');
$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
// check connection
if($db->connect_error) {
    echo "connection was failed";
}

?>