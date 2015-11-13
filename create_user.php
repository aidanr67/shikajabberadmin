<?php
include('session.php');
require_once('menu.php');
?>
<!DOCTYPE HTML>
<html>
<body>
<div id='main'>
<h2>Create new shikajabber user account</h2>
<div id='adminform'>
<h3>Please provide a new username and password</h3>
<form name="createuser" action="register.php" method="POST">
<span id="red"> *</span>
<label>Username: </label><input type="text" name="username" placeholder="username" value="">
<span id="red"> *</span>
<label>Password: </label><input type="password" name="password" placeholder="**********" value="">
<input type="submit" name="submit" value="Create">
<?php
$out = $_SESSION['createuser'];
$format = $_SESSION['format'];
echo "<span id=$format>$out</span>";
$_SESSION['getpass'] = "";
?>
</form>
</div>
</div>
 </body>
</html>
