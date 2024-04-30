<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'dbconnect.php';
    $username = $_POST["username"];
    $password = $_POST["password"]; 
    
    // Sanitize user input
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    $sql = "SELECT * FROM userdb WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        // Handle database connection error
        $showError = "Database connection error: " . mysqli_connect_error();
    } else {
        $num = mysqli_num_rows($result);
        if ($num == 1){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: index.html");
        } else {
            $showError = "Invalid Credentials";
        }
    }
}
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./login.css">
</head>

<body>
<?php
    if($login){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> You are logged in
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> ';
    }
    ?>
    <section class="hero">
        <header>
            <div class="list">
                <nav class="main-nav">
                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Why Discord</a>
                        </li>
                        <li class="nav-item">
                            <a href="./Nitro.html" class="nav-link">Nitro</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Safety</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">Support</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
    </section>

    <div class="container">
        <form action="login.php" method="post">

            <h2>Welcome Back</h2>
            <h3>We're so excited to see you again!</h3>
            
            <label for="username">Username</label>
            <input type="text" id="username" name="username" aria-describedby="emailHelp" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <p>Need an Account? <a href="./SignUp.php" class="New-link">Register</a></p>
            <input type="submit" value="Log In">
        </form>
    </div>
</body>

</html>