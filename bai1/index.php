<?php
session_start();
if ($_SESSION['admin'] == 'admin'){
    $name = $_SESSION['name'];
    echo "Cảm ơn $name đã gửi thông tin liên hệ";
    session_unset();
    session_destroy();
}else{
    $_SESSION['error'] = 'Bạn cần đăng ký trước để hiện chức năng này';
    header('location:cau3.php');
}
