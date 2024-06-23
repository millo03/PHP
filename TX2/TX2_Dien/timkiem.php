<?php 
include("connect.php");
//include("hienthi.php");
$makh = $_GET['makh'];
$sql = "SELECT * FROM tiendien  WHERE makh ='$makh'";
$kq= $conn->query($sql);
?>
<div style=" width:1000px; margin: auto; "  >
<table border ='1' width="1000" style="border-collapse: collapse;text-align:center ">
<tr >
        <th>Makh</th>
        <th>TenKH</th>
        <th>HinhAnh</th>
        <th>SoDien</th>
        <th>HinhThuc</th>
        <th>ThanhToan</th>
    </tr>
<?php
    if($kq->num_rows > 0){
    while($sv= $kq->fetch_assoc()){
    ?>
            <tr>
                <td><?=$sv['makh']?></td>
                <td><?=$sv['tenkh']?></td>
                <td><img width="100px" height="100px" src="img/<?=$sv['hinhanh']?>" alt=""></td>
                <td><?=$sv['sodien']?></td>
                <td><?=$sv['hinhthuc']?></td>
                <td><?php
                $thanhtoan =0;
                    if($sv['hinhthuc'] == 'Gd')$thanhtoan = $sv['sodien']*2500;
                    else $thanhtoan = $sv['sodien']*3500;
                ?><?=$thanhtoan ?></td>
            </tr>
    <?php 
            }
        }
    ?>
</table>
<a href="hienthi.php">Thoát</a>
</div>