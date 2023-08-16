<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST['username']);
    $password = ($_POST['password']);
    $email = ($_POST['email']);
    echo "Username entered is: " . $username . "<br/>";
    echo "Password entered is: " . $password . "<br/>";
    echo "E-mail entered is: " . $email;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ($_POST['username']);
    $password = ($_POST['password']);
	$email = ($_POST['email']);
		
    $bool = true;
    $db_name = "law";
    $db_user = "root";
    $db_pass = "";
    $db_host = "localhost";
    $db_port = 3307;
    $conn = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name",3307) or
        die(mysqli_error()); 
		
    $sql = "SELECT * from users";
	
    $result = mysqli_query($conn, $sql); 
    while ($row = mysqli_fetch_array($result)) { 
        $table_user = $row['username']; 
        if ($username == $table_user) { 
            $bool = false; 
            Print '<script>alert("Username has been taken!");</script>'; 
            Print '<script>window.location.assign("useradd.php");</script>'; 
        }
    }
    if ($bool) { 
        
        mysqli_query($con, "INSERT INTO users (username, password, email) 
                            VALUES ('$username', '$password', '$email')");
				
		Print '<script>alert("Successfully Registered!");</script>'; 
        Print '<script>window.location.assign("useradd.php");</script>'; 
    }
}
?>