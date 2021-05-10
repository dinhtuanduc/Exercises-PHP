<?php
session_start();
include_once "connect.php";
if (count($_POST) > 0){
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    if (empty($username) || empty($password)){
        echo 'Vui lòng nhập đầy đủ';
    }else{
        $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0){
            $_SESSION['login'] = 'complete';
            header('location: index.php');
            exit();
        }else{
            $error = 'Đăng nhập thất bại';
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        .container{
            width: 450px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center">Màn hình đăng nhập</h1>
    <?php
    if (isset($error)){
        echo "<div class='alert alert-success'>$error</div>";
    }
    ?>
    <form method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Đăng Nhập</button>
        <a href="register.php" class="btn btn-info">Đăng ký</a>
    </form>
</div>
</body>
</html>

