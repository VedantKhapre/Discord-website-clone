<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST["Email"];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (Email,username, password) VALUES ('$Email','$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../html/login.html");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>