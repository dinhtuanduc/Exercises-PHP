<?php
$cc = $logic = 0;
$ketqua = '';
if (count($_POST)>0) {
    if (empty($_POST['so'])) {
        echo 'Vui lòng nhập số';
        $cc = 1;
    }

    if (!empty($_POST['so']) && !is_numeric($_POST['so'])) {
        echo 'Bạn phải nhập kiểu số';
        $cc = 1;
    }

    if (isset($_POST['logic'])) {
        $logic = $_POST['logic'];
    }else{
        $cc = 1;
        echo '<br>Vui lòng chọn 1 trong 4';
    }
    if ($cc == 0) {
        $so = $_POST['so'];
        if ($logic == 1) {
            if ($so % 2 == 0) {
                $ketqua = 'True';
            } else {
                $ketqua = 'False';
            }
        }
        if ($logic == 2) {
            if ($so % 2 != 0) {
                $ketqua = 'True';
            } else {
                $ketqua = 'False';
            }
        }
        if ($logic== 3) {
            if ($so % 3 == 0) {
                $ketqua = 'True';
            } else {
                $ketqua = 'False';
            }
        }
        if ($logic == 4) {
            if ($so % 4 == 0) {
                $ketqua = 'True';
            } else {
                $ketqua = 'False';
            }
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
                    <th style="background: blue;color: white"  colspan="2" class="text-center">Kiểm tra Logic</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center"><span>Nhập số ban đầu:</span></td>
                    <td class="text-center"><input class="form-control" type="text" name="so" value="<?php echo isset($_POST['so']) ? $_POST['so'] : '' ?>"></td>
                </tr>
                <tr>
                    <td class="text-center"><span>Chọn Logic:</span></td>
                    <td class="text-left">
                        <p><input type="radio" value="1" name="logic" <?php echo ($logic ==1) ? 'checked' : ''?>>Là số chẵn?</p>
                        <p><input type="radio" value="2" name="logic" <?php echo ($logic ==2) ? 'checked' : ''?>>Là số lẻ?</p>
                        <p><input type="radio" value="3" name="logic" <?php echo ($logic ==3) ? 'checked' : ''?>>Chia hết cho 3?</p>
                        <p><input type="radio" value="4" name="logic" <?php echo ($logic ==4) ? 'checked' : ''?>>Chia hết cho 4?</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center"><input class="btn btn-primary" type="submit" value="Kiểm tra"></td>
                    <td style="background: blue;color: white"  class="text-center"><span><?php echo $ketqua ?></span></td>
                </tr>
                </tbody>
            </table>
        </form>

    </div>
</body>
</html>
