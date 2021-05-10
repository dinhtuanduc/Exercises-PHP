<?php
include_once "ketnoi.php";
if (isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM thongtin WHERE masp=$id";

    $conn->exec($sql);


    header('location: index.php');
    exit();
}