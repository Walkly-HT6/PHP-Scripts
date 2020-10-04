<?php
ini_set('display_errors', 1);

$host = "192.168.1.9";
$root = "root";
$passwd = "fortunechair7";
$db = "walkly_db";
$conn = mysqli_connect($host, $root, $passwd , $db);

if (!$conn) {
 //  die("Connection failed: " . mysqli_connect_error());
}


?>



