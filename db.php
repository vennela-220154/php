<?php
$host = "localhost";
$user = "root";
$pass = "1234";
$dbname = "userdb";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Database connection failed");
}
?>
