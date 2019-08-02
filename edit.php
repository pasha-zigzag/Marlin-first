<?php

$pdo = new PDO('mysql:host=localhost;dbname=marlin-first;charset=utf8;', 'root', '');

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = md5($_POST['password']);

foreach($_POST as $data) {
    if (empty($data)) {
        include 'error.php';
        exit;
    }
}

if(!$_FILES['photo']['error']) {
    $sql = 'SELECT photo FROM users WHERE id=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $image = $stmt->fetch(PDO::FETCH_ASSOC)['photo'];
    unlink($image);
    
    $uploadsDir = 'uploads';
    $imgTmpName = $_FILES['photo']['tmp_name'];
    $imgName = $_FILES['photo']['name'];
    $type = strstr($imgName, '.');
    $imgName = uniqid() . $type;
    $image = "$uploadsDir/$imgName";
    move_uploaded_file($imgTmpName, $image);
} else {
    $sql = 'SELECT photo FROM users WHERE id=?';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $image = $stmt->fetch(PDO::FETCH_ASSOC)['photo'];
}

$sql = 'UPDATE users SET username=:username, email=:email, password=:password, photo=:photo WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->execute([':username' => $username, 
                ':email' => $email, 
                ':password' => $password,
                ':photo' => $image,
                ':id'          => $id]);

header('Location: index.php');