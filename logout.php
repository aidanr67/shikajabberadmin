<?php
session_start();
if (session_destroy()) { //destroy sessions
header("location: index.php");
}
?>

