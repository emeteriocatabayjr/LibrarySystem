<?php
session_start();
include ('includes/connection.php');
	if(!empty($_SESSION)) {
		$output = '';
		if(isset($_POST["query"]))
		{
		 	$search = mysqli_real_escape_string($connect, $_POST["query"]);
		 	$query = "
		  		SELECT * FROM tbl_librarian
		  		WHERE librarianname LIKE '%".$search."%'
		  		OR username LIKE '%".$search."%' 
		  		OR password LIKE '%".$search."%' 
		 	";
		}
		else
		{
		 	$query = "
		  		SELECT * FROM tbl_librarian ORDER BY id DESC
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
			 
			     				<th>Librarian Name</th>
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