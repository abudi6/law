<?php
session_start(); 

if($_SERVER['REQUEST_METHOD'] == "GET")
{
$conn = mysqli_connect("localhost", "root", "", "bookmarks") or die(mysqli_error()); //no bookmark db so far yet
$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM annotations WHERE id='$id'");
header("location: addbookmark.php"); //not sure about this location
}
?>