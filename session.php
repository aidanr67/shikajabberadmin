<?php
include('config.php'); //DB config
//Set session timout 10min
ini_set("session.cookie_lifetime", "600");

/********* cURL Token ***************************************/
$file = $_SERVER['DOCUMENT_ROOT'] . "/../secret.txt";
if (file_exists($file)){
    $fh = fopen($file, r);
    $token = fgets($fh);
    fclose($fh);
} else {
    die("No token provided");
}
$token = rtrim($token);
if ($_SERVER['PHP_AUTH_PW'] == $token){    
    $_SESSION['login_user'] = 'admin';
}
/*************************************************************/
 
// Establishing Connection with mySQL
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
