<?php
     $servername = 'localhost';
     $database = 'btth01_cse485';
     $charset = 'utf8mb4';
     $port = '';

     try {
         $conn = new PDO("mysql:host=$servername;dbname=$database;port=3306", 'root','');
     } catch (PDOException $e) {
         throw new PDOException($e->getMessage(), $e->getCode());
     }

    //nhận dữ liệu từ form
    if(isset($_POST["them"])){
        $tieude = $_POST['tieude'];
        $t_bhat = $_POST['tenbaihat'];
        $theloai = $_POST['theloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $tgia = $_POST['tacgia'];
        $hinhanh = $_FILES['hinhanh'];
    }

    // thêm dữ liệu
    $stmt = $conn->prepare("INSERT INTO baiviet(ma_bviet,tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,hinhanh) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if($stmt->execute([null,$tieude,$t_bhat,$theloai,$tomtat,$noidung,$tgia,$hinhanh])){
        echo "<script>alert('Thêm dữ liệu thành công!')</script>";
        header('Location: article.php');         
    }else{
        echo "<script>alert('Thêm dữ liệu thất bại!')</script>";
        header('Location: add_article.php');
    }
    //header('Location: article.php');
?>