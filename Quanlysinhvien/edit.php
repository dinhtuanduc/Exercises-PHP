<?php

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Sửa sinh viên</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid mt-3">
    <h1 class="mb-2">Sửa sinh viên</h1>
    <form method="post">
        <div class="form-group">
            <label for="masv">Mã sinh viên</label>
            <input type="text" name="masv" class="form-control" id="masv">
        </div>
        <div class="form-row">
            <div class="form-group col-sm-8">
                <label for="ho">Họ đệm</label>
                <input type="text" name="ho" class="form-control" id="ho" placeholder="Nhập họ đệm">
            </div>
            <div class="form-group col-sm-4">
                <label for="ten">Tên</label>
                <input type="text" name="ten" class="form-control" id="ten" placeholder="Nhập tên">
            </div>
        </div>
        <div class="form-group">
            <label for="ngaysinh">Ngày sinh</label>
            <input type="date" name="ngaysinh" class="form-control" id="ngaysinh">
        </div>
        <div class="form-row"">
        <label class="col-sm-4" for="gioitinh">Giới tính</label>
        <div class="form-check col-sm-4">
            <input class="form-check-input" type="radio" value="1" name="gioitinh" id="gioitinh" checked>
            <label class="form-check-label" for="gioitinh">Nam</label>
        </div>
        <div class="form-check col-sm-4">
            <input class="form-check-input" type="radio" value="0" name="gioitinh" id="gioitinh">
            <label class="form-check-label" for="gioitinh">Nữ</label>
        </div>
</div>
<div class="form-group">
    <label for="noisinh">Nơi sinh</label>
    <input type="text" name="noisinh" class="form-control" id="noisinh">
</div>
<div class="form-group">
    <label for="malop">Mã lớp</label>
    <input type="text" name="malop" class="form-control" id="malop">
</div>

<button type="submit" class="btn btn-primary">Cập nhật sinh viên</button>
<br>
<a href="home.php">Quay lại trang chủ</a>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>
</html>
