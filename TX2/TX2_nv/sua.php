<?php
    include "connect.php";
    $manv = $_GET["manv"];
    $sql = "select * from Nhanvien where manv='$manv'";
    $kq = mysqli_query($conn,$sql);
    $nv = mysqli_fetch_array($kq);
?>
<form action="xl_sua.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Ma NV:</td>
            <td><input type="text" name="manv" value="<?= $nv['manv']?>"></td>
        </tr>
        <tr>
            <td>Ho Ten:</td>
            <td><input type="text" name="hoten" value="<?= $nv['hoten']?>"></td>
        </tr>
        <tr>
            <td>Anh Cu:</td>

            <td><img width="100px" height="100px" src="image/<?= $nv['hinhanh']?>"></td>
            <input type="hidden" value="<?= $nv['hinhanh']?>" name="anhcu">
        </tr>
        <tr>
            <td>Hinh Anh:</td>
            <td><input type="file" name="hinhanh"></td>
        </tr>
        <tr>
            <td>Xep Loai:</td>
            <td><input type="text" name="xeploai" value="<?= $nv['xeploai']?>"></td>
        </tr>
        <tr>
            <td>Luong Ngay:</td>
            <td><input type="text" name="ngayluong" value="<?= $nv['ngayluong']?>"></td>
        </tr>
        <tr>
            <td>Ngay Cong:</td>
            <td><input type="text" name="ngaycong" value="<?= $nv['ngaycong']?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="btnSua" value="Sửa"></td>
        </tr>
    </table>
</form>