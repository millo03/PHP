<?php
    include("connect.php");
    $sql = "Select * from tiendien";
    $kq = mysqli_query($conn,$sql);
    $hb= 0;
    if(isset($_POST["sua"])){
    $makh = $_POST['makh'];
    header('Location:sua.php?makh='.$makh);
    exit();
    }
    if(isset($_POST["xoa"])){
    $makh = $_POST['makh'];
    header('Location:xoa.php?makh='.$makh);
    }
    if(isset($_POST["timkiem"])){
        $makh = $_POST['makh'];
        header('Location:timkiem.php?makh='.$makh);
        }
?>

<div style=" width:1000px; margin: auto; "  >
<div style=" width:500px; margin: auto;">
    <form action="" method="post">
    <table>
        <tr>
            <td>MaKH </td>
            <td><input type="text" name = "makh" ></td>
            <td><input type="submit" value="Sua" name = "sua"></td>
            <td><input type="submit" value="Xóa" name = "xoa"></td> 
            <td><input type="submit" value="Tìm kiếm" name = "timkiem"></td>                  
        </tr>
    </table>
    </form>
</div>


<a href="them.php">Thêm khach hang mới</a>
<table border ='1' width="1000" style="border-collapse: collapse;text-align:center ">
    <!-- <tr>
        <td colspan="1">MaSV tim: </td>
        <td colspan="2"><input type="text" name = "makhn" ></td>
        <td colspan="2"><input type="submit" value="Sua" name = "sua"></td>
        <td colspan="2"><input type="submit" value="Xóa" name = "xoa"></td>    
    </tr> -->
    <tr >
        <th>makh</th>
        <th>TenKH</th>
        <th>HinhAnh</th>
        <th>SoDien</th>
        <th>HinhThuc</th>
        <th>ThanhToan</th>
    </tr>
    <?php 
        if($kq->num_rows > 0){
            while($kh= $kq->fetch_assoc()){
    ?>
            <tr>
                <td><?=$kh['makh']?></td>
                <td><?=$kh['tenkh']?></td>
                <td><img width="100px" height="100px" src="img/<?=$kh['hinhanh']?>" alt=""></td>
                <td><?=$kh['sodien']?></td>
                <td><?=$kh['hinhthuc']?></td>
               
                <td><?php
                $thanhtoan =0;
                    if($kh['hinhthuc'] == 'Gd')$thanhtoan = $kh['sodien']*2500;
                    else $thanhtoan = $kh['sodien']*3500;
                ?><?=$thanhtoan ?></td>
            </tr>
    <?php
            }
        }
    ?>
</table>
</div>