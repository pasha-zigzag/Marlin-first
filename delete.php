<?php

$id = $_GET['id'];

$pdo = new PDO('mysql:host=localhost;dbname=marlin-first;charset=utf8;', 'root', '');
$sql = "SELECT photo FROM users WHERE id=$id";
$stmt = $pdo->query($sql);
$img = $stmt->fetch(PDO::FETCH_ASSOC)['photo'];
unlink($img);

$sql = "DELETE FROM users WHERE id=$id";
$pdo->query($sql);

header('Location: index.php');