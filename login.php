<?php
session_start(); //start a session
$error = ''; //to store error message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password invalid";
} else {
//Define username and password
$username = $_POST['username'];
$password = $_POST['password'];
//Connect to DB
$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBdatabase);
if (!$conn) {
print_r("Connection to Database failed");
die;
} else {
//Protect mysql injection
$username = stripslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
//Query to fetch username and password from DB
$sql = "SELECT * FROM prosody WHERE user='$username' AND value='$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$admin = $row['administrator'];
if ($admin == 0) {
$error = "Only an administrator can access this site";
} else {
$rowCount = mysqli_num_rows($result);
if ($rowCount == 1) {
$_SESSION['login_user'] = $username; //initialize session
$_SESSION['timeout'] = time();
header('location: admin.php');
} else {
$error = "Username or Password invalid" . " $rowCount";
}
}
}
mysqli_close($conn); //close DB connection
}
}
?>
