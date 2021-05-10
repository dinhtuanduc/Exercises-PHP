<?php
    include_once "connect.php";
    if(count($_POST)>1){
        if(isset($_POST["Title"]) && isset($_POST["Price"]) && isset($_POST["Author"]) && !empty($_POST["Title"]) && !empty($_POST["Price"]) && !empty($_POST["Author"])){
            $Title=$_POST["Title"];
            $Price=$_POST["Price"];
            $Author=$_POST["Author"];
    
            $sql ="INSERT INTO tbl_book(Title,Price,Author) VALUES ('$Title','$Price','$Author')";
            $kq=$conn->exec($sql);
            if($kq>0){
                echo "Cập nhật thành công";
                header("location: home.php");
                exit;
            }
        }else{
            echo "Dữ liệu nhập vào không hợp lệ";
        }

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="" name="" method="POST">
            <h1>Thêm mới sách</h1>
            <p>
                <label for="">Title</label>
                <input type="text" name="Title" id="Title" value="">
                <span style="color: red; font-style: italic;" id="error_Title"></span>
            </p>
            <p>
                <label for="">Price</label>
                <input type="text" name="Price" id="Price" value="">
                <span style="color: red; font-style: italic;" id="error_Price"></span>
            </p>
            <p>
                <label for="">Author</label>
                <input type="text" name="Author" id="Author" value="">
                <span style="color: red; font-style: italic;" id="error_Author"></span>
            </p>
            <button type="submit" onclick="ktdulieu(); return false;">Cập nhật</button>
        </form>
    </div>

    <script>
        function ktdulieu(){
            var Title=document.getElementsById("Title").value;
            var Price=document.getElementsById("Price").value;
            var Author=document.getElementsById("Author").value;
            console.log(Title);

            var cc = 0;
            if(Title == ""){
                document.getElementById("error_Title").innerHTML("Vui lòng nhập Title");
                cc = 1;
            }else{
                document.getElementById("error_Title").innerHTML("");
            }

            if(Price == ""){
                document.getElementById("error_Price").innerHTML("Vui lòng nhập Price");
                cc = 1;
            }else{
                document.getElementById("error_Price").innerHTML("");
            }

            if(Author == ""){
                document.getElementById("error_Author").innerHTML("Vui lòng nhập Author");
                cc = 1;
            }else{
                document.getElementById("error_Author").innerHTML("");
            }

            if(cc=0){
                return true;
            }
        }
    </script>
</body>
</html>  