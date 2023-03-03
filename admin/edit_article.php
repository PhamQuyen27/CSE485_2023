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
    <link rel="stylesheet" href="/ckeditor5-build-classic/build/ckeditor.css">
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
        // kết nối database
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
        $sql_theloai = "SELECT * FROM theloai";
        $stmt_tl = $conn->query($sql_theloai);
        $sql_tacgia = "SELECT * FROM tacgia";
        $stmt_tg = $conn->query($sql_tacgia);

        $sql = "SELECT * FROM baiviet where ma_bviet = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // if(isset($_POST['sua'])){
        //     $ma_bviet = $_POST['ma_bviet'];
        //     $tieude = $_POST['tieude'];
        //     $t_bhat = $_POST['tenbaihat'];
        //     $theloai = $_POST['theloai'];
        //     $tomtat = $_POST['tomtat'];
        //     $noidung = $_POST['noidung'];
        //     $tgia = $_POST['tacgia'];

        // // sửa
        //     $stmt = $conn->prepare("UPDATE baiviet set tieude =:tieude, ten_bhat =:t_bhat, ma_tloai =:theloai, tomtat =:tomtat, noidung =:noidung, ma_tgia =:tgia WHERE ma_bviet = :id"); 
        //     $stmt->bindParam(':tieude', $tieude);
        //     $stmt->bindParam(':t_bhat', $t_bhat);
        //     $stmt->bindParam(':theloai', $theloai);
        //     $stmt->bindParam(':tomtat', $tomtat);
        //     $stmt->bindParam(':noidung', $noidung);
        //     $stmt->bindParam(':tgia', $tgia);
        //     $stmt->bindParam(':id', $ma_bviet);
        //     $stmt->execute();
        //     header('Location: article.php'); 
        // }
    ?>
    <main class="container mt-5 mb-5">
        <!-- <h3 class="text-center text-uppercase mb-3 text-primary">CẢM NHẬN VỀ BÀI HÁT</h3> -->
        <div class="row">
            <div class="col-sm">
                <h3 class="text-center text-uppercase fw-bold">Chỉnh sửa bài viết</h3>
                <form action="process_edit_article.php" method="post">
                <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Mã bài viết</span>
                        <input type="text" class="form-control" name="ma_bviet"  id="ma_bviet" value="<?php echo $user['ma_bviet'] ?>" readonly>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Tiêu đề</span>
                        <input type="text" class="form-control" name="tieude"  id="tieude" value="<?php echo $user['tieude'] ?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Tên bài hát</span>
                        <input type="text" class="form-control" name="tenbaihat" id="tenbaihat" value="<?php echo $user['ten_bhat']?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Thể loại</span>
                        <select name="theloai">
                          <?php while($value = $stmt_tl->fetch()){?>
                            <?php if($value['ma_tloai'] == $user['ma_tloai']) { ?>
                                <option value="<?php echo $value['ma_tloai']?>" selected><?php echo $value['ten_tloai'] ?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $value['ma_tloai']?>"><?php echo $value['ten_tloai'] ?></option>
                            <?php } ?>
                           <?php } ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Tóm tắt</span>
                        <input type="text" class="form-control" name="tomtat" id="tomtat" style="width: 80%; height: 100px;" value="<?php echo $user['tomtat']?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Nội dung</span>
                        <input type="text" class="form-control" name="noidung"  id="noidung" style="width: 80%; height: 100px;" value="<?php echo $user['noidung']?>">
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="">Tác giả</span>
                        <select name="tacgia">
                        <?php  while($value = $stmt_tg->fetch()){?>
                            <?php if($value['ma_tgia'] == $user['ma_tgia']) { ?>
                                <option value="<?php echo $value['ma_tgia']?>" selected><?php echo $value['ten_tgia'] ?></option>
                            <?php }else{ ?>
                                <option value="<?php echo $value['ma_tgia']?>"><?php echo $value['ten_tgia'] ?></option>
                            <?php } ?>
                        <?php  } ?>
                        </select>
                    </div>

                    <div class="input-group mt-3 mb-3">
                        <span class="input-group-text" id="lblCatName">Hình ảnh</span>
                        <!-- <textarea name="hinhanh" id="mytextarea"></textarea> -->
                        <input type="file" class="form-control" name= "hinhanh" >
                    </div>

                    <div class="form-group  float-end ">
                        <input type="submit" value="Sửa" name ="sua" class="btn btn-success">
                        <a href="article.php" class="btn btn-warning ">Quay lại</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <footer class="bg-white d-flex justify-content-center align-items-center border-top border-secondary  border-2" style="height:80px">
        <h4 class="text-center text-uppercase fw-bold">TLU's music garden</h4>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/ckeditor5-build-classic/build/ckeditor.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#mytextarea' ) )
            .catch( error => {
            console.error( error );
            } );
    </script>
</body>
</html>