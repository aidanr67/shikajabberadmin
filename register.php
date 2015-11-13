<?php
include('session.php'); //session info
include('config.php'); //DB connection info
/************************************** VARIABLES ****************************/
$username = "";
$password = "";
/*****************************************************************************/

//Set session format variable to red -- formats output string
$_SESSION['format'] = 'red';
//if POST object set, use it, report and return
if(isset($_POST)){ //Params are set, check and add data
//Check username is set
if (empty($_POST['username']) || $_POST['username'] == ""){
$_SESSION['createuser'] = "Username must be entered";
header("location: create_user.php");
die; //Script cannot continue if input is not valid
}
//Check validity of chosen username
if (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['username'])){ //No Special Chars
$_SESSION['createuser'] = "Username must contain <strong>only</strong> letters and numbers";
header("location: create_user.php");
die;
}
$username = $_POST['username'];
$username = strtolower($username);
//Check password is set
if (empty($_POST['password']) || $_POST['password'] == ""){
$_SESSION['createuser'] = "Password must be entered";
header("location: create_user.php");
die;
}
$password = $_POST['password'];
//Connect to DB and check connection
$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBdatabase);
if (!$conn){
die("Connection to database failed: " . mysqli_connect_error());
}
//Check that user does not exist
$sql = "SELECT * FROM prosody WHERE user='$username'";
$result = mysqli_query($conn, $sql);
$count = mysqli_num_rows($result);
if ($count != 0) { //user already exists
$_SESSION['createuser'] = "Username already exists";
header("location: create_user.php");
die;
}
//add user to DB
$sql = "INSERT INTO prosody (`host`, `user`, `store`, `key`, `type`, `value`)
VALUES ('shikajabber.lan', '$username', 'accounts', 'password', 'string', '$password')";
//run SQL and check result
if(mysqli_query($conn, $sql)) {
$_SESSION['createuser'] = "User created successfully";
$_SESSION['format'] = 'green';
header("location: create_user.php");
die;
} else {
$_SESSION['createuser'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
header("location: create_user.php");
die;
}
mysqli_close($conn);
header("location: create_user.php");
die;
} else {
$_SESSION['createuser'] = "Please input username and password";
header("location: create_user.php");
die;
}

?>
