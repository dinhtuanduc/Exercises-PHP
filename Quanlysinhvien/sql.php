
//Tạo CSDL:

CREATE DATABASE quanlysinhvien

//Tạo bảng accounts
CREATE TABLE accounts(
userId int PRIMARY KEY AUTO_INCREMENT,
username varchar(20),
password varchar(20)
)

//Tạo bảng students

CREATE TABLE students(
masv varchar(10) PRIMARY KEY,
ho varchar(50),
ten varchar(50),
ngaysinh datetime,
gioitinh int,
noisinh varchar(255),
malop varchar(10),
ngaytao timestamp
)