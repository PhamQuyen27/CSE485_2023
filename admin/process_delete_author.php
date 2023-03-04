<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $conn = new mysqli($host, $user, $pass,'btth01_cse485');
    $id = $_GET['id'];

    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }
    
    // Lấy ID của bản ghi cần xóa
    $id = $_GET['id'];
    
    // Thực hiện xóa bản ghi
    $sql_delete = "DELETE FROM tacgia WHERE ma_tgia = $id";
    $conn->query($sql_delete);
    
    // Thực hiện cập nhật lại ID của các bản ghi khác
    $sql = "SELECT ma_tgia FROM tacgia ORDER BY ma_tgia ASC";
    $result = mysqli_query($conn, $sql);
    $counter = 1;
    while ($row = mysqli_fetch_assoc($result)){
        $ma_tgia_moi = $counter;
        $ma_tgia_cu = $row['ma_tgia'];
        $sql = "UPDATE tacgia SET ma_tgia = $ma_tgia_moi WHERE ma_tgia = $ma_tgia_cu";
        mysqli_query($conn, $sql);
        $counter++;
    }
    
    // Kiểm tra số bản ghi bị ảnh hưởng
    // if (mysqli_affected_rows($conn) > 0) {
    //     echo "Xóa tác giả thành công";
    // } else {
    //     echo "Lỗi: Không tìm thấy tác giả cần xóa";
    // }
    
    $conn->close();
    header('location: ../admin/author.php');
    ?>
?>