<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=marlin-first;charset=utf8;', 'root', '');
$sql = "SELECT * FROM users WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

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
				<h1>Edit User ID <?= $id ?></h1>
				<form action="edit.php" enctype="multipart/form-data" action="edit.php" method="POST">
					<input type="hidden" name="id" value=<?= $id ?>>
					<div class="form-group">
						<label for="">Username</label>
						<input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input type="email" class="form-control" name="email" value="<?= $user['email'] ?>">
					</div>
					<div class="form-group">
						<label for="">Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="custom-file">
						<label for="photo" class="custom-file-label">Photo</label>
						<input id="photo" type="file" name="photo" class="custom-file-input">
					</div>
					<div class="form-group">
						<button type="submit" class="btn btn-warning">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>