<?php
 
//MySQLi Procedural
$connect = mysqli_connect("localhost","root","","librarydb");
if (!$connect) {
	die("Connection failed: " . mysqli_connect_error());
}
 
?>