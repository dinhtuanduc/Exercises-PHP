<?php session_start(); ?>
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
        if(!isset($_SESSION["admin"])){
            header("location: login.php");
            exit;
        }

        $sql ="SELECT * FROM tbl_book";
        
        if(isset($_POST["finded"]) && strlen($_POST["finded"])>2){
            $finded=$_POST["finded"];
            $sql ="SELECT * FROM tbl_book WHERE Title LIKE '%$finded%'";
        }

        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $users=$stmt->fetchAll();

    ?>
    <form action="" method="POST">
        <input type="text" name="finded" value="">
        <button type="submit">Tìm kiếm</button>
    </form>
    <br>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Price</th>
                <th>Author</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(is_array($users) && !empty($users)){
                    foreach($users as $user){
                        $id=$user["ID"];
                        ?> 
                           <tr>
                                <td><?php echo $id ?></td>
                                <td><?php echo $user["Title"] ?></td>
                                <td><?php echo $user["Price"] ?></td>
                                <td><?php echo $user["Author"] ?></td>
                                <td><a href="<?php echo "edit.php?id=$id"?>">Edit</a></td>
                                <td><a href="<?php echo "delete.php?id=$id"?>" onclick="return confirm('Bạn có thực sự muốn xóa')">Delete</a></td>
                            </tr> 
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>
    <br>
    <p><a href="addbook.php">Add book</a></p> 
    <p><a href="logout.php">Đăng xuất</a></p> 
</body>
</html>