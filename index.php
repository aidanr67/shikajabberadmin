<?php
include('config.php');
include('login.php');
//If user already logged in direct to admin.php
if (isset($_SESSION['login_user'])) {
    header("location: admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Shikajabber Admin</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Welcome to Shikajabber Admin Console</h1>
<div id="login">
<h2>Login</h2>
<form action="" method="post">
<label>Username: </label><input id='name' name='username' value='admin' type='text'>
<label>Password: </label><input id ='password' name='password' placeholder="********" type='password'>
<input name='submit' type='submit' value=' Login '>
<span id='red'><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>
