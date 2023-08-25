<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $annotationtext = $_POST['annotationtext'];
    
    $db_name = "annotations"; 
    $db_user = "root"; 
    $db_pass = "";     
    $db_host = "localhost";
    $db_port = 3307;    

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name, $db_port) or
        die(mysqli_error($conn));

    $annotationtext = mysqli_real_escape_string($conn, $annotationtext);
    
    $sql = "SELECT * FROM annotations WHERE annotations='$annotationtext'";
    $result = mysqli_query($conn, $sql);

    $insertQuery = "INSERT INTO annotations (annotationtext) 
                        VALUES ('$annotationtext')";

        if (mysqli_query($conn, $insertQuery)) {
            echo '<script>alert("Successfully Added!");</script>';
            echo '<script>window.location.assign("index.php");</script>'; //not sure where to redirect
        } else {
            echo "Error: " . mysqli_error($conn);
        }

    mysqli_close($conn);
}