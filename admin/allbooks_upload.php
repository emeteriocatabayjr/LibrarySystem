<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form method="POST" action="allbooks_uploadrec.php" enctype="multipart/form-data">
<?php 
    if(isset($_POST["borrower_id"])){
        include('includes/connection.php');
        $output = '';
        $query = "SELECT * FROM tbl_books WHERE bookID = '".$_POST["borrower_id"]."'";
        $result = mysqli_query($connect, $query);

        while($row = mysqli_fetch_array($result)){
        $output .= '
            <input type="text" name="emp" id="emp" value="'.$row["bookID"].'" hidden />
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image" required="">
                    <label class="custom-file-label" for="image">Upload Photo</label>
                </div>
            </div>
        ';
        }
        echo $output;
    }
?>
    <input type="submit" name="update" id="update" value="Upload" class="btn btn-success btn-block" />
    
</form>
</body>
</html>
<script type="text/javascript">
        $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>