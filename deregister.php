<?php
include('session.php');
require_once('menu.php');
?>
<!DOCTYPE html>
<html>
<body>
<div id ="main">
<h2>Remove shikajabber user account</h2>
<div id="adminform">
<h3>Please provide the name of an existing user, <strong id='red'>this cannot be undone!</strong></h3>
<form action="deregister.php" method="post">
<span id='red'>*</span>
<label>Existing Username: </label><input id='name' name='username' placeholder="username" type="text">
<input id='delete' name='delete' type='submit' value='Delete'>
<?php
$out = $_SESSION['userdelete'];
$format = $_SESSION['format'];
echo "<span id=$format>$out</span>";
$_SESSION['getpass'] = "";
?>
</form>
</div>
</div>
</body>
</html>

