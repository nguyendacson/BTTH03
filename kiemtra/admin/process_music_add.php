<?php
if(isset($_POST['sbmSave'])){
    $name = $_POST['tenbaihat'];
    $email = $_POST['casi'];
    $pass1 = $_POST['theloai'];
    try{
        //Buoc 1: Ket noi DBServer
        $conn = new PDO("mysql:host=localhost;dbname=kiemtra1", "root", "");
        //Buoc 2: Thuc hien truy van
        $sql_check = "SELECT * FROM baihat WHERE tenBaiHat = '$tenbaihat'";
        $stmt = $conn->prepare($sql_check);
        $stmt->execute();

        //Buoc 3: Xử lý kết quả
        if($stmt->rowCount()>0){
            header("Location:music_add.php?error=existed");
        }else{
            $sql_insert = "INSERT INTO baihat (tenBaiHat, caSi, idTheLoai) VALUES ('$tenbaihat', '$casi', '$theloai')";
            $stmt = $conn->prepare($sql_insert);
            $stmt->execute();
            if($stmt->rowCount() > 0){
                header("Location:list_music.php?error=added");
            }
            else
            echo "kết nối không thành công";
        }

    }catch(PDOException $e){
        echo "Lỗi: " . $e->getMessage();
        echo $e->getMessage();
    }
}