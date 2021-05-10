<?php
session_start();
include_once 'database.php';
if (isset($_GET['masv']))
{
    $masv = $_GET['masv'];
    $sql = "DELETE FROM students WHERE masv = '$masv'";
    $stmt = $conn -> exec($sql);
    $_SESSION['action'] = 'delete';
    header('location: home.php');
    exit();
}
