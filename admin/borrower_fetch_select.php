
<?php  
include ('includes/connection.php');
?> 

<!DOCTYPE html>
<html>
<head>
	<title>Bootstrap Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="form-group">
  		<label for="sel1">Select list:</label>
  		<select class="form-control" id="sel1">
		    <option>1</option>
		    <option>2</option>
		    <option>3</option>
		    <option>4</option>
  		</select>
	</div>
	<?php

		include ('includes/connection.php');

	    $result = $connect->query("SELECT borrowerID, borrowername from tbl_borrowers");

	    echo "<html>";
	    echo "<body>";
	    echo "<select name='id'>";

	    while ($row = $result->fetch_assoc()) {

	                  unset($id, $borrowername);
	                  $id = $row['id'];
	                  $borrowername = $row['borrowername']; 
	                  echo '<option value="'.$id.'">'.$borrowername.'</option>';
	}

	    echo "</select>";
	    echo "</body>";
	    echo "</html>";
	?> 

</body>
</html>