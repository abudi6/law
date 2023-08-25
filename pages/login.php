<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_name = "law";
    $db_port = 3307;
    
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Validate and sanitize user inputs
    $username = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if ($password === $user['password']) {
            // Start a session and set user authentication status
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['authenticated'] = true;
            
            echo "login successful";
            
            // Fetch annotations for the user
            $annotations = array();
            $user_id = $user['id'];
            $sql_annotations = "SELECT annotationtext FROM annotations WHERE user_id = $user_id";
            $result_annotations = $conn->query($sql_annotations);
            if ($result_annotations->num_rows > 0) {
                while ($row = $result_annotations->fetch_assoc()) {
                    $annotations[] = $row['annotationtext'];
                }
            }
            
            // Fetch bookmarks for the user
            $bookmarks = array();
            $sql_bookmarks = "SELECT * FROM bookmarks WHERE user_id = $user_id";
            $result_bookmarks = $conn->query($sql_bookmarks);
            if ($result_bookmarks->num_rows > 0) {
                while ($row = $result_bookmarks->fetch_assoc()) {
                    $bookmarks[] = $row;
                }
            }
            
            // Redirect the user after successful login
            header("Location: dashboard.php"); // Replace with the actual dashboard page
            exit();
        } else {
            echo "credential fail";
        }
    } else {
        echo "Login failed";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="path_to_your_css_file.css">
</head>
<body>
    <div class="container px-5">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col col-xl-10">
                <div class="card log-card">
                    <div class="row g-0">
                        <!-- Login Container - Welcome Message -->
                        <div class="col-md-6 col-lg-6 d-flex flex-column justify-content-center align-items-center text-center" id="welcome-side">
                            <h3>Welcome back to</h3>
                            <h2>LawPhil Project!</h2>
                        </div>

                        <!-- Login Container - Login Form -->
                        <div class="col-md-6 col-lg-6 d-flex align-items-center" id="login-side">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form action="login.php" method="POST"> <!-- Change to the correct PHP script -->
                                    <div class="form-group mb-4">
                                        <label class="form-label login-form-label" for="username">Username</label>
                                        <input 
                                            type="text" 
                                            id="username" 
                                            class="form-control form-control-md login-form-control" 
                                            name="username"
                                            required 
                                        />
                                    </div>

                                    <div class="form-group mb-4">
                                        <label class="form-label login-form-label" for="password">Password</label>
                                        <input 
                                            type="password" 
                                            id="password" 
                                            class="form-control form-control-md login-form-control"
                                            name="password"
                                            required 
                                        />
                                    </div>

                                    <div class="text-center mt-4">
                                        <a href="#!" class="link-light">Forgot Password?</a>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-light btn-md login-btn">
                                            <span id="btn-text">Login</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>


