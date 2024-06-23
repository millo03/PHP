<?php
    include "connect.php";
    if(isset($_POST["btnThem"])){
        $manv = $_POST["manv"];
        $hoten = $_POST["hoten"];
        $hinhanh = $_FILES["hinhanh"]["name"];
        $xeploai = $_POST["xeploai"];
        $ngayluong = $_POST["ngayluong"];
        $ngaycong = $_POST["ngaycong"];
        $path = "./image";
        $sql = "INSERT INTO nhanvien (`manv`, `hoten`, `hinhanh`, `xeploai`, `ngayluong`, `ngaycong`) VALUES('$manv','$hoten','$hinhanh','$xeploai','$ngayluong','$ngaycong')";
        $kq = mysqli_query($conn,$sql);
        if($kq){
            move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$path."/".$hinhanh);
            header('Location:hienthi.php');
        }
    }
?>
