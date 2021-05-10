<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php   
        include_once "connect.php";
        if(isset($_SESSION["admin"])){
            header("location: home.php");
        }
        // $error_login="";
        if(count($_POST)>0){
            if(isset($_POST["Username"]) && isset($_POST["Password"]) && !empty($_POST["Username"]) && !empty($_POST["Password"])){
                $username=$_POST["Username"];
                $password=$_POST["Password"];

                $sql ="SELECT * FROM tbl_account WHERE Username='$username' AND Password='$password'";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $kq= $stmt->rowCount();
                if($kq>0){
                    $_SESSION["admin"]=["Username" => "$username","Password" => "$password"];
                    header("location: home.php");
                    exit;
                }else{
                    echo "Vui lòng nhập đúng username và password";
                }
            }else{
                echo "Định dạng ko hợp lệ";
            }
        }

    ?>
    <div class="container">
        <form action="" method="POST" name="login">
            <p>
                <label for="">Username:</label>
                <input type="text" name="Username" value="">
            </p>
            <p>
                <label for="">Password:</label>
                <input type="password" name="Password" value="">
            </p>
            <button type="submit" name="login">Login</button>
            <button type="reset" name="reset">Reset</button>
            <span style="color: red; font-style: italic;"></span>
        </form>
    </div>
</body>
</html>