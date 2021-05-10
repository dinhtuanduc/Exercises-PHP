<?php
session_start();
include_once 'database.php';
if (!isset($_SESSION['admin']))
{
    header('location: login.php');
    exit();
}
$sql = "SELECT * FROM students";
$stmt = $conn -> prepare($sql);
$stmt ->execute();
$stmt -> setFetchMode(PDO::FETCH_ASSOC);
$students = $stmt -> fetchAll();
//echo '<pre>';
//print_r($students);
//echo '</pre>';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <title>Danh sách sinh viên</title>
    <style>
        .logout{
            float: right;
        }
    </style>
</head>
<body>
    <h1>Danh sách sinh viên</h1>
    <a href="create.php" class="btn btn-primary">Thêm mới sinh viên</a>
    <a href="logout.php" class="btn btn-danger logout">Đăng xuất</a>
    <?php
//        if (isset($_SESSION['action'])) {
//            if ($_SESSION['action'] == 'create') {
//                echo 'Thêm mới sinh viên thành công';
//            }else if ($_SESSION['action'] == 'delete'){
//                echo 'Xóa sinh viên thành công';
//            } else {
//                echo 'Thất bại';
//            }
//        }
    ?>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ đệm</th>
            <th>Tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Nơi sinh</th>
            <th>Mã lớp</th>
            <th>Ngày tạo</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <tbody>
        <?php
            foreach ($students as $student){
                ?>
                    <tr>
                        <td><?php echo $student['masv']; ?></td>
                        <td><?php echo $student['ho']; ?></td>
                        <td><?php echo $student['ten']; ?></td>
                        <td><?php echo $student['ngaysinh']; ?></td>
                        <td><?php echo $student['gioitinh']==1?'Nam':'Nữ'; ?></td>
                        <td><?php echo $student['noisinh']; ?></td>
                        <td><?php echo $student['malop']; ?></td>
                        <td><?php echo $student['ngaytao']; ?></td>
                        <td>
                            <a href="edit.php?masv=<?php echo $student['masv']; ?>" class="btn btn-warning">Sửa</a>
                            <a href="delete.php?masv=<?php echo $student['masv']; ?>" class="btn btn-danger">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
            ?>
        </tbody>
    </table>
</body>
</html>
