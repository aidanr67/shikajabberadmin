<?php
/********************************************************************
//Config info for prosody admin web interface
/*******************************************************************/
$file = $_SERVER['DOCUMENT_ROOT'] . "/../dbpass.txt";
if (file_exists($file)){
    $fh = fopen($file, r);
    $DBpassword = fgets($fh);
    fclose($fh);
} else {
    die("No DB password provided");
}
$DBpassword = rtrim($DBpassword);
$DBhost = 'localhost';
$DBuser = 'prosody';
$DBdatabase = 'prosody';
?>
