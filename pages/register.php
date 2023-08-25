<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $db_name = "users"; // Update with your actual database name
    $db_user = "root"; // Update with your database username
    $db_pass = "";     // Update with your database password
    $db_host = "localhost";
    $db_port = 3307;    // Update with your database port if necessary

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port) or
        die(mysqli_error($conn));

    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    $email = mysqli_real_escape_string($conn, $email);

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo '<script>alert("Username has been taken!");</script>';
        echo '<script>window.location.assign("register.php");</script>';
    } else {

        $insertQuery = "INSERT INTO users (username, password, email) 
                        VALUES ('$username', '$password', '$email')";

        if (mysqli_query($conn, $insertQuery)) {
            echo '<script>alert("Successfully Registered!");</script>';
            echo '<script>window.location.assign("register.php");</script>';
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
</head>
<body>
    <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-10 mx-auto">
                <div class="card reg-card reg-card-bg">
                    <div class="text-center">
                        <h3>Welcome back to</h3>
                        <h2>LawPhil Project!</h2>
                        <br />
                    </div>

                    <form action="register.php" method="post" class="px-5">
                        <div class="form-outline mb-4 input-wrapper">
                            <label class="form-label reg-form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control reg-form-control form-control-md">
                        </div>

                        <div class="form-outline mb-4 input-wrapper">
                            <label class="form-label reg-form-label" for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control reg-form-control form-control-md">
                        </div>

                        <div class="form-outline mb-4 input-wrapper">
                            <label class="form-label reg-form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control reg-form-control form-control-md">
                        </div>

                        <div class="form-outline mb-5 input-wrapper">
                            <label class="form-label reg-form-label" for="confirmPassword">Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control reg-form-control form-control-md">
                        </div>

                        <div class="text-center mt-4 mx-auto">
                            <button type="submit" class="btn btn-light reg-btn btn-md">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
