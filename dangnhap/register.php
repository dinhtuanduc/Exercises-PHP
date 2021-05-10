<?php
session_start();
$cc = 0;
include_once 'connect.php';
if (count($_POST) > 0){
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = sha1($_POST['password']);
    $password_again = sha1($_POST['password_again']);

    if (empty($fullname) || empty($password) || empty($username) || empty($password_again)){
        echo '<br> Vui lòng nhập đủ thông tin';
        $cc = 1;
    }

    if (!empty($username)){
        $sql = "SELECT * FROM accounts WHERE username = '$username'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0){
            echo '<br>Tên username này đã tồn tại';
            $cc = 1;
        }
    }
    if (!empty($password) && !empty($password_again)){
        if ($password != $password_again) {
            echo '<br> 2 mật khẩu không giống nhau';
            $cc = 1;
        }
    }

    if ($cc == 0){
        echo 'cc';
        $sql_add = "INSERT INTO accounts (fullname, username, password)
  VALUES ('$fullname', '$username', '$password')";
        $conn->exec($sql_add);
        header('location:login.php');
        exit();
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
    <h1 class="text-center">Màn hình đăng ký</h1>
    <form method="post">
<!--        --><?php
//            if (!empty($error)){
//                echo "<div class='alert alert-warning'>$error</div>";
//            }
//        ?>
        <div class="form-group">
            <label for="fullname">Họ Tên:</label>
            <input type="text" class="form-control" name="fullname" id="fullname">
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="password_again">Nhập lại Password:</label>
            <input type="password" class="form-control" name="password_again" id="password_again">
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Đăng Ký</button>
        <a href="login.php" class="btn btn-info">Trở về trang đăp nhập</a>
    </form>
</div>
</body>
</html>
