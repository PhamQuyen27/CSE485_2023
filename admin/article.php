<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music for Life</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style_login.css">
</head>
<body>
<header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary shadow p-3 bg-white rounded">
            <div class="container-fluid">
                <div class="h3">
                    <a class="navbar-brand" href="#">Administration</a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="./">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Trang ngoài</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="category.php">Thể loại</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="author.php">Tác giả</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="article.php">Bài viết</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>

    </header>
    <?php
    //ket noi databse
        $servername = 'localhost';
        $database = 'btth01_cse485';
        $charset = 'utf8mb4';
        $port = '';

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$database;port=3306", 'root','');
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), $e->getCode());
        }
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }
         // truy vấn dữ liệu
        $sql = "SELECT * from baiviet 
                inner join theloai on baiviet.ma_tloai = theloai.ma_tloai
                inner join tacgia on baiviet.ma_tgia = tacgia.ma_tgia
                order by ma_bviet ASC";
        $stmt = $conn->query($sql);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <a href="add_article.php" class="btn btn-success">Thêm mới</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tiêu đề</th>
                            <th scope="col">Tên bài hát</th>
                            <th scope="col">Mã thể loại</th>
                            <th scope="col">Tóm tắt</th>
                            <th scope="col">Nội dung</th>
                            <th scope="col">Mã tác giả</th>
                            <th scope="col">Ngày viết</th>
                            <th scope="col">Hình ảnh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['ma_bviet'] ?></td>
                            <td><?php echo $value['tieude'] ?></td>
                            <td><?php echo $value['ten_bhat'] ?></td>
                            <td><?php echo $value['ten_tloai'] ?></td>
                            <td><?php echo $value['tomtat'] ?></td>
                            <td><?php echo $value['noidung'] ?></td>
                            <td><?php echo $value['ten_tgia'] ?></td>
                            <td><?php echo $value['ngayviet'] ?></td>
                            <td><img src="../images/songs/<?php echo $value['hinhanh'] ?>" alt="" style = "width: 150px"></td>
                            <td><a href="edit_article.php?id=<?php echo $value['ma_bviet'] ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a href="delete_article.php?id=<?php echo $value['ma_bviet'] ?>"><i class="fa-solid fa-trash"></i></a></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>