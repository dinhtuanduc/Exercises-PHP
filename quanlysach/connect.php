<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $mydb = "quanlysach";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$mydb",$username,$password);
        $conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Kết nối thành công";
    } catch(Exception $e){
        echo " Kết nối thất bại";
    }

