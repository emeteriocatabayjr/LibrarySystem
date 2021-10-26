<?php
session_start();
include ('includes/connection.php');
        $output = '';
        if(!isset($_POST["query"]))
        {
         
        $query = "
            SELECT *
            FROM tbl_returning AS A
            INNER JOIN tbl_borrowers AS B
            ON A.borrowername = B.borrowername
            WHERE B.borrowername = '".$_SESSION['borrowername']."'
            AND datereturned <> 0000-00-00 
        ";
        }
        $result = mysqli_query($connect, $query);
        if(mysqli_num_rows($result) > 0)
        {

            $output .= '
            ';  
            while($row = mysqli_fetch_array($result))
            {

                $output .= '
                        <div class="d-inline-flex p-3 mx-auto">
                            <div class="card mx-auto text" style="width:20rem; height:40rem;">
                                <div class="card-header">
                                    <label class=""><b>Transaction ID: '.$row["transactionID"].'</b></label>
                                    <span class="float-right badge badge-primary">Returned</span>
                                </div>
                                <div class="card-body">
                                        <div class="container mb-3" style="height: 300px">
                                            <img src="admin/uploads/'.$row["bookcover"].'" style="width:100%; height:100%" class="img-thumbnail"><br><br>
                                        </div>
                                    <div class="col font-weight-light">
                                        <label><b>Book Title:</b> '.$row["booktitle"].' </label>                                    
                                        <label><b>Category:</b> '.$row["category"].' </label>
                                        <label><b>Author:</b> '.$row["author"].' </label>
                                        <label><b>Publisher:</b> '.$row["publishername"].' </label>
                                        <label><b>Date you Borrowed:</b> '.$row["dateborrowed"].' </label>
                                         <label><b>Date you Returned:</b> '.$row["datereturned"].' </label>
                                    </div>                                                      
                                </div>
                            </div>
                        </div>  
                ';
            }
            echo $output;
            }
        else
        {
            echo 'Data Not Found';
        }

?>