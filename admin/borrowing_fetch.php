<?php
session_start();
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
			<table class="table table-bordered" id="sampleTbl">
				<thead>
					<tr>
						<th>Book Title</th>
						<th>Book Cover</th>
						<th>Category</th>
						<th>Author</th>
						<th>Publisher Name</th>
						<th>Date Published</th>
						<th>Copies</th>
						<th>Remaining</th>
						<th>Action</th>
					</tr>
				</thead>
		';	
		while($row = mysqli_fetch_array($result)){
			$output .= '
					<tr>
						<td id="newbooktitle">'.$row["booktitle"].'</td>
						<td class="text-center">
							<img src="uploads/'.$row["bookcover"].'" style="width:40px; height:50px;">
						</td>
						<td id="newbookauthor">'.$row["category"].'</td>
						<td>'.$row["author"].'</td>
						<td>'.$row["publishername"].'</td>
						<td>'.$row["datepublished"].'</td>
						<td>'.$row["copies"].'</td>
						<td>'.$row["remaining"].'</td>
						';
					
  					if ($row["remaining"] != 0) {
						$output .='<td><button type="submit" class="btn btn-success btn-sm form-control" id="editbtn" bookid='.$row['bookID'].'>Borrow</button></td>
					</tr>
						';
					}
					else{
						$output .='<td><button disabled type="submit" class="btn btn-success btn-sm form-control" id="editbtn" bookid='.$row['bookID'].'>Borrow</button></td>
					</tr>
						';
					}
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
	?>