<?php
include "connect.php";
    $manv = $_GET["manv"];
    $sql = "delete from nhanvien where manv='$manv'";
    $kq = mysqli_query($conn, $sql);
    if($kq){
        header('Location:hienthi.php');
    }
?>