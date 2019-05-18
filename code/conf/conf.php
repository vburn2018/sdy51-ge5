<?php
if(!headers_sent())
	{ header("Content-Type:text/html; charset=utf-8"); }

static $conn;
$conn = mysqli_connect('localhost', 'root', '', 'senior_care');

// Check connection
if (!$conn) 
	{
    echo 'Error: Unable to connect to MySQL.' . PHP_EOL;
    echo 'Debugging errno: ' . mysqli_connect_errno() . PHP_EOL;
    echo 'Debugging error: ' . mysqli_connect_error() . PHP_EOL;
    exit;
	}
mysqli_set_charset($conn,'utf8');

?>