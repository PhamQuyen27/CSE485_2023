<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $conn = new mysqli($host, $user, $pass,'btth01_cse485');
    $id = $_GET['id'];

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    $sql = "DELETE FROM tacgia WHERE ma_tgia = '$id'";
    if (mysqli_query($conn, $sql)){
        echo "Connected successfully";
    }
    else {
        echo "Connected not successfully";
    }
    mysqli_close($conn);
    header('location: ../admin/author.php');
?>