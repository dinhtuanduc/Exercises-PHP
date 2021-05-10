<?php
include_once 'database.php';
if(isset($_POST['maqh']) && $_POST['maqh'] >0)
{
    $maqh = $_POST['maqh'];
    $db = new database();
    $connection = $db ->connection;
    $sql_xaphuong = "SELECT * FROM devvn_xaphuongthitran WHERE maqh = $maqh";
    $stmt = $connection -> prepare($sql_xaphuong);
    $stmt -> execute();
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    $cacxa = $stmt -> fetchAll();

    $xaphuong = '<option value="0">Chọn xã phường</option>';
    foreach ($cacxa as $xa)
    {
        $xaphuong .= '<option value="'.$xa['xaid'].'">'.$xa['name'].'</option>';
    }

    echo $xaphuong;
}
