<!DOCTYPE html>
<html>
<head>
	<title>Library System</title>
</head>
<style type="text/css">
	.form-group{
		display: none;
	}
</style>
<body>
	<form method="POST" action="borrowing_update.php">
		<div class="form-group1">
			<label for="sel1">Select Borrower</label>
			<?php
			include ('includes/connection.php');
			$result = $connect->query("SELECT borrowerID, borrowername from tbl_borrowers");

			echo "<select name='selected' class='form-control' id='selected'>";?>	
			<?php
			while ($row = $result->fetch_assoc()) {
				unset($id, $borrowername);
				$id = $row['borrowerID'];
				$borrowername = $row['borrowername']; 
				echo '<option value="'.$borrowername.'">'.$borrowername.'</option>';
			}
			echo "</select>";
			?> 
		</div><br>

		<div class="form-group1">
			<label>Date Borrowed</label>
			<input type="date" name="newdateborrowed" id="newdateborrowed" value="<?php echo date("Y-m-d");?>" class="form-control" readonly>
		</div><br>

		<?php
		if(isset($_POST["borrower_id"])){
			$output = '';
			include('includes/connection.php');
			$query = "SELECT * FROM tbl_books WHERE bookID = '".$_POST["borrower_id"]."'";
			$result = mysqli_query($connect, $query);
			$output .= '

			<div class="form-group">
			';
			while($row = mysqli_fetch_array($result)){
				$output .= '
				<input type="text" name="emp" id="emp" value="'.$row["bookID"].'" />
				<label>Book Title:</label>
				<input type="text" readonly name="newbooktitle" id="newbooktitle" 
				value="'.$row["booktitle"].'" class="form-control">
			</div>
			<div class="form-group">
				<label>Book Cover Path</label>
				<input type="text" name="newbookcover" id="newbookcover" 
				value="'.$row["bookcover"].'" class="form-control">
			</div>
			<div class="form-group">
				<label>Category:</label>
				<input type="text" readonly name="newcategory" id="newcategory" 
				value="'.$row["category"].'" class="form-control">
			</div>
			<div class="form-group">
				<label>Author:</label>
				<input type="text" readonly name="newauthor" id="newauthor" 
				value="'.$row["author"].'" class="form-control">
			</div>
			<div class="form-group">
				<label>Publisher Name:</label>
				<input type="text" readonly name="newpublishername" id="newpublishername" 
				value="'.$row["publishername"].'"  class="form-control">
			</div>
			<div class="form-group">
				<label>Date Published</label>
				<input type="date" readonly name="newdatepublished" id="newdatepublished" 
				value="'.$row["datepublished"].'"  class="form-control">
			</div>
			<div class="form-group">
				<label>Copies</label>
				<input type="number" readonly name="newcopies" id="newcopies"
				value="'.$row["copies"].'" class="form-control">
			</div>
			<div class="form-group">
				<label>Remaining</label>
				<input type="number" name="remaining" id="remaining" 
				value="'.$row["remaining"].'" class="form-control">
			</div>

				';
			}
			$output .= '                    

			';
			echo $output;
		}
		?>
		<input type="submit" name="update" id="update" value="Borrow Now" class="btn btn-success btn-block" />
	</form>
</body>
</html>