<?php
include('session.php');
require_once('menu.php');
?>
<!DOCTYPE html>
<html>
<body>
<div id ="main">
<h2>Retrieve shikajabber password</h2>
<div id="adminform">
<h3>Please provide the name of an existing user</h3>
<form action="password.php" method="post">
<span id='red'>*</span>
<label>Existing Username: </label><input id='name' name='username' placeholder="username" type="text">
<input id='getpass' name='getpass' type='submit' value='Get Password'>
<?php
$out = $_SESSION['getpass'];
$format = $_SESSION['format'];
echo "<span id=$format>$out</span>";
$_SESSION['getpass'] = "";
?>
</form>
</div>
</div>
</body>
</html>
