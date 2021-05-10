<?php
include_once 'database.php';
$db = new database();
$connection = $db -> connection;
$sql_tinh = "SELECT * FROM devvn_tinhthanhpho";
$stmt = $connection ->prepare($sql_tinh);
$stmt -> execute();
$stmt ->setFetchMode(PDO::FETCH_ASSOC);
$cactinh = $stmt ->fetchAll();

//echo "<pre>";
//print_r($cactinh);
//echo "</pre>";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Tình thành Việt Nam</h1>
        <select name="tinh" id="tinh">
            <option value="0">Chọn tỉnh thành</option>
            <?php
            foreach ($cactinh as $tinh)
            {
                ?>
                <option value="<?php echo $tinh['matp']; ?>"><?php echo $tinh['name']; ?></option>
                <?php
            }
            ?>
        </select>

        <select name="huyen" id="huyen">
            <option value="0">Chọn quận huyện</option>
        </select>

        <select name="xa" id="xa">
            <option value="0">Chọn xã phường</option>
        </select>
    </div>

    <script
        src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script>
        $(document).ready(function () {

            $('#tinh').change(function () {
                var matp = $(this).val();
                alert(matp);
                $.ajax({
                    url: 'http://localhost/mvc_ajax/ajax/ajax_quanhuyen.php',
                    data: {matp:matp},
                    method: 'POST',
                    success: function (quanhuyen) {
                        $('#huyen').html(quanhuyen);
                    }
                });
            });

            $('#huyen').change(function () {
                var maqh = $(this).val();
                alert(maqh);

                $.ajax({
                    url: 'http://localhost/mvc_ajax/ajax/ajax_xaphuong.php',
                    data: {maqh:maqh},
                    method: 'POST',
                    success:function (xaphuong) {
                        $('#xa').html(xaphuong);
                    }
                });
            });

        });
    </script>
</body>
</html>
