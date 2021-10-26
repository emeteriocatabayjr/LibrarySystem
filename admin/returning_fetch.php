<?php
session_start();
include ('includes/connection.php');
if(!empty($_SESSION)) {
	$output = '';
	if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($connect, $_POST["query"]);
		$query = "
		SELECT * FROM tbl_returning
		WHERE borrowername LIKE '%".$search."%'
		OR booktitle LIKE '%".$search."%' 
		OR author LIKE '%".$search."%'  
		OR datepublished LIKE '%".$search."%'
		OR dateborrowed LIKE '%".$search."%'
		OR datereturned LIKE '%".$search."%'
		";
				/*SELECT booktitle, category, author, publishername, dateborrowed, datereturned, transactionID 
		  		FROM tbl_returning AS A
		  		INNER JOIN tbl_borrowers AS B
		  		ON A.borrowername = B.borrowername
		  		WHERE B.borrowername LIKE '%".$search."%'
		  		OR category LIKE '%".$search."%' 
		  		OR author LIKE '%".$search."%' 
		  		OR booktitle LIKE '%".$search."%'
		  		OR publishername LIKE '%".$search."%'
		  		OR transactionID LIKE '%".$search."%'
		  		AND B.borrowername = '".$_SESSION['borrowername']."'*/
	}
	else
	{
		$query = "
		SELECT * 
		FROM tbl_books AS A
		INNER JOIN tbl_returning AS B
		ON A.booktitle = B.booktitle
		ORDER BY datereturned
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
						<th>Transaction ID</th>
						<th>Name</th>
						<th>Book Title</th>
						<th>Book Cover</th>
						<th>Category</th>
						<th>Book Author</th>
						<th>Date Borrowed</th>
						<th>Date Returned</th>
						<th>Action</th>
					</tr>
				</thead>
		';	
		while($row = mysqli_fetch_array($result))
		{
			$output .= '
					<input type="hidden" class="" id="returnbtn" bookid='.$row['bookID'].'></input>
					<tr>
						<td width="5%">'.$row["transactionID"].'</td>
						<td>'.$row["borrowername"].'</td>
						<td>'.$row["booktitle"].'</td>
						<td class="text-center	">
							<img src="uploads/'.$row["bookcover"].'" style="width:40px; height:50px;">
						</td>
						<td>'.$row["category"].'</td>
						<td>'.$row["author"].'</td>
						<td>'.$row["dateborrowed"].'</td>
						<td>'.$row["datereturned"].'</td>
						';
					if($row["datereturned"] == 0000-00-00){
					$output .='<td width="8%"><button type="submit" class="btn btn-primary btn-sm form-control" id="returnbtn" bookid='.$row['transactionID'].'>Return</button></td>
					</tr>
						';
					}
					else{
					$output .='<td width="8%"><button type="submit" class="btn btn-danger btn-sm form-control" id="deletebtn" bookid='.$row['transactionID'].'>Delete</button></td>
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