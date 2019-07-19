<?php
	$users = [
		['id' 		=> 1,
		'username' 	=> 'John Doe',
		'email' 	=> 'john@example.com'],
		['id' 		=> 2,
		'username' 	=> 'Joseph Doe',
		'email' 	=> 'joseph@example.com'],
		['id' 		=> 3,
		'username' 	=> 'Jane Doe',
		'email' 	=> 'jane123@example.com'],
		['id' 		=> 4,
		'username' 	=> 'Rakhim Muratov',
		'email' 	=> 'rakhim@example.com'],
		['id' 		=> 13,
		'username' 	=> 'Pavel Zagainov',
		'email' 	=> 'pavel-zagainov@yandex.ru']
	];

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
				<a href="create.html" class="btn btn-success">Add User</a>
				
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
								<a href="edit.html" class="btn btn-warning">Edit</a>
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