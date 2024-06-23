<?php
include "connect.php";
    $mahs = $_GET["mahs"];
    $sql = "DELETE FROM hocsinh WHERE mahs='$mahs'";
    $kq = mysqli_query($conn, $sql);
    if($kq){
        header('Location:hienthi.php');
    }else echo $sql;
?>