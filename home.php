<?php include 'includes/header.php'?>
<?php include 'includes/sessionstart.php'?>
<?php include 'includes/navbar_user.php'?>
<body>
	<h1 class="text-center p-5 m-5">Welcome <?php echo $_SESSION['borrowername']; ?>!</h1>
	<div class="container">
		<div class="card mx-auto text-center mb-5">
			<div class="card-header"><h5>Online Library System</h5></div>
			<div class="card-body">
				<div class="row">
					<div class="col">
						<h1 class="display-4">About</h3><br>
						<p>The system is simple and user-friendly system. It have basic features of a library system.</p>
						<hr>
					</div>
					<div class="col">
						<h1 class="display-4">Features</h3>
						<ul class="list-group">
							<li class="list-group-item">Transactions are viewable online</li>
							<li class="list-group-item">Live Search Interface</li>
							<li class="list-group-item">Book Covers of every books are viewable</li>
						</ul>
						<hr>
					</div>
					<div class="col">
						<h1 class="display-4">Creator</h3><br>
						<p>Emeterio N. Catabay Jr.</p>
						<p>A student of STI College Caloocan, currently taking BS Computer Engineering.</p>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<?php include 'includes/footer.php';?>
</html>
