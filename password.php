<?php
include('session.php'); //Session info
include('config.php'); //DB connection info
/********************************VARIABLES************************************/
$username="";
/*****************************************************************************/

//Set session format variable to red -- formats output string
$_SESSION['format'] = 'red';
if (isset($_POST)) { //POST is set
//Check that username is set
if (empty($_POST['username']) || $_POST['username'] == ""){
$_SESSION['getpass'] = "No Username Provided";
header("location: get_password.php");
die; //Execution must not continue if input is invalid
}
//check that username is valid
if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){ //contains special chars
$_SESSION['getpass'] = "Valid usernames contain only letters and numbers";
header("location: get_password.php");
die;
}
$username = $_POST['username'];
$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBdatabase);
if (!$conn) {
print_r("Failed to connect to database:" . mysqli_connect_error());
die;
}
$sql = "SELECT value FROM prosody WHERE user='$username'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
$password = $row["value"];
$count = mysql_num_rows($query);
if ($count == '0') {
$_SESSION['getpass'] = "User does not exist";
header("location: get_password.php");
die;
}
$_SESSION['getpass'] = $password;
$_SESSION['format'] = 'green';
mysqli_close($conn);
header("location: get_password.php");
}
?>
