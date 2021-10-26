<?php
/*if($_SERVER['REQUEST_METHOD']=="POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    include ('connection.php');
    $query="SELECT * FROM tbl_accounts where username='$username' and password='$password'";
    $result=mysqli_query($connect,$query);
    $rows = mysqli_num_rows($result);
    session_start();
    if($rows==1){
        header('location: database.php');
        $_SESSION['username']=$username;
    }
    else{
        echo '<div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Login Failed!</strong> You put incorrect Username or Password.
        </div>';
    }
}*/

session_start();


if(count($_POST)>0) {
    include ('includes/connection.php');
    $result = mysqli_query($connect,"SELECT * FROM tbl_librarian WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"] ."'");
    $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["username"]=$row['username'];
            $_SESSION["password"]=$row['password'];

           
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Login Failed!</strong> You put incorrect Username or Password.
            </div>';
        }
    }
if(isset($_SESSION["id"])) {
    header("Location:allbooks.php");
}


?>