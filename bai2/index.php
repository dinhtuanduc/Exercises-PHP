<?php
include_once "ketnoi.php";

$sql = "SELECT * FROM thongtin";

$stmt = $conn->prepare($sql);

$stmt->execute();

$stmt->setFetchMode(PDO::FETCH_ASSOC);

$result = $stmt->fetchAll();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootsrrap-4.5.3/css/bootstrap.min.css">
    <title>Danh sách sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>
    <div style="padding: 10px; border: 1px solid #4e73df; margin-bottom: 10px">

        <form name="search_admin" method="get" class="form-inline">

        <input name="name" class="form-control" style="width: 500px; margin-right: 20px" placeholder="Nhập tên sản phẩm hoặc theo hãng sản phẩm">

        <div style="padding: 10px 0">
            <input type="submit" name="search" class="btn btn-success" value="Tìm kiếm">
        </div>

        </form>
    </div>
    <a href="create.php" class="btn btn-primary">Thêm mới sản phẩm</a>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá sản phẩm</th>
                <th>Số lượng</th>
                <th>Năm sản xuấ</th>
                <th>Hãng</th>
                <th>Tóm tắt về sản phẩm</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if (isset($result) && !empty($result)){
            foreach ($result as $data){
                ?>
                <tr>
                    <td><?php echo $data['masp'] ?></td>
                    <td><?php echo $data['tensp'] ?></td>
                    <td><?php echo $data['gia'] ?></td>
                    <td><?php echo $data['sluong'] ?></td>
                    <td><?php echo $data['namsx'] ?></td>
                    <td><?php echo $data['hang'] ?></td>
                    <td><?php echo $data['ttsp'] ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $data['masp'] ?>" class="btn btn-warning">Sửa</a>
                        <a href="delete.php?id=<?php echo $data['masp'] ?>" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
        </tbody>
    </table>
</body>
</html>
