<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "law";
$db_port = 3307;

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name, $db_port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sqlFile = 'db/database.sql';
$sql = file_get_contents($sqlFile);

if ($conn->multi_query($sql) === TRUE) {
    echo "Database initialized successfully.";
    header("Location: pages/login.php");    
} else {
    echo "Error initializing database: " . $conn->error;
    
}

$conn->close();
?>
