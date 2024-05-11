<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "userdb";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
    die("Error". mysqli_connect_error());
} else {
    echo "Successfully connected to the database.";
}
?>