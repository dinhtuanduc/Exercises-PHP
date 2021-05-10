<?php
session_start();
if (isset($_SESSION['error'])){
    echo $_SESSION['error'];
    session_unset();
    session_destroy();
}
if (count($_POST)>0){
    if (!empty($_POST['name']) && !empty($_POST['age']) && !empty($_POST['gender']) && !empty($_POST['content'])){
        $_SESSION['name'] = $_POST['name'];
        $_SESSION['admin'] = 'admin';
        header("location:index.php");
    }else{
        echo "Vui lòng nhập đầy đủ thông tin";
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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Thông tin liên hệ</h1>
        <form method="post">
            <div class="form-group">
                <label for="name">Họ tên(*)</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''?>">
            </div>
            <div class="form-group">
                <label for="age">Tuổi(*)</label>
                <input type="number" class="form-control" name="age" id="age" value="<?php echo isset($_POST['age']) ? $_POST['age'] : ''?>">
            </div>
            <div class="form-group">
                <label class="form-check-label">Giới tính: </label>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="1" name="gender" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 1) ? 'checked' : ''?>>Nam
                    </label>
                </div>
                <div class="form-check-inline">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" value="2" name="gender" <?php echo (isset($_POST['gender']) && $_POST['gender'] == 2) ? 'checked' : ''?>>Nữ
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="content">Nội dung liên hệ(*)</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"><?php echo isset($_POST['content']) ? $_POST['content'] : ''?></textarea>
            </div>
            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Gửi thông tin">
                <input class="btn btn-warning" type="reset" value="Nhập lại">
            </div>
        </form>
    </div>
</body>
</html>
