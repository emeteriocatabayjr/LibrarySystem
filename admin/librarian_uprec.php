<?php
$empid = $_POST["emp"];
$librarianname = $_POST["newlibrarianname"];
$username = $_POST["newusername"];
$password = $_POST["newpassword"];

	
// Create connection
include('includes/connection.php');
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "UPDATE tbl_librarian SET librarianname='$librarianname', username='$username', password='$password' WHERE id='$empid'";
if (mysqli_query($connect, $sql)) {
		echo '<script type="text/javascript">';
		echo 'window.location.href = "librarian.php"; alert("Successfully Updated!")';
		echo '</script>';       

} else {
    echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);




 ?>