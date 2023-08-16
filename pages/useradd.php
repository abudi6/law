<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") 
{
    
	$username = ($_POST['username']);
	$password = ($_POST['password']);
	$email = ($_POST['email']);

	$conn = mysqli_connect("localhost", "root", "", "law", 3307) or die(mysqli_error()); 

    mysqli_query($conn, "INSERT INTO law (username, password, email) VALUES ('$username','$password','$email')"); 
	
    //header("location: something.php"); not sure yet what to put here
		
} else {
    echo "Register failed"; 
}
?>