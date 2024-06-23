<?php
include "connect.php";
    $makh = $_GET["makh"];
    $sql = "DELETE FROM tiendien WHERE makh='$makh'";
    $kq = mysqli_query($conn, $sql);
    if($kq){
        header('Location:hienthi.php');
    }else echo $sql;
?>