<?php
include_once "ketnoi.php";
if (isset($_POST['tensp']) && isset($_POST['gia']) && isset($_POST['sluong']) && isset($_POST['namsx']) && isset($_POST['hang']) && isset($_POST['ttsp'])){
    if (!empty($_POST['tensp']) && !empty($_POST['gia']) && !empty($_POST['sluong']) && !empty($_POST['namsx']) && !empty($_POST['hang']) && !empty($_POST['ttsp'])){
        if(is_numeric($_POST['gia']) && is_numeric($_POST['namsx']) && is_numeric($_POST['sluong'])){
            $tensp = $_POST['tensp'];
            $gia = doubleval($_POST['gia']);
            $sluong = intval($_POST['sluong']);
            $namsx = intval($_POST['namsx']);
            $hang = $_POST['hang'];
            $ttsp= $_POST['ttsp'];
            $masp = $_POST['masp'];
            $sql = "UPDATE thongtin SET tensp='$tensp',gia=$gia, sluong=$sluong,namsx=$namsx,hang='$hang',ttsp='$ttsp' WHERE masp=$masp";
            $stmt = $conn->prepare($sql);
            $stmt->execute();

            header('location: index.php');
            exit();
        }else{
            echo "<div style=\"color: red;font-style: italic\">Giá sản phẩm, số lượng, năm sản xuất phải phải nhập kiểu số kiểu số</div>";
        }
    }else{
        echo "<div style=\"color: red;font-style: italic\">Vui lòng nhập đầy đủ - Không để trống</div>";
    }
}

if(isset($_GET["id"]) && ($_GET["id"]>0)){
    $id =$_GET["id"];
    $sql ="SELECT * FROM thongtin WHERE masp=$id";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $data = $stmt->fetchAll();

    $data = isset($data[0]) ? $data[0] : null;
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootsrrap-4.5.3/css/bootstrap.min.css">
    <title>Thêm mới sản phẩm</title>
</head>
<body>
<h1>Thêm mới sản phẩm</h1>
<form name="category"  method="post" >
    <input type="hidden" name="masp" value="<?php echo $data["masp"]; ?>">
    <div class="form-group">
        <label for="tensp">Tên sản phẩm</label>
        <input type="text" name="tensp" class="form-control" id="tensp" value="<?php echo $data["tensp"]; ?>">
    </div>
    <div class="form-group">
        <label for="gia">Giá sản phẩm</label>
        <input type="text" name="gia" class="form-control" id="gia" value="<?php echo $data["gia"]; ?>">
    </div>
    <div class="form-group">
        <label for="sluong">Số lượng</label>
        <input type="text" name="sluong" class="form-control" id="sluong" value=<?php echo $data["sluong"]; ?>>
    </div>
    <div class="form-group">
        <label for="namsx">Năm sản xuất</label>
        <input type="text" name="namsx" class="form-control" id="namsx" value="<?php echo $data["namsx"]; ?>">
    </div>
    <div class="form-group">
        <label for="sluong">Hãng</label>
        <input type="text" name="hang" class="form-control" id="hang" value="<?php echo $data["hang"]; ?>">
    </div>
    <div class="form-group">
        <label for="ttsp">Tóm tắt về sản phẩm</label>
        <textarea name="ttsp" class="form-control" rows="5" id="ttsp"><?php echo $data["ttsp"]; ?></textarea>
    </div>
    <button type="submit" class="btn btn-success">Cập nhật</button>
</form>
</body>
</html>
