<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="librarian_uprec.php">
<?php  
if(isset($_POST["borrower_id"])){
    $output = '';
    include('includes/connection.php');
    $query = "SELECT * FROM tbl_librarian WHERE id = '".$_POST["borrower_id"]."'";
    $result = mysqli_query($connect, $query);
    $output .= '  
        <div class="form-group">
            <label>Librarian Name:</label>';
    while($row = mysqli_fetch_array($result)){
         $output .= '
            <input type="text" name="emp" id="emp" value="'.$row["id"].'" hidden />

            <input type="text" name="newlibrarianname" id="newlibrarianname" value="'.$row["librarianname"].'" class="form-control" placeholder="Title of the Book">
        </div>
        <div class="form-group">
            <label>Category:</label>
            <input type="text" name="newusername" id="newusername" value="'.$row["username"].'" class="form-control" placeholder="Category of the Book">
        </div>
        <div class="form-group">
            <label>Author:</label>
            <input type="text" name="newpassword" id="newpassword" value="'.$row["password"].'" class="form-control" placeholder="Author of the Book">
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