<?php
include "connect.php";
 if(isset($_POST["btnSua"])){
     $manv = $_POST["manv"];
     $hoten = $_POST["hoten"];
     $hinhanh = $_FILES["hinhanh"]["name"];
     $xeploai = $_POST["xeploai"];
     $luongngay = $_POST["ngayluong"];
     $ngaycong = $_POST["ngaycong"];
     $anhcu = $_POST['anhcu'];
     $path = "./image";
     $sql = "UPDATE nhanvien SET hoten = '$hoten', hinhanh = '$hinhanh', xeploai = '$xeploai',ngayluong ='$luongngay', ngaycong = '$ngaycong' WHERE manv = '$manv'";
     $kq = mysqli_query($conn, $sql);
     if($kq){
         move_uploaded_file($_FILES["HinhAnh"]["tmp_name"],$path."/".$hinhanh);
         unlink("./image/".$anhcu);
         header('Location:hienthi.php');
     }
 }
?>
