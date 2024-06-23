<?php
    include("connect.php");
    $sql = "Select * from hocsinh";
    $kq = mysqli_query($conn,$sql);
    $hb= 0;
    if(isset($_POST["sua"])){
    $mahs = $_POST['mahs'];
    header('Location:sua.php?mahs='.$mahs);
    exit();
    }
    if(isset($_POST["xoa"])){
    $mahs = $_POST['mahs'];
    header('Location:xoa.php?mahs='.$mahs);
    }
    if(isset($_POST["timkiem"])){
        $mahs = $_POST['mahs'];
        header('Location:timkiem.php?mahs='.$mahs);
        }
?>

<div style=" width:1000px; margin: auto; "  >
<div style=" width:500px; margin: auto;">
    <form action="" method="post">
    <table>
        <tr>
            <td>MaSV </td>
            <td><input type="text" name = "mahs" ></td>
            <td><input type="submit" value="Sua" name = "sua"></td>
            <td><input type="submit" value="Xóa" name = "xoa"></td> 
            <td><input type="submit" value="Tìm kiếm" name = "timkiem"></td>                  
        </tr>
    </table>
    </form>
</div>


<a href="them.php">Thêm sinh viên mới</a>
<table border ='1' width="1000" style="border-collapse: collapse;text-align:center ">
    <!-- <tr>
        <td colspan="1">MaSV tim: </td>
        <td colspan="2"><input type="text" name = "mahsn" ></td>
        <td colspan="2"><input type="submit" value="Sua" name = "sua"></td>
        <td colspan="2"><input type="submit" value="Xóa" name = "xoa"></td>    
    </tr> -->
    <tr >
        <th>MaHS</th>
        <th>Ten_HS</th>
        <th>HinhAnh</th>
        <th>XepLoai</th>
        <th>HK1</th>
        <th>HK2</th>
        <th>HocBong</th>
    </tr>
    <?php 
        if($kq->num_rows > 0){
            while($sv= $kq->fetch_assoc()){
    ?>
            <tr>
                <td><?=$sv['mahs']?></td>
                <td><?=$sv['tenhs']?></td>
                <td><img width="100px" height="100px" src="img/<?=$sv['hinhanh']?>" alt=""></td>
                <td><?=$sv['xeploai']?></td>
                <td><?=$sv['hk1']?></td>
                <td><?=$sv['hk2']?></td>
                <td><?php
                    $tbc = ($sv['hk1']+ $sv['hk2']*2)/3;
                    if($sv['xeploai']== 'A'&&$tbc> 9) $hb = 1000000;
                    else if($sv['xeploai']== 'B'&&$tbc> 8) $hb = 500000;
                    else $hb = 0;
                ?><?=$hb ?></td>
            </tr>
    <?php
            }
        }
    ?>
</table>
</div>