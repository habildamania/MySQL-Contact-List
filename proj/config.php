<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "CSV_DB";
$connect = mysqli_connect($servername, $username, $password, $db);
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}
?>