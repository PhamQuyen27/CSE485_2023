<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $conn = new mysqli($servername, $username, $password,'btth01_cse485');

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_POST["btnSave"])){
        $matloai = $_POST["txtCatId"];
        $tentloai = $_POST["txtCatName"];
    }

    $sql = "UPDATE theloai SET ten_tloai = '$tentloai' WHERE ma_tloai = '$matloai'";
    if (mysqli_query($conn, $sql)){
        // echo "Connected successfully";
        header('location: ../admin/category.php');
    }
    else {
        $result = "Cập nhật chưa thành công" .mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>