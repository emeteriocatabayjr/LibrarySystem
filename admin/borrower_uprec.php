<?php
$empid = $_POST["emp"];
$borrowername = $_POST["newborrowername"];
$address = $_POST["newaddress"];
$contactnumber = $_POST["newcontactnumber"];
$username = $_POST["newusername"];
$password = $_POST["newpassword"];

	
// Create connection
include('includes/connection.php');
// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "UPDATE tbl_borrowers 
		SET borrowername='$borrowername', address='$address', contactnumber='$contactnumber', username='$username', password='$password' 
		WHERE borrowerID='$empid'";
if (mysqli_query($connect, $sql)) {
		echo '<script type="text/javascript">';
		echo 'window.location.href = "borrower.php"; alert("Successfully Updated!")';
		echo '</script>';       

} else {
    echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);

 ?>

 