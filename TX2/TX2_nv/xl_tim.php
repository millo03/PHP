<?php
include ("connect.php");
$manv = $_POST["manv"];
$sql = "SELECT *from Nhanvien where manv='$manv'";
$kq = mysqli_query($conn,$sql);
$nv = mysqli_fetch_array($kq);
?>
    <table>
        <tr>
            <td>Ma NV:</td>
            <td><?= $nv['manv']?></td>
        </tr>
        <tr>
            <td>Ho Ten:</td>
            <td><?= $nv['hoten']?></td>
        </tr>
        <tr>
            <td>Hinh Anh:</td>
            <td><img width="100px" height="100px" src="image/<?= $nv['hinhanh']?>"></td>
        </tr>
        <tr>
            <td>Xep Loai:</td>
            <td><?= $nv['xeploai']?></td>
        </tr>
        <tr>
            <td>Luong Ngay:</td>
            <td><?= $nv['ngayluong']?></td>
        </tr>
        <tr>
            <td>Ngay Cong:</td>
            <td><?= $nv['ngaycong']?></td>
        </tr>
        <tr>
            <td>Tong luong:</td>
            <td><?php
                if( $nv['xeploai'] == 'A')
                {
                $tongluong = $nv['ngayluong'] * $nv['ngaycong'] +500000;
                }
                else if($nv['xeploai'] == 'B')
                {
                $tongluong = $nv['ngayluong'] * $nv['ngaycong'] +300000;
                }
                else{
                $tongluong = $nv['ngayluong'] * $nv['ngaycong'];
                }
                ?><?= $tongluong?></td>
        </tr>
        <tr><td><a href="hienthi.php">Thoát</a></td></tr>
    </table>