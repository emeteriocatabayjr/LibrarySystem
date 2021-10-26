<?php
session_start();
$empid = $_POST["emp"];


move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/" . $_FILES["image"]["name"]);         
$location=$_FILES["image"]["name"];
	
// Create connection
include('includes/connection.php');
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "UPDATE tbl_borrowers SET image_location='$location'
		WHERE borrowerID='$empid'";
if (mysqli_query($connect, $sql)) {
		$_SESSION['image'] = $location;
		echo '<script type="text/javascript">';
		echo 'window.location.href = "myprofile.php"; alert("Successfully Uploaded!")';
		echo '</script>';       

} else {
    echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);

 ?>

 