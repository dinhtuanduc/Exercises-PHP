<?php
$create_database = "CREATE DATABASE qlywebsite";

$create_table = "
CREATE TABLE thongtin (
    masp int PRIMARY KEY AUTO_INCREMENT,
    tensp VARCHAR(255),
    gia DOUBLE,
    sluong INT,
    namsx YEAR,
    hang VARCHAR(255),
    ttsp LONGTEXT
)";

$insert_into1 = "
INSERT INTO thongtin (tensp, gia, sluong, namsx, hang, ttsp)
VALUES ('Iphone 11 Pro max',19000000, 7, 2019, 'Iphone', 'Tuyệt vời')
";
$insert_into2 = "
INSERT INTO thongtin (tensp, gia, sluong, namsx, hang, ttsp)
VALUES ('Iphone 12 Pro',21000000, 5, 2020, 'Iphone', 'Rất tuyệt')
";
$insert_into3 = "
INSERT INTO thongtin (tensp, gia, sluong, namsx, hang, ttsp)
VALUES ('Iphone 12 Pro max',27000000, 11, 2020, 'Iphone', 'Rất rất tuyệt vời')
";
