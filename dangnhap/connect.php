<?php
    $severname = '127.0.0.1';
    $username = 'root';
    $password = '';
    $dbname = 'dangnhap';
    $conn = new PDO("mysql:host=$severname;dbname=$dbname",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);