<?php
session_start();
include_once 'database.php';
$username = '';
if (count($_POST)>0)
{
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['again_password']) && !empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['again_password']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $again_password = $_POST['again_password'];
        if ($password == $again_password)
        {
            $sql = "INSERT INTO accounts(username,password) VALUES ('$username','$password')";
            $stmt = $conn ->exec($sql);
            if ($stmt>0)
            {
                header('location: login.php');
            }else{
                echo 'lỗi';
            }
        }else{
            echo 'Vui lòng nhập đúng password';
        }
    }else{
        echo 'Vui lòng nhập';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Tạo mới tài khoản</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid mt-3">
    <h1 class="mb-2">Tạo tài khoản</h1>
    <form method="post">
        <div class="form-group">
            <label for="username">Tài khoản: </label>
            <input type="text" name="username" class="form-control" id="username" value="<?php echo $username;?>">
        </div>
        <div class="form-group">
            <label for="password">Mật khẩu: </label>
            <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
            <label for="again_password">Nhập lại mật khẩu: </label>
            <input type="password" name="again_password" class="form-control" id="again_password">
        </div>

        <button type="submit" class="btn btn-primary">Tạo mới tài khoản</button>
        <br>
        <a href="login.php">Quay lại phần đăng nhập</a>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
