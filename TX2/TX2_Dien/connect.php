<?php
$sname = "localhost";
$uname ="root";
$upass = "1234";
$database = "qltd";
$conn = mysqli_connect($sname,$uname,$upass,$database);
mysqli_set_charset($conn, 'utf8');
if(!$conn){
    die("Lỗi kết nối". mysqli_connect_error());
}
?>