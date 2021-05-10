<?php
$servername = '127.0.0.1';

$username = 'root';

$password = '';

$dbname = 'qlywebsite';

$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//if ($conn)
//{
//    echo 'Thành công';
//}else{
//    echo 'Thất bại';
//}