<?php
$empid = $_POST["emp"];

// Create connection
include('includes/connection.php');
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "DELETE FROM tbl_borrowers WHERE borrowerID='$empid'";
if (mysqli_query($connect, $sql)) {
		echo '<script type="text/javascript">'; 
		echo 'window.location.href = "borrower.php";';
		echo '</script>';       

} else {
    echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);


?>