<?php
// Handle login logic here
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    // Replace these lines with your actual authentication logic
    $username = $data['username'];
    $password = $data['password'];

    if ($username === 'your_valid_username' && $password === 'your_valid_password') {
        http_response_code(200);
        echo json_encode(["message" => "Login successful!"]);
    } else {
        http_response_code(401);
        echo json_encode(["message" => "Login failed"]);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
