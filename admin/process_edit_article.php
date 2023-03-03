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

    //nhận dữ liệu từ form
    if(isset($_POST["sua"])){
        $ma_bviet = $_POST['ma_bviet'];
        $tieude = $_POST['tieude'];
        $t_bhat = $_POST['tenbaihat'];
        $theloai = $_POST['theloai'];
        $tomtat = $_POST['tomtat'];
        $noidung = $_POST['noidung'];
        $tgia = $_POST['tacgia'];
        if($_FILES['hinhanh']['name'] == ''){
            $image = $user['tieude'];
       }else{
            $image = $user['tieude'];
       }
       $hinhanh = $_FILES['hinhanh']['name'];

    // sửa thông tin
        $stmt = $conn->prepare("UPDATE baiviet set tieude =:tieude, ten_bhat =:t_bhat, ma_tloai =:theloai, tomtat =:tomtat, noidung =:noidung, ma_tgia =:tgia, hinhanh =:hinhanh WHERE baiviet.ma_bviet = :id"); 
        $stmt->bindParam(':tieude', $tieude);
        $stmt->bindParam(':t_bhat', $t_bhat);
        $stmt->bindParam(':theloai', $theloai);
        $stmt->bindParam(':tomtat', $tomtat);
        $stmt->bindParam(':noidung', $noidung);
        $stmt->bindParam(':tgia', $tgia);
        $stmt->bindParam(':hinhanh', $hinhanh);
        $stmt->bindParam(':id', $ma_bviet);
        $stmt->execute();
        header('Location: article.php'); 
    }
?>