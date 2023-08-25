<?php
session_start(); 

if($_SERVER['REQUEST_METHOD'] == "GET")
{
$conn = mysqli_connect("localhost", "root", "", "annotations") or die(mysqli_error()); 
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM annotations WHERE id='$id'");
header("location: addannotation.php"); //not sure about this location
}
?>