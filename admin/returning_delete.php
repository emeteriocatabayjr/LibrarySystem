
<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

    <form method="POST" action="returning_delrec.php">
        <?php  
        if(isset($_POST["borrower_id"])){
            $output = '';
            include('includes/connection.php');
            $query = "SELECT * FROM tbl_returning WHERE transactionID = '".$_POST["borrower_id"]."'";
            $result = mysqli_query($connect, $query);
            $output .= '  
            <div class="container">  
            ';
            while($row = mysqli_fetch_array($result)){
                $output .= '
                <input type="text" name="emp" id="emp" value="'.$row["transactionID"].'" hidden />
                <h5 class="text-center">This is permanent.<br> Are you sure you want to delete this record?</h5>
                ';
            }
            $output .= '</div>';
            echo $output;
        }


     ?>
     <div class="row text-center">
        <div class="col">
        </div>
        <div class="col">
            <input type="submit" name="delete" id="delete" value="Yes" class="btn btn-success" />
            <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
        </div>
        <div class="col">
        </div>
    </div>



</form>
</body>
</html>