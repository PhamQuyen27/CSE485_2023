<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password,'btth01_cse485');
    $id = $_GET['id'];

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM theloai WHERE ma_tloai = '$id'";
    if (mysqli_query($conn, $sql)){
        echo "Connected successfully";
    }
    else {
        echo "Connected successfully";
        // $result = "Xóa không thành công" .mysqli_error($conn);
    }
    mysqli_close($conn);
    header('location: ../admin/category.php')
    ?>