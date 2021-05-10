<?php
session_start();
include_once 'database.php';

if (isset($_SESSION['admin']))
{
    header('location: home.php');
    exit();
}
if (count($_POST)>0) {
    if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
        $error_login = '';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ($count > 0) {
            $_SESSION['admin'] = ["Username" => "$username", "Password" => "$password"];
            header('location: home.php');
            exit();
        } else {
            echo 'Vui lòng nhập đúng tài khoản và mật khẩu';
        }
    }else{
        echo 'Vui lòng nhập tài khoản và mật khẩu';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid mt-3">
    <h2>Đăng nhập</h2>

    <form method="post">
        <!-- Vertical -->
        <div class="form-group">
            <label for="username">Username</label>
            <input type="username" name="username" id = "username" class="form-control" placeholder="Username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            <br>
            
            <button type="submit" class="btn btn-primary">Submit</button>
            <br>
            <a href="create_accounts.php">Tạo tài khoản</a>
        </div>
    </form>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
