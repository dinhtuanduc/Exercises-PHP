<?php
$servername = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'quanlysinhvien';

$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
$conn ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//if ($conn)
//{
//    echo "Kết nối thành công";
//}else
//{
//    echo "Kết nối thất bại";
//}