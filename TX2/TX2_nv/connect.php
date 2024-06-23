<?php
    $sname = "localhost";
    $user = "root";
    $pass = "1234";
    $database = "qlnv";
    $conn = mysqli_connect("$sname","$user","$pass","$database");
    mysqli_set_charset($conn, 'utf8');
    if(!$conn)
    {
        echo "Kết nối thất bại";
    }
?>
