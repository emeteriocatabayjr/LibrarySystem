<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="borrower_uprec.php">
<?php  
if(isset($_POST["borrower_id"])){
    $output = '';
    include('includes/connection.php');
    $query = "SELECT * FROM tbl_borrowers WHERE borrowerID = '".$_POST["borrower_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
        <div class="form-group">
            <label>Librarian Name:</label>';
    while($row = mysqli_fetch_array($result)){
         $output .= '
            <input type="text" name="emp" id="emp" value="'.$row["borrowerID"].'" hidden />

            <input type="text" name="newborrowername" id="newborrowername" value="'.$row["borrowername"].'" class="form-control">
        </div>
        <div class="form-group">
            <label>Address:</label>
            <input type="text" name="newaddress" id="newaddress" value="'.$row["address"].'" class="form-control">
        </div>
        <div class="form-group">
            <label>Contact No:</label>
            <input type="text" name="newcontactnumber" id="newcontactnumber" value="'.$row["contactnumber"].'" class="form-control">
        </div>
        <div class="form-group">
            <label>Username:</label>
            <input type="text" name="newusername" id="newusername" value="'.$row["username"].'" class="form-control">
        </div>
        <div class="form-group">
            <label>Password:</label>
            <input type="text" name="newpassword" id="newpassword" value="'.$row["password"].'" class="form-control">
        </div>
     ';
    }
    $output .= '                    
        
    ';
    echo $output;
}
?>
    <input type="submit" name="update" id="update" value="Update" class="btn btn-success btn-block" />
</form>
</body>
</html>