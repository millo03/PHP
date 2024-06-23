<?php
    include "connect.php";
    $sql = "select * from Nhanvien";
    $kq = mysqli_query($conn,$sql);
    $tongluong = 0;
?>
<a href="them.php">Thêm nhân viên</a><br>
<table width="1000" border="1" style="border-collapse: collapse">
    <tr>
        <th>MaNV</th>
        <th>HoTen</th>
        <th>HinhAnh</th>
        <th>XepLoai</th>
        <th>ngayluong</th>
        <th>ngaycong</th>
        <th>TongLuong</th>
        <th>ThucHien</th>
    </tr>
    <?php
        if(mysqli_num_rows($kq) > 0){
            while ($nv = mysqli_fetch_assoc($kq))
            {?>
                <tr>
                    <td><?= $nv['manv']?></td>
                    <td><?= $nv['hoten']?></td>
                    <td><img width="100px" height="100px" src="image/<?= $nv['hinhanh']?>"> </td>
                    <td><?= $nv['xeploai']?></td>
                    <td><?= $nv['ngayluong']?></td>
                    <td><?= $nv['ngaycong']?></td>
                    <td><?php
                        if( $nv['xeploai'] == 'A')
                        {
                            $tongluong = $nv['ngayluong'] * $nv['ngaycong'] +500000;
                        }
                        else if($nv['XepLoai'] == 'B')
                        {
                            $tongluong = $nv['ngayluong'] * $nv['ngaycong'] +300000;
                        }
                        else{
                            $tongluong = $nv['ngayluong'] * $nv['ngaycong'];
                        }
                        ?><?= $tongluong?></td>
                    <td><a href="xoa.php?manv=<?= $nv['manv']?>">Xóa</a>|
                        <a href="sua.php?manv=<?= $nv['manv']?>">Sửa</a>|
                        <a href="tim.php">Tìm</a></td>
                </tr>
    <?php
            }
        }
        else{
            echo "Không có nhân viên";
        }

    ?>
</table>
