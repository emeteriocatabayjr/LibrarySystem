<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <form method="POST" action="allbooks_uprec.php">
        <?php  
        if(isset($_POST["borrower_id"])){
            $output = '';
            include('includes/connection.php');
            $query = "SELECT * FROM tbl_books WHERE bookID = '".$_POST["borrower_id"]."'";
            $result = mysqli_query($connect, $query);
            $output .= '
            
            <div class="form-group">
            <label>Book Title:</label>';
            while($row = mysqli_fetch_array($result)){
               $output .= '
               <input type="text" name="emp" id="emp" value="'.$row["bookID"].'" hidden />
               <input type="text" name="newbooktitle" id="newbooktitle" value="'.$row["booktitle"].'" class="form-control" placeholder="Title of the Book">
               </div>
               <div class="form-group">
               <label>Category:</label>
               <input type="text" name="newcategory" id="newcategory" value="'.$row["category"].'" class="form-control" placeholder="Category of the Book">
               </div>
               <div class="form-group">
               <label>Author:</label>
               <input type="text" name="newauthor" id="newauthor" value="'.$row["author"].'" class="form-control" placeholder="Author of the Book">
               </div>
               <div class="form-group">
               <label>Publisher Name:</label>
               <input type="text" name="newpublishername" id="newpublishername" value="'.$row["publishername"].'"  class="form-control" placeholder="Name of the Publisher">
               </div>
               <div class="form-group">
               <label>Date Published</label>
               <input type="date" name="newdatepublished" id="newdatepublished" value="'.$row["datepublished"].'"  class="form-control" placeholder="Date of Publication">
               </div>
               <div class="form-group">
               <label>Copies</label>
               <input type="number" name="newcopies" id="newcopies" value="'.$row["copies"].'" class="form-control" placeholder="Number of Copies">
               </div>
               <div class="form-group">
               <label>Remaining</label>
               <input type="number" name="remaining" id="remaining" value="'.$row["remaining"].'" class="form-control" placeholder="Number of Remaining">
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