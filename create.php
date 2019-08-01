<?php

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['pass']);

    foreach($_POST as $data) {
        if (empty($data)) {
            include 'error.php';
            exit;
        }
    }

    if (empty($_FILES['photo'])) {
        include 'error.php';
        exit;
    }

    if($_FILES['photo']['error'] == 0) {
        $uploadsDir = 'uploads';
        $imgTmpName = $_FILES['photo']['tmp_name'];
        $imgName = $_FILES['photo']['name'];
        $type = strstr($imgName, '.');
        $imgName = uniqid() . $type;
        $image = "$uploadsDir/$imgName";
        move_uploaded_file($imgTmpName, $image);
    }

    $pdo = new PDO('mysql:host=localhost;dbname=marlin-first;charset=utf8;', 'root', '');
    $sql = 'INSERT INTO users (username, email, password, photo) VALUES (:username, :email, :password, :photo)';
    $stmt = $pdo->prepare($sql);
    $result = $stmt->execute([  ':username' => $username, 
                                ':email' => $email, 
                                ':password' => $password,
                                ':photo' => $image]);
    if(!$result) {
        include 'error.php';
        exit;
    }

    header('Location: index.php');

