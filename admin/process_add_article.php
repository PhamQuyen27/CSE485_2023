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
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    //thực hiện thêm dữ liệu
    $stmt = $conn->prepare("INSERT INTO baiviet(ma_bviet,tieude,ten_bhat,ma_tloai,tomtat,noidung,ma_tgia,hinhanh) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if($stmt->execute([null, $tieude, $t_bhat, $theloai, $tomtat, $noidung, $tgia, $hinhanh])){
        // $target_dir = "images/songs/";
        // $target_file = $target_dir . basename($_FILES["hinhanh"]["name"]);
        //move_uploaded_file($_FILES["hinhanh"]["tmp_name"], $target_file);
        move_uploaded_file($hinhanh_tmp,'./images/songs/'. $hinhanh);
            header('Location: article.php');         
    }else{
            header('Location: add_article.php');
    }
    }
?>