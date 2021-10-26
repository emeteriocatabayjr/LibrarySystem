<?php 
include('includes/connection.php');
if(!empty($_POST)){
    $output = '';
    $booktitle = mysqli_real_escape_string($connect, $_POST["booktitle"]);  
    $category = mysqli_real_escape_string($connect, $_POST["category"]);  
    $author = mysqli_real_escape_string($connect, $_POST["author"]);  
    $publishername = mysqli_real_escape_string($connect, $_POST["publishername"]);  
    $datepublished = mysqli_real_escape_string($connect, $_POST["datepublished"]);
    $copies = mysqli_real_escape_string($connect, $_POST["copies"]);
    $remaining = mysqli_real_escape_string($connect, $_POST["remaining"]);


 
    $query = "INSERT INTO tbl_books(booktitle, category, author, publishername, datepublished, copies, remaining) 
                VALUES('$booktitle', '$category', '$author', '$publishername', '$datepublished', '$copies', '$remaining')";
    if(mysqli_query($connect, $query))
    {
     $output .= '<div class="alert alert-success">
                    <strong>Success!</strong> Book Added!
                </div>';
     $select_query = "SELECT * FROM tbl_books ORDER BY bookID DESC";
     $result = mysqli_query($connect, $select_query);
     $output .= '
            <div class="table-responsive" id="employee_table">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Book Title</th>
                            <th>Photo</th>
                            <th>Category</th>
                            <th>Author</th>
                            <th>Publisher Name</th>
                            <th>Published</th>
                            <th>Copies</th>
                            <th>Remaining</th>
                            <th width="13%">Action</th>
                        </tr>
                    </thead>
     ';
     while($row = mysqli_fetch_array($result))
     {
      $output .= '
                    <tr>
                        <td>'.$row["booktitle"].'</td>
                        <td class="text-center">
                            <button class="btn btn-sm " id="uploadbtn" bookid='.$row['bookID'].' data-toggle="uploadToolTip" data-placement="top" title="Click to Upload Book Cover" >
                            <i class="fa fa-file-photo-o" style="font-size:16px; color:blue;"></i></button>
                            <img src="uploads/'.$row["bookcover"].'" style="width:40px; height:50px;">                              
                        </td>
                        <td>'.$row["category"].'</td>
                        <td>'.$row["author"].'</td>
                        <td>'.$row["publishername"].'</td>
                        <td>'.$row["datepublished"].'</td>
                        <td>'.$row["copies"].'</td>
                        <td>'.$row["remaining"].'</td>
                        <td align="center" width="10%">
                            <button type="submit" class="btn btn-success btn-sm" id="editbtn" bookid='.$row['bookID'].'>Edit</button>
                            <button type="submit" class="btn btn-danger btn-sm" id="deletebtn" bookid='.$row['bookID'].'>Delete</button>
                        </td>
                    </tr>      ';
     }
     $output .= '</table>';
    }
    echo $output;
}
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('[data-toggle="uploadToolTip"]').tooltip();
          
    });
</script>