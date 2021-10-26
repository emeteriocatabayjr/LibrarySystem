<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="myprofile_updaterec.php">
<?php
session_start();  
if(isset($_POST["borrower_id"])){
    include('includes/connection.php');
    $output = '';
    $query = "SELECT * FROM tbl_borrowers WHERE borrowerID = '".$_POST["borrower_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '
        <input type="text" name="emp" id="emp" value="'.$_SESSION["borrowerID"].'" hidden />
        <div class="form-group">
            <label>Borrower Name:</label>
            <input type="text" name="newborrowername" id="newborrowername" value="'.$_SESSION["borrowername"].'" class="form-control">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="newaddress" id="newaddress" value="'.$_SESSION['address'].'" class="form-control" ></input>
        </div>
        <div class="form-group">
            <label>Contact No:</label>
            <input type="text" name="newcontactnumber" id="newcontactnumber" value="'.$_SESSION['contactnumber'].'" class="form-control" ></input>
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="newusername" id="newusername" value="'.$_SESSION['username'].'" class="form-control" ></input>
        </div>
        <div class="form-group">
            <label>Password: </label><br>
            <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" onclick="showPassword()" id="customCheck"></input>
                <label class="custom-control-label" for="customCheck">Show Password</label>
            </div>
            <input type="password" name="newpassword" id="newpassword" value="'.$_SESSION['password'].'" class="form-control" ></input>
        </div>
    ';
    echo $output;
}
?>
    <input type="submit" name="update" id="update" value="Update" class="btn btn-success btn-block" />
</form>
</body>
</html>