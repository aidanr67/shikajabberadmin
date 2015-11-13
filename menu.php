<!-- TOP menu -->
<!DOCTYPE html>
<html>
<head>
<title>Shikajabber Admin Kit</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id='menu'>
<h1>Welcome to Shikajabber Admin Kit <strong id='right'><?php echo $login_session; ?></strong></h1>
<p>
<button id="menubutton" type="button" onclick="location.href = 'create_user.php'">Create New User</button>
<button id="menubutton" type="button" onclick="location.href = 'delete_user.php'">Delete User</button>
<button id="menubutton" type="button" onclick="location.href = 'get_password.php'">Retrieve Password</button>
<button id="menubutton" type="button" onclick="location.href = 'get_users.php'">Retrieve User List</button>
<button id="logoutbutton" type="button" onclick="location.href = 'logout.php'">Logout</button>
</div> 
</body>
</html>
