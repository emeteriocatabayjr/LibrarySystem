<?php
$empid = $_POST["emp"];
$borrowername = $_POST["selected"];
$booktitle = $_POST["newbooktitle"];
$category = $_POST["newcategory"];
$author = $_POST["newauthor"];
$publishername = $_POST["newpublishername"];
$datepublished = $_POST["newdatepublished"];
$dateborrowed = $_POST["newdateborrowed"];
$copies = $_POST["newcopies"];
$remaining = $_POST["remaining"];
$bookcover =$_POST["newbookcover"];


include('includes/connection.php');

if ($connect->connect_error) {
	die("Connection failed: " . $connect->connect_error);
}

	$query="INSERT INTO tbl_returning (borrowername, booktitle, bookcover, category ,author, publishername, datepublished, dateborrowed) 
			VALUES ('$borrowername','$booktitle', '$bookcover','$category','$author','$publishername', '$datepublished', '$dateborrowed')
			
			";
	$query1="UPDATE tbl_books SET remaining='$remaining'-1 
			WHERE bookID='$empid'

	";



if (mysqli_query($connect, $query)) {
	echo '<script type="text/javascript">';
	echo 'window.location.href = "borrowing.php"; alert("Successfully Borrowed")';
	echo '</script>';

	if(mysqli_query($connect, $query1)){
		echo '<script type="text/javascript">';
		echo 'window.location.href = "borrowing.php"; alert("Successfully Updated")';
		echo '</script>';
	}       

} else {
	echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);




?>