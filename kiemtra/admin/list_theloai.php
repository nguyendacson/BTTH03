<?php
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }

    try{
        $conn = new PDO("mysql:host=localhost;dbname=kiemtra1", "root","");
        $n = ($page -1) * 10;
        $sql = "SELECT * FROM theloai ORDER BY id ASC LIMIT 10 OFFSET $n";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $theloai = $stmt->fetchAll();
    }catch(PDOException $e){
        echo "Error: ".$e->getMessage();
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <?php
        include "layout/right_layout.php";
        ?>
        <div class="col-md-9 main">
            <?php
            include "layout/left_layout.php";
            ?>
            <div class="main-content vh-100 p-3">
                <h3 class=" text-center text-uppercase">Thể Loại Bài Hát</h3>
                <a href="user_add.php" class="btn btn-success"><ion-icon name="add-circle-outline"></ion-icon>Thêm thể loại</a> 
                <?php
                    if(isset($_GET['success'])){
                         $id = $_GET['success'];
                         echo "<h2 style='color:red'>The user have id: {$id} deleted</h2>";
                    }
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên Thể loại</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead> 
                    <tbody>
                    <?php
                     foreach($theloai as $user){
                        ?>
                        <tr>
                            <th scope="row">
                                <?= $user[0]; ?>
                            </th>
                            <td>
                                <?= $user[1]; ?>
                            </td>
                            <td>
                                <a href="user_edit.php?id=1">
                                    <i class="bi bi-pencil"></i>
                                </a>
                            </td>
                            <td>
                                <a href="" data-bs-toggle="modal" data-bs-target="#<//?= $user[0]; ?>">
                                    <i class="bi bi-trash3"></i>
                                </a>
                                <div class="modal fade" id="<?= $user[0]; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">DELETE User</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>  
                                            <div class="modal-body">
                                                Are you sure detele the user have id: <? $user[0]; ?>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <a href="user_delete.php?id=< ?= $user[0]; ?>" class="btn btn-success">OK</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="list_management.php">1</a></li>
                            <li class="page-item"><a class="page-link" href="list_management.php?page=2">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<script script  type = "module"  src = "https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js" > </script> 
<script script  nomodule  src = "https://unpkg .com/ionicons@7.1.0/dist/ionicons/ionicons.js" > </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>