<?php
// Thực hiện kết nối đến CSDL
$host="localhost";
$username="root";
$password="";
$database="btth01_cse485";

$conn = new mysqli($host, $username, $password, $database );

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy dữ liệu từ form
// $ma_tgia = $_POST['ma_tgia'];
$ten_tgia = $_POST['ten_tgia'];

// Thực hiện truy vấn SQL để thêm dữ liệu
$sql = "INSERT INTO tacgia (ten_tgia) VALUES ( '$ten_tgia')";

if ($conn->query($sql) === TRUE) {
    echo "Thêm tác giả thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header('location: ../admin/add_author.php');
?>
