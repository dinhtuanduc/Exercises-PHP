<?php
    include_once "connect.php";
    if(count($_POST)>0){
        $newid=$_POST["id"];
        $Title=$_POST["Title"];
        $Price=$_POST["Price"];
        $Author=$_POST["Author"];
        $sql="UPDATE tbl_book SET Title='$Title', Price='$Price', Author='$Author' WHERE id=$newid ";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        echo "Cập nhật thành công";
        header("location: home.php");
        exit;
    }

    if(isset($_GET["id"]) && $_GET["id"]>0){
        $id =$_GET["id"];
        $sql="SELECT * FROM tbl_book WHERE id=$id";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users=$stmt->fetchAll();
        $users = isset($users) ? $users[0] : null;
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
            <h1>Chỉnh sửa sách</h1>
            <p>
                <label for="">ID: </label> <?php echo $users["ID"] ?>
                <input type="hidden" name="id" value="<?php echo $users["ID"] ?>">
            </p>
            <p>
                <label for="">Title</label>
                <input type="text" name="Title" value="<?php echo $users["Title"] ?>">
            </p>
            <p>
                <label for="">Price</label>
                <input type="text" name="Price" value="<?php echo $users["Price"] ?>">
            </p>
            <p>
                <label for="">Author</label>
                <input type="text" name="Author" value="<?php echo $users["Author"] ?>">
            </p>
            <button type="submit">Cập nhật</button>
        </form>
    </div>
    
</body>
</html>