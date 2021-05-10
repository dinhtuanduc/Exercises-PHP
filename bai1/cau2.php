<?php
$cc = 0;
$muc1=6000;
$muc2=7000;
$muc3=8500;
$muc4=15000;
$ketqua = '';
if (count($_POST)>0){
    if (empty($_POST['so'])){
        echo 'Vui long nhập';
        $cc = 1;
    }
    if (!empty($_POST['so']) && !is_numeric($_POST['so'])){
        echo 'Vui long nhập kiểu số';
        $cc = 1;
    }
    if ($cc == 0){
        $so = $_POST['so'];
        if ($so > 0 && $so < 10){
            $ketqua = $so*$muc1;
        }else if ($so > 10 && $so < 20){
            $ketqua = 10*$muc1 + ($so-10)*$muc2;
        }else if ($so > 20 && $so < 30){
            $ketqua = 10*$muc1 + 10*$muc2 + ($so-20)*$muc3;
        }else if ($so > 30){
            $ketqua = 10*$muc1 + 10*$muc2 + 10*$muc3 + ($so-30)*$muc4;
        }else{
            $ketqua = 'Số nhập vào không hợp lệ';
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
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
    <form method="post">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="background: blue;color: white"  colspan="2" class="text-center">Tính tiền nước</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="text-center"><span>Nhập số m3 nước tiêu thụ:</span></td>
                <td class="text-center"><input class="form-control" type="text" name="so" value="<?php echo isset($_POST['so']) ? $_POST['so'] : '' ?>"></td>
            </tr>
            <tr>
                <td class="text-center" colspan="2"><b>Bảng giá nước theo bậc thang</b></td>
            </tr>
            <tr>
                <td><span>0-10m3</span></td>
                <td><span>6.000đ/m3</span></td>
            </tr>
            <tr>
                <td><span>Trên 10m3-20m3</span></td>
                <td><span>7.000đ/m3</span></td>
            </tr>
            <tr>
                <td><span>Trên 20m3-30m3</span></td>
                <td><span>8.500đ/m3</span></td>
            </tr>
            <tr>
                <td><span>Trên 30m3</span></td>
                <td><span>15.000đ/m3</span></td>
            </tr>
            <tr>
                <td class="text-center"><input class="btn btn-primary" type="submit" value="Tính tiền"></td>
                <td style="background: blue;color: white"  class="text-center"><span><?php echo $ketqua; ?> </span></td>
            </tr>
            </tbody>
        </table>
    </form>

</div>
</body>
</html>
