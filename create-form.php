<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<h1>Add User</h1>
				<form action="create.php" enctype="multipart/form-data" method="POST">
					<div class="form-group">
						<label for="username">Username</label>
						<input id="username" type="text" name="username" class="form-control">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="email" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label for="pass">Password</label>
						<input id="pass" type="password" name="pass" class="form-control">
					</div>
					<div class="custom-file">
						<label for="photo" class="custom-file-label">Photo</label>
						<input id="photo" type="file" name="photo" class="custom-file-input">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-success mt-3">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>