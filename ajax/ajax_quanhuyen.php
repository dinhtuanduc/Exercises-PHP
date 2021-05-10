<?php
include_once 'database.php';
if(isset($_POST['matp']) && $_POST['matp']>0)
{
    $matp = $_POST['matp'];
    $db = new database();
    $connection = $db -> connection;
    $sql_quanhuyen = "SELECT * FROM devvn_quanhuyen WHERE matp = $matp";
    $stmt = $connection->prepare($sql_quanhuyen);
    $stmt -> execute();
    $stmt -> setFetchMode(PDO::FETCH_ASSOC);
    $cachuyen = $stmt -> fetchAll();
    $quanhuyen = '<option value="0">Chọn quận huyện</option>';

    foreach ($cachuyen as $huyen)
    {
        $quanhuyen .= '<option value="'.$huyen['maqh'].'">'.$huyen['name'].'</option>';
    }
    echo $quanhuyen;
}