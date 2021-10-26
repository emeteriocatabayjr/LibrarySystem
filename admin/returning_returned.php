<!DOCTYPE html>
<html>
<head>
	<title>Library System</title>
</head>
<body>
	<form method="POST" action="returning_disable.php">
		<?php

			if(isset($_POST['borrower_id'])){
				$output = '';
				$borrower_id=$_POST["borrower_id"];
				include 'includes/connection.php';
				$query="SELECT * FROM tbl_returning AS A
						INNER JOIN tbl_books AS B
						ON A.booktitle=B.booktitle
						WHERE transactionID  = '$borrower_id'";
						

				$result = mysqli_query($connect, $query);
				$output.='
					<div class="form-group">
						<label>Date Returned</label>
				';
				while($row = mysqli_fetch_array($result)){
					$output.='
						<input type="hidden" name="emp" id="emp" value="'.$row["transactionID"].'" />
						<input type="hidden" name="emp1" id="emp1" value="'.$row["bookID"].'" />
						<input type="hidden" name="newremaining" id="newremaining" value="'.$row["remaining"].'" />

						<input type="date" name="newdatereturned" id="newdatereturned" value="'.date("Y-m-d").'" class="form-control" readonly>	
					</div>
					';
				}
				echo $output;
			}	
		?>
		<input type="submit" name="update" id="update" value="Return Now" class="btn btn-success btn-block" />
	</form>
</body>
</html>