<?php include('includes/connection.php');
if(!empty($_POST))
{
    $output = '';
    $borrowername = mysqli_real_escape_string($connect, $_POST["borrowername"]);
    $address = mysqli_real_escape_string($connect, $_POST["address"]);
    $contactnumber = mysqli_real_escape_string($connect, $_POST["contactnumber"]);  
    $username = mysqli_real_escape_string($connect, $_POST["username"]);  
    $password = mysqli_real_escape_string($connect, $_POST["password"]);  
    

    $query = "INSERT INTO tbl_borrowers (borrowername, address, contactnumber,username, password) 
            VALUES('$borrowername', '$address', '$contactnumber', '$username', '$password')";
    if(mysqli_query($connect, $query))
    {
    $output .= '<div class="alert alert-success">
                    <strong>Success!</strong> Borrower Added!
                </div>';
    $select_query = "SELECT * FROM tbl_borrowers ORDER BY borrowerID DESC";
    $result = mysqli_query($connect, $select_query);
    $output .= '
                <div class="table-responsive" id="employee_table">
                    <table class="table table-bordered">
                        <thead> 
                            <tr>  
                                <th>Borrower Name</th>
                                <th>Address</th>
                                <th>Contact #</th>  
                                <th>Username</th>
                                <th>Password</th>
                                <th width="15%">Action</th>
                            </tr>
                        </thead>
    ';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
                    <tr>
                        <td>'.$row["borrowername"].'</td>
                        <td>'.$row["address"].'</td>
                        <td>'.$row["contactnumber"].'</td>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["password"].'</td>
                        <td align="center">
                            <button type="submit" class="btn btn-success btn-sm" id="editbtn" bookid='.$row['borrowerID'].'>Edit</button>
                            <button type="submit" class="btn btn-danger btn-sm" id="deletebtn" bookid='.$row['borrowerID'].'>Delete</button>
                        </td>
                    </tr>
                ';
        }
        $output .= '</table>';
    }
    echo $output;
}
?>
