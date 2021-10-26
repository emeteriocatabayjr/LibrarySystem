<?php

session_start();
include('includes/connection.php');
if(isset($_FILES['photo'])){
    move_uploaded_file($_FILES["photo"]["tmp_name"],"uploads/Photos/" . $_FILES["photo"]["name"]);         
    $photo_admin=$_FILES["photo"]["name"];

    $query = "INSERT INTO tbl_librarian (photo_admin) 
                VALUES('$photo_admin')";
    echo $_FILES['photo']['tmp_name'];

}
if(!empty($_POST))
{
    $output = '';
    $librarianname = mysqli_real_escape_string($connect, $_POST["librarianname"]);  
    $username = mysqli_real_escape_string($connect, $_POST["username"]);  
    $password = mysqli_real_escape_string($connect, $_POST["password"]);  
    


    $query = "INSERT INTO tbl_librarian (librarianname, username, password) 
                VALUES('$librarianname', '$username', '$password')";

          
    if(mysqli_query($connect, $query))
    {
    $output .= '<div class="alert alert-success">
                    <strong>Success!</strong> Librarian Added!
                </div>';
    $select_query = "SELECT * FROM tbl_librarian ORDER BY id DESC";
    $result = mysqli_query($connect, $select_query);
    $output .= '
                <div class="table-responsive" id="employee_table">
                    <table class="table table-bordered">
                        <thead> 
                            <tr> 
                                <th>Photo</th> 
                                <th>Librarian Name</th>  
                                <th>Username</th>
                                <th>Password</th>
                                <th width="20%">Action</th>
                            </tr>
                        </thead>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
                    <tr>
                        <td width="10%" class="mx-auto>                          
                            <button class="btn" id="uploadbtn" bookid='.$row['id'].'>
                                <i class="fa fa-file-photo-o m-0" style="font-size:16px" data-toggle="tooltip"></i>
                            </button>
                            <img src="uploads/Photos/'.$row["photo_admin"].'" style="width:50px; height:50px;" id="uploadbtn" bookid='.$row['id'].'>        
                        </td>
                        <td>'.$row["librarianname"].'</td>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["password"].'</td>
                        <td align="center">
                            <button type="submit" class="btn btn-success btn-sm" id="editbtn" bookid='.$row['id'].'>Edit</button>
                            <button type="submit" class="btn btn-danger btn-sm" id="deletebtn" bookid='.$row['id'].'>Delete</button>
                        </td>
                    </tr>
                ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>
