<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password,'btth01_cse485');

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
//kiểm tra khi ng dùng ADD
    if (isset($_POST["btnAdd"])){
        $matloai = $_POST["txtCatId"];
        $tentloai = $_POST["txtCatName"];
    }
//truy vắn dữ liệu
    $sql="INSERT INTO theloai VALUES ('$matloai','$tentloai')";
    if (mysqli_query($conn, $sql)){


     // echo "Connected successfully";
        header('location: ../admin/category.php');

    }
    else {
        $result = "Lỗi thêm mới" .mysqli_error($conn);
    }