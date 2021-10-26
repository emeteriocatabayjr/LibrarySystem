<?php
$empid = $_POST["emp"];
$empid1 = $_POST["emp1"];
$datereturned = $_POST["newdatereturned"];
$remaining = $_POST["newremaining"];

include('includes/connection.php');

if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

	$query="UPDATE tbl_returning 
			SET datereturned='$datereturned'
			WHERE transactionID='$empid'
	";

	$query1="UPDATE tbl_books
			SET remaining='$remaining'+1
			WHERE bookID='$empid1'
	";


if (mysqli_query($connect, $query)) {
	echo '<script type="text/javascript">';
	echo 'window.location.href = "returning.php"; alert("Book Returned")';
	echo '</script>';
   if (mysqli_query($connect, $query1)) {}

} else {
	echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);




?>