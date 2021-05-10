<?php
    include_once "connect.php";
    if(isset($_GET["id"]) && $_GET["id"]>0){
        $id=$_GET["id"];
        $sql="DELETE FROM tbl_book WHERE ID=$id";
        $conn->exec($sql);
        header("location: home.php");
        exit;
    }
?>