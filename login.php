<?php 
session_start();
if(count($_POST)>0) {
    include ('includes/connection.php');
    $result =mysqli_query($connect,"SELECT * 
                                    FROM tbl_borrowers 
                                    WHERE username='".$_POST["username"]."' and password = '".$_POST["password"]."'");
    $row  = mysqli_fetch_array($result);

    if(is_array($row)) {
        $_SESSION["borrowerID"] = $row['borrowerID'];
        $_SESSION["username"]=$row['username'];
        $_SESSION["password"]=$row['password'];
        $_SESSION["borrowername"]=$row['borrowername'];
        $_SESSION["address"]=$row['address'];
        $_SESSION["image"]=$row['image_location'];
        $_SESSION["contactnumber"]=$row['contactnumber'];

       
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Login Failed!</strong> You put incorrect Username or Password.
        </div>';
    }
}

if(isset($_SESSION["borrowerID"])) {
    header("Location:home.php");
}


?>