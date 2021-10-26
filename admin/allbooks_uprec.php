<?php
$empid = $_POST["emp"];
$booktitle = $_POST["newbooktitle"];
$category = $_POST["newcategory"];
$author = $_POST["newauthor"];
$publishername = $_POST["newpublishername"];
$datepublished = $_POST["newdatepublished"];
$copies = $_POST["newcopies"];
$remaining = $_POST["remaining"];
	
// Create connection
include('includes/connection.php');
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "UPDATE tbl_books 
		SET booktitle='$booktitle', category='$category', author='$author', publishername='$publishername', 
			datepublished='$datepublished', copies='$copies', remaining='$remaining' 
		WHERE bookID='$empid'
		";
if (mysqli_query($connect, $sql)) {
		echo '<script type="text/javascript">';
		echo 'window.location.href = "allbooks.php"; alert("Successfully Updated!")';
		echo '</script>';       

} else {
    echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);




 ?>