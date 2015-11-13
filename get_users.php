<?php
include("session.php"); //session ifo
include("config.php"); //DB connection ifo
require_once('menu.php'); //Menu items
/*************************************VARIABLES********************************/
$users = [];
/******************************************************************************/

//Connect DB
$conn = mysqli_connect($DBhost, $DBuser, $DBpassword, $DBdatabase);
if (!$conn) { //connection failed
print_r("Failed to connect to database:" . mysqli_connect_error());
die;
}
$sql = "SELECT user FROM prosody";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)){
$users[] = $row['user']; 
}
$count = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<body>
<div id='main'>
<h2>Current shikajabber user accounts</h2>
<div id='adminlist'>
<h3>There are currently <strong><?php echo $count;?></strong> shikajabber users</h3>
<div id='scrollbox'>
<?php
for ($x = 0; $x < count($users); $x++){
echo $users[$x];
echo "<br>";
}
?>
</div>
</div>
</div>
</body>
</html>
