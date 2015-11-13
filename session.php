<?php
//Set session timout 10min
ini_set("session.cookie_lifetime", "600");
include('config.php');
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBdatabase);
if (!$conn) {
print_r("Error: Connection to Database Failed");
die;
} else {
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_user'];
// SQL Query To Fetch Complete Information Of User
$sql = "SELECT user FROM prosody WHERE user='$user_check'";
$ses_sql = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['user'];
if(!isset($login_session)){
mysqli_close($conn); // Closing Connection
header('Location: index.php'); // Redirecting To Home Page
}
}
?>
