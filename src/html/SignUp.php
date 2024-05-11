<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'dbconnect.php';
    $Email = $_POST["Email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $exists = false;
    if (($password == $cpassword) && $exists == false) {
        $sql = "INSERT INTO userdb ( Email, username, password, dt) VALUES ('$Email','$username', '$password', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $showAlert = true;
            header("Location: ./login.php");
            exit();
        }
    } else {
        $showError = "Passwords do not match";
    }
}

if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is now created and you can login
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div> ';
}
if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> ' . $showError . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div> ';
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/login.css">
</head>

<body>

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
        <form action="SignUp.php" method="post">
            <h2>Create an Account</h2>
            <h3>We're so excited to see you again!</h3>

            <label for="Email">Email</label>
            <input type="text" id="Email" name="Email" required>

            <label for="username">Username</label>
            <input type="text" id="username" name="username" aria-describedby="emailHelp" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="cpassword">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" required>

            <div class="container-2">
                <label for="day">Day:</label>
                <select id="day" name="dd"></select>

                <label for="month">Month:</label>
                <select id="month" name="mm" onchange="change_month(this)">
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>

                <label for="year">Year:</label>
                <select id="year" name="yyyy" onchange="change_year(this)"></select>
            </div>

            <a href="./login.php" class="New-link">Already have an Account ?</a></p>

            <input type="submit" value="Sign Up">

        </form>
    </div>

    <script>
        // Function to generate years from 1998 to 2006
        function generateYears() {
            var yearDropdown = document.getElementById("year");
            for (var i = 1998; i <= 2006; i++) {
                var option = document.createElement("option");
                option.text = i;
                option.value = i;
                yearDropdown.add(option);
            }
        }

        // Function to generate days based on selected month and year
        function generateDays() {
            var year = document.getElementById("year").value;
            var month = document.getElementById("month").value;
            var daysInMonth = new Date(year, month, 0).getDate(); // Get number of days in the selected month
            var dayDropdown = document.getElementById("day");
            dayDropdown.innerHTML = ""; // Clear existing options
            for (var i = 1; i <= daysInMonth; i++) {
                var option = document.createElement("option");
                option.text = i;
                option.value = (i < 10 ? '0' : '') + i; // Add leading zero if needed
                dayDropdown.add(option);
            }
        }
        // Generate years initially and then generate days based on initial selection
        generateYears();
        generateDays();
    </script>

</body>

</html>