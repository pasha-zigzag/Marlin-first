<?php
	$pdo = new PDO('mysql:host=localhost;dbname=marlin-first;charset=utf8;', 'root', '');
	$sql = 'SELECT * FROM users';
	$statement = $pdo->query($sql);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);

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
			<div class="col-md-12">
				<h1>User management</h1>
				<a href="create-form.php" class="btn btn-success">Add User</a>
				
				<table class="table">
					<thead>
						<tr>
							<th>ID</th>
							<th>Username</th>
							<th>Email</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						<?php foreach($users as $user) { ?>
						<tr>
							<td><?= $user['id']; ?></td>
							<td><?= $user['username']; ?></td>
							<td><?= $user['email']; ?></td>
							<td>
								<a href="edit-form.php?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
								<a href="#" onclick="return confirm('are you sure?')" class="btn btn-danger">Delete</a>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>