
<?php
session_start();
if(!empty($_SESSION)) {
include ('includes/connection.php');
	if(!empty($_SESSION)) {
		$output = '';
		if(isset($_POST["query"]))
		{
		 	$search = mysqli_real_escape_string($connect, $_POST["query"]);
		 	$query = "
		  		SELECT * FROM tbl_books
		  		WHERE booktitle LIKE '%".$search."%'
		  		OR category LIKE '%".$search."%' 
		  		OR author LIKE '%".$search."%' 
		  		OR copies LIKE '%".$search."%' 
		  		OR publishername LIKE '%".$search."%'
		  		OR datepublished LIKE '%".$search."%'
		  		OR remaining LIKE '%".$search."%'
		 	";
		}
		else
		{
		 	$query = "
		  		SELECT * FROM tbl_books ORDER BY bookID DESC
		 	";
		}
		$result = mysqli_query($connect, $query);
		if(mysqli_num_rows($result) > 0)
		{

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
		   			</tr>
		  		';
		 	}
		 	echo $output;
			}
		else
		{
		 	echo 'Data Not Found';
		}
	
	}else echo '<div class="alert alert-danger alert-dismissible fade show">
        <strong>Login Required!</strong> You needed to be login first before you can access the database.
        <a href="login.php"> Go back to login</a>
        </div>';
    }
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('[data-toggle="uploadToolTip"]').tooltip();
		  
	});
</script>