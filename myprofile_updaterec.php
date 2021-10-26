<?php
session_start();
$empid = $_POST["emp"];
$borrowername = $_POST["newborrowername"];
$username = $_POST["newusername"];
$password = $_POST["newpassword"];
$address = $_POST["newaddress"];
$contactnumber = $_POST["newcontactnumber"];


include('includes/connection.php');

if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}

$sql = "UPDATE tbl_borrowers SET borrowername='$borrowername', address='$address', contactnumber ='$contactnumber', username='$username', password='$password'
		WHERE borrowerID='$empid'";
if (mysqli_query($connect, $sql)) {
		$_SESSION['borrowername'] = $borrowername;
		$_SESSION['address'] = $address;
		$_SESSION['contactnumber'] = $contactnumber;
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
	
		echo '<script type="text/javascript">';
		echo 'window.location.href = "myprofile.php"; alert("Successfully Updated!")';
		echo '</script>';       

} else {
    echo "Error updating record: " . mysqli_error($connect);
}

mysqli_close($connect);

 ?>

 