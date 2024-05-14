<?php
include 'session.php';

ob_start();
include '../html/index.html'; // Include the HTML content
$htmlContent = ob_get_clean();

if (isset($_SESSION['username'])) {
    $username = htmlspecialchars($_SESSION['username']);
    $loginButton = "<span class=\"nav-username\">Welcome, $username</span>
                    <a href=\"../php/logout.php\" class=\"btn btn-small btn-light btn-login\">Logout</a>";
} else {
    $loginButton = "<a href=\"../php/login.php\" class=\"btn btn-small btn-light btn-login\">Login</a>";
}

// Replace the placeholder with the login/logout button
$htmlContent = str_replace('<a href="./login.html" class="btn btn-small btn-light btn-login">Login</a>', $loginButton, $htmlContent);

// Set the content type to HTML
header("Content-Type: text/html; charset=UTF-8");

// Output the modified HTML content
echo $htmlContent;
?>
