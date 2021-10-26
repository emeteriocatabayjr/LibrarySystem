<?php include('loginn.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container pt-3">
		<div class="row justify-content-sm-center">
			<div class="col-sm-6 col-md-4">
				<div class="card text-center">
					<div class="card-header">
						<h5>Administrator</h5>
					</div>
					<div class="card-body">
						<form class="form-signin" method="POST">
							<input type="text" name="username" class="form-control mb-2" placeholder="Username" required="" autofocus="">
							<input type="password" name="password" class="form-control mb-2" placeholder="Password" required="">
							<div class="input-group">
								<button class="btn btn-primary btn-block" type="submit">Login</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>